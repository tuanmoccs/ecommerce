<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\ProductRequest;

use App\Http\Service\Product\ProductAdminService;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $productService;

    public function __construct(ProductAdminService $productService)
    {
        $this->productService = $productService;
    }
    public function index()
    {
        return view('admin/product/list',[
            'tiltle'=>'Danh sách sản phẩm ',
            'products'=> $this->productService->get()
        ]);
    }

    public function create()
    {
        return view('admin/product/add', [
            'tiltle' => 'Thêm sản phẩm mới',
            'menus' => $this->productService->getMenu()
        ]);
    }


    public function store(ProductRequest $request)
    {

        $this->productService->insert($request);

        return redirect()->back();
    }


    public function show(Product $product) // kiem tra xem cai product trong route co hay chua
    {
        return view('admin.product.edit',[
            'tiltle' => 'Chỉnh sửa sản phẩm' ,
            'product'=> $product,
            'menus' => $this->productService->getMenu()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, Product $product)
    {
        $result =  $this->productService->update($request, $product);
        if($result){
            return redirect('admin/product/list');
        }
        return redirect()->back();
    }


    public function destroy( Request $request)
    {
        $result = $this->productService->delete($request);
        if ($result) {
            return response()->json([
                'error' => false,
                'massage'=>'Xoá sản phẩm thành công'
            ]);
        }
        return response()->json([
            'error' => true
        ]);
        return redirect()->back();
    }
}
