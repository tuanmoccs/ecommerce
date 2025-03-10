<?php

namespace App\Http\Controllers;

use App\Http\Service\OrderUserService;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderConfirmationMail;
class OrderController extends Controller
{
    public function __construct(OrderUserService $orderUserService)
    {
        $this->orderUserService = $orderUserService;
    }
    public function checkout(Request $request){
        $user = Auth::user();
        $request->validate([
            'name' => 'required|string|max:255',
            'numberphone' => 'required|string|max:15',
            'address' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'note' => 'nullable|string',
        ]);

        $cartItems = Cart::where('user_id', $user->id)->get();


        $total = $cartItems->sum('total_price');

        $order = Order::create([
            'user_id' => $user->id,
            'name' => $request->name,
            'phone' => $request->numberphone,
            'address' => $request->address,
            'email' => $request->email,
            'note' => $request->note,
            'total' => $total,
            'status' => 'pending',
        ]);

        foreach ($cartItems as $item) {
            OrderDetail::create([
                'order_id' => $order->id,
                'product_id' => $item->product_id,
                'quantity' => $item->quantity,
                'price' => $item->total_price / $item->quantity, // Giá đơn vị từ total_price
            ]);
        }

        Cart::where('user_id', $user->id)->delete();
        //Mail::to($order->email)->send(new OrderConfirmationMail($order));
        return redirect()->route('cart')->with('success', 'Đặt hàng thành công!');
    }
    public function order(){
        $user = Auth::user();
        $orders = $user->order()->with('OrderDetail.product')->orderByDesc('created_at')->paginate(10);
        return view('order',[
            'tiltle'=>'Đơn hàng',
            'orders'=>$this->orderUserService->getUserOrders()
        ]);
    }
    public function detail($id){
        return view('order-detail',[
            'tiltle'=>'Order Detail',
            'order'=>$this->orderUserService->getUserOrderById($id)
        ]);
    }
}
