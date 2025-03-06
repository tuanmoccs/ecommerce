<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Service\Users\UserService;
use App\Http\Service\Orders\OrderService;
use Illuminate\Http\Request;
class OrderAdminController extends Controller
{
    protected $orderService;

    public function __construct(OrderService $orderService){
        $this->orderService = $orderService;
    }
    public function list(){
        return view('admin.order.list',[
            'tiltle'=>'List Order',
            'orders'=> $this->orderService->getAll()
        ]);
    }
    public function detail($id){
        return view('admin/order/detail',[
            'tiltle'=>'Detail Order',
            'orders'=>$this->orderService->getById($id),
        ]);
    }
}
