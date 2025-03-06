<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex justify-content-between">
                <div class="logo">
                    <a href="/admin"><img src="/Template/admin/assets/images/logo/logo.png" alt="Logo" srcset=""></a>
                </div>
                <div class="toggler">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-title">Menu</li>

                <li class="sidebar-item  ">
                    <a href="/admin" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Trang chủ</span>
                    </a>
                </li>

                <li class="sidebar-item  has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-stack"></i>
                        <span>Danh mục</span>
                    </a>
                    <ul class="submenu ">
                        <li class="submenu-item ">
                            <a href="/admin/menus/add">Thêm danh mục</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="/admin/menus/list">Danh sách danh mục</a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-item  has-sub">
                    <a href="" class='sidebar-link'>
                        <i class="bi bi-collection-fill"></i>
                        <span>Sản phẩm</span>
                    </a>
                    <ul class="submenu ">
                        <li class="submenu-item ">
                            <a href="/admin/product/add">Thêm sản phẩm</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="/admin/product/list">Danh sách sản phẩm</a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-item  has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="fa-solid fa-user"></i>
                        <span>Người dùng</span>
                    </a>
                    <ul class="submenu ">
                        <li class="submenu-item ">
                            <a href="/admin/users/list">Danh sách người dùng</a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item  has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="fa-solid fa-user"></i>
                        <span>Đơn hàng </span>
                    </a>
                    <ul class="submenu ">
                        <li class="submenu-item ">
                            <a href="/admin/orders/list">Danh sách đơn hàng</a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item  has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-person-badge-fill"></i>
                        <span>Tài khoản</span>
                    </a>
                    <ul class="submenu ">
                        <li class="submenu-item ">
                            <a href="auth-login.html">Thông tin</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="auth-register.html">Đổi mật khẩu</a>
                        </li>
                        <li class="submenu-item ">
                            <a>
                            <form action="{{ route('logout') }}" method="POST" >
                                @csrf
                                <button type="submit" style="border: none; background: none; cursor: pointer;
                                color: #25396f;font-size: .85rem; font-weight: 600;margin-left: -5px ">
                                    Đăng xuất
                                </button>
                            </form>
                            </a>
                        </li>
                    </ul>
                </li>





            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>
