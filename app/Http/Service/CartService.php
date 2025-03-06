<?php
namespace App\Http\Service;
use App\Models\Cart;
use App\Models\Customer;
use App\Models\Product;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CartService{
    public function create($request)
    {
        $user = Auth::user();
        if (!$user) {
            return false;
        }

        $qty = (int)$request->input('qty');

        $product_id = (int)$request->input('product_id');
        if ($qty <= 0 || $product_id <= 0) {
            Session::flash('error', 'Số lượng sản phẩm không hợp lệ');
            return false;
        }

        $cart = Cart::where('user_id', $user->id)->where('product_id', $product_id)->first();

        if ($cart) {
            $cart->quantity += $qty;
            $cart->save();
        } else {
            Cart::create([
                'user_id' => $user->id,
                'product_id' => $product_id,
                'quantity' => $qty,
                'total_price' => $qty * Product::find($product_id)->price_sale,
            ]);
        }

        return true;
    }

    public function getProduct()
    {
        $user = Auth::user();
        if (!$user) return [];

        return Cart::where('user_id', $user->id)
            ->join('products', 'carts.product_id', '=', 'products.id')
            ->select('products.id', 'products.name', 'products.price_sale', 'products.thumb', 'carts.quantity')
            ->get();
    }

    public function update($request){
        $user = Auth::user();
        if (!$user) return false;

        $quantities = $request->input('num_product');
        if (!is_array($quantities)) return false;

        foreach ($quantities as $productId => $quantity) {
            $cart = Cart::where('user_id', $user->id)
                ->where('product_id', $productId)
                ->first();

            if ($cart) {
                $quantity = (int)$quantity;
                if ($quantity > 0) {
                    $cart->quantity = $quantity;
                    $cart->total_price = $quantity * Product::find($productId)->price_sale;
                    $cart->save();
                } else {
                    $cart->delete(); // Remove item if quantity is 0
                }
            }
        }

        return true;
    }
    public function remove($id)
    {
        $user = Auth::user();
        if (!$user) return false;

        Cart::where('user_id', $user->id)->where('product_id', $id)->delete();
        return true;
    }
    public function addCart($request)
    {
        try {
            DB::beginTransaction();
            $user = Auth::user();
            if (!$user) {
                return false;
            }

            // Lưu thông tin khách hàng vào bảng customers
            $customer = Customer::create([
                'name' => $request->input('name'),
                'phone' => $request->input('numberphone'),
                'address' => $request->input('address'),
                'note' => $request->input('note'),
                'email' => $request->input('email'),
            ]);

            // Lưu thông tin giỏ hàng vào bảng carts
            $carts = Cart::where('user_id', $user->id)->get();
            foreach ($carts as $cart) {
                Cart::create([
                    'customer_id' => $customer->id,
                    'product_id' => $cart->product_id,
                    'quantity' => $cart->quantity,
                    'total_price' => $cart->total_price,
                ]);
            }

            // Xóa giỏ hàng sau khi đặt hàng
            Cart::where('user_id', $user->id)->delete();

            DB::commit();
            Session::flash('success', 'Đặt hàng thành công!');
            return true;
        } catch (\Exception $exception) {
            DB::rollBack();
            return false;
        }
    }

    protected function infocCart($carts,$customer_id)
    {
        $productId =array_keys($carts);
        $products =  Product::select('id','name','price_sale','thumb')
            ->where('active',1)
            ->whereIn('id',$productId)
            ->get();
        foreach ($products as $key => $product) {
            $data[] = [
                'product_id' => $product->id,
                'customer_id' => $customer_id,
                'quantity' => $carts[$product->id],
                'price'=>$product->price_sale,
            ];
        }

        return Cart::insert($data);
    }
}

