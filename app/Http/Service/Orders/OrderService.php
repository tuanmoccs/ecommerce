<?php
namespace App\Http\Service\Orders;
use App\Models\Order;
use App\Models\OrderDetail;

class OrderService
{
    public function getAll()
    {
        return Order::with('OrderDetail')->orderByDesc('created_at')->paginate(15);
    }

    public function getById($id)
    {
        return Order::with('OrderDetail')->findOrFail($id);
    }
}
