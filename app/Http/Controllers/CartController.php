<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Service\CartService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    protected $cartService;
    public function __construct(CartService $cartService){
        $this->middleware('auth.cart');
        $this->cartService = $cartService;
    }
    public function index(Request $request){
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        $result = $this->cartService->create($request);
        if($result === false){
            return redirect()->back();
        }
        return redirect('/carts');
    }
    public function show(){
        $products= $this->cartService->getProduct();
        return view('cart.list',[
            'tiltle' => 'Giỏ hàng',
            'products' => $products,
            'carts' => Session::get('carts')
        ]);
    }
    public function update(Request $request){
        $this->cartService->update($request);

        return redirect('/carts');
    }
    public function remove($id = 0){
        $this->cartService->remove($id);

        return redirect('/carts');
    }
    public function addCart(Request $request)
    {
        $result = $this->cartService->addCart($request);

        return redirect('/carts');
    }
}
