<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item menu-open">
        <a href="#" class="nav-link {{ request()->is('admin/content/*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
            Quản trị nội dung
            <i class="right fas fa-angle-left"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{route('category.index')}}" class="nav-link {{ request()->is('admin/content/category*') ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Category</p>
                </a>
            </li>
        </ul>

        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{route('product.index')}}" class="nav-link {{ request()->is('admin/content/product*') ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Product</p>
                </a>
            </li>
        </ul>

        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{route('new.index')}}" class="nav-link {{ request()->is('admin/content/new*') ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>New</p>
                </a>
            </li>
        </ul>

        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{route('banner.index')}}" class="nav-link {{ request()->is('admin/content/banner*') ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Banner</p>
                </a>
            </li>
        </ul>

        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{route('faq.index')}}" class="nav-link {{ request()->is('admin/content/faq*') ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>FAQ</p>
                </a>
            </li>
        </ul>
        </li>
    </ul>

    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item menu-open">
            <a href="#" class="nav-link {{ request()->is('admin/order/*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                Quản lý đơn hàng
                <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{route('order.index')}}" class="nav-link {{ request()->is('admin/order/order*') ? 'active' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Order</p>
                    </a>
                </li>
            </ul>

            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{route('file.index')}}" class="nav-link {{ request()->is('admin/file/*') ? 'active' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>File</p>
                    </a>
                </li>
            </ul>
        </li>
    </ul>

    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item menu-open">
            <a href="#" class="nav-link {{ request()->is('admin/user/*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                Quản lý người dùng
                <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{route('user.index')}}" class="nav-link {{ request()->is('admin/user/user*') ? 'active' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>User</p>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</nav>
