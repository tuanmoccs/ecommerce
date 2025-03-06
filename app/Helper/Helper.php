<?php

namespace App\Helper;

use Illuminate\Support\Str;

class Helper
{
    // Hàm đệ quy lấy danh sách menu
    public static function menu($menus, $parent_id = 0, $char = '')
    {
        $html = ''; // Biến chứa chuỗi HTML

        foreach ($menus as $key => $menu) {
            // Kiểm tra nếu parent_id của menu hiện tại khớp
            if ($menu['parent_id'] == $parent_id) {
                $html .= <<<HTML
                            <tr>
                                <td>{$menu['id']}</td>
                                <td>{$char}{$menu['name']}</td>
                                <td>{$menu['description']}</td>
                                <td>{$menu['active']}</td>
                                <td>
                                    <a class="btn btn-primary" href="/admin/menus/edit/{$menu['id']}">
                                        <i class="fa-solid fa-wrench"></i>
                                    </a>
                                    <a class="btn btn-danger" href="#"
                                    onclick="removeRow({$menu['id']}, '/admin/menus/destroy')">
                                        <i class="fa-solid fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                            HTML;

                // Xóa phần tử hiện tại để tránh lặp lại
                unset($menus[$key]);

                // Gọi đệ quy để xử lý các menu con
                $html .= self::menu($menus, $menu['id'], $char . '--');
            }
        }

        return $html; // Trả về chuỗi HTML
    }
    public static function active($active = 0): string
    {
        return $active == 0 ? '<span class="btn btn-danger btn-xs">NO</span>'
            : '<span class="btn btn-success btn-xs">YES</span>';
    }
    public static function menus($menus, $parent_id = 0) {
        $html = '';
        foreach ($menus as $key => $menu) {
            if ($menu['parent_id'] == $parent_id) {
                $html .= '
                <li class="nav-item">
                    <a class = "nav-link" href="/danh-muc/' . $menu['id'] . '-' . Str::slug($menu['name'], '-') . '.html">
                        ' . $menu['name'] . '
                    </a>
                </li>';
            }
        }
        return $html;
    }

    public function price($price = 0 , $price_sale = 0)
    {
        if($price_sale != 0){return $price_sale;}
        if($price != 0){return $price;}
        return '<a href = "lien-he.html">Liên Hệ</a>';
    }
}
