<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Service\Menu\MenuService;

class MenuController extends Controller
{
    private $menuService;
    public function __construct(MenuService $menuService){
        $this->menuService = $menuService;
    }
    public function index(Request $request,$id,$slug){
        $menu = $this->menuService->getId($id);


        $products = $this->menuService->getProduct($menu,$request);

        return view('cate',[
            'tiltle'=> $menu->name,
            'products' => $products,
            'menushow'=> $this->menuService->show(),
            'menus' => $menu
        ]);
    }
}
