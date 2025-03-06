<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Service\Product\ProductService;
class ProductController extends Controller
{
    protected $productService;
    public function __construct(ProductService $productService){
        $this->productService = $productService;
    }

    public function index($id  ='', $slug = ''){
        $product = $this->productService->show($id);
        $productMore = $this->productService->more($id);
        return view('product',[
            'tiltle'=>'Chi tiết sản phẩm',
            'product'=>$product,
            'productMore'=>$productMore,
        ]);
    }
}
