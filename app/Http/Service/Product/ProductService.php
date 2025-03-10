<?php

namespace App\Http\Service\Product;

use App\Models\Product;
use App\Models\Review;

class ProductService
{
    const DEFAULT_LIMIT = 8;

    public function getByActive($active, $limit = self::DEFAULT_LIMIT)
    {
        return Product::select('id', 'name', 'price', 'price_sale', 'thumb')
            ->where('active', $active) // Lọc theo trạng thái active
            ->orderByDesc('id')
            ->limit($limit)
            ->get() ?? collect();
    }
    public function show($id){
        return Product::where('id', $id)->where('active', 1)->with('menu')->firstOrFail();
    }
    public function more($id)
    {
        return Product::select('id', 'name', 'price', 'price_sale', 'thumb')
            ->where('active', 1)
            ->where('id', '!=', $id)
            ->orderByDesc('id')
            ->limit(9)
            ->get();
    }
    public function getReviews($productId)
    {
        return Review::where('product_id', $productId)
            ->with('user')
            ->orderByDesc('created_at')
            ->get();
    }
}
