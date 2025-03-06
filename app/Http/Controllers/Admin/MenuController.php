<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Menu\CreateFormRequest;
use App\Http\Service\Menu\MenuService;
use App\Models\Menu;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    protected $menuService;

    public function __construct(MenuService $menuService)
    {
        $this->menuService = $menuService;
    }

    public function create()
    {
        return view('admin.menu.add', [
            'tiltle' => 'Thêm Danh mục mới',
            'menus' => $this->menuService->getParent()
        ]);
    }
    public function store(CreateFormRequest $request)
    {
        $result = $this->menuService->create($request);
        return redirect()->back();
    }
    public function list()
    {
        return view('admin.menu.list', [
            'tiltle' => 'Danh Sách Danh Mục',
            'menus' => $this->menuService->getAll()
        ]);
    }
    public function edit(Menu $menu)
    {
        return view('admin.menu.edit', [
            'tiltle' => 'Chỉnh Sửa Danh Mục' . $menu->name,
            'menu' => $menu,
            'menus' => $this->menuService->getParent()
        ]);
    }
    public function update(Menu $menu, CreateFormRequest $request)
    {
        $this->menuService->update($request, $menu);
        return redirect('/admin/menus/list');
    }
    public function destroy(Request $request): JsonResponse
    {
        $result = $this->menuService->destroy($request);
        if ($result) {
            return response()->json([
                'error' => false,
                'message' => 'Xoá thành công danh mục'
            ]);
        }
        return response()->json([
            'error' => true
        ]);
    }
}
