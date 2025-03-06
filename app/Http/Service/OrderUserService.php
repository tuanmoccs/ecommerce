<?php
namespace App\Http\Service;
use App\Models\Cart;
use App\Models\Customer;
use App\Models\Product;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
class OrderUserService{
    public function getUserOrders()
    {
        $user = Auth::user();
        return $user->order()->with('OrderDetail.product')->orderByDesc('created_at')->paginate(10);
    }
    public function getUserOrderById($id){
        $user = Auth::user();
        return $user->order()->with('OrderDetail.product')->findOrFail($id);
    }
}
