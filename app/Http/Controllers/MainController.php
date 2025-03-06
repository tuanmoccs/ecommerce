<?php

namespace App\Http\Controllers;
use App\Http\Service\Menu\MenuService;
use App\Http\Service\Product\ProductService;
use App\Models\Product;
use Illuminate\Http\Request;

class MainController extends Controller{
    protected $menu;
    protected $product;
    public function __construct(MenuService $menu,ProductService $product){
        $this->menu = $menu;
        $this->product = $product;
    }

    public function index()
    {
        return view('main', [
            'title' => 'Shop TA',
            'menu' => $this->menu->show(),
            'activeproducts' => $this->product->getByActive(1, 8), // Lấy 8 sản phẩm active = 1
            'inactiveproducts' => $this->product->getByActive(0, 8) // Lấy 8 sản phẩm active = 0
        ]);
    }

    // Trang sản phẩm - lấy 16 sản phẩm (có thể phân trang)
    public function products()
    {
        $products = Product::where('active', 1)->paginate(12);

        return view('list', [
            'title' => 'Toàn bộ sản phẩm',
            'menus' => $this->menu->show(),
            'allproducts' => $products
        ]);
    }
    public function contact(){
        return view('contact');
    }
}
