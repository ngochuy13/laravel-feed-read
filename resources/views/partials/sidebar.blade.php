<div class="sidebar" data-background-color="white" data-active-color="danger">

    <!--
        Tip 1: you can change the color of the sidebar's background using: data-background-color="white | black"
        Tip 2: you can change the color of the active button using the data-active-color="primary | info | success | warning | danger"
    -->

    <div class="sidebar-wrapper">
        <div class="logo text-center">
            <a href="{{ url('/') }}"><img src="/images/logo.jpg" alt="saigon phuong dong" width="140"></a>
        </div>

        <ul class="nav">
            <li class="{{ Request::is('/') ? 'active' : '' }}">
                <a href="{{ url('/') }}">
                    <i class="ti-panel"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="{{ Request::route()->getName() == 'Customer.request' ? 'active' : '' }}">
                <a href="{{ route('Customer.request') }}">
                    <i class="ti-file"></i>
                    <p>Yêu cầu KH</p>
                </a>
            </li>
            <li class="{{ Request::route()->getName() == 'Customer.create' ? 'active' : '' }}">
                <a href="{{ route('Customer.create') }}">
                    <i class="ti-user"></i>
                    <p>Tạo mới KH</p>
                </a>
            </li>
            <li class="{{ Request::route()->getName() == 'Order.index' ? 'active' : '' }}">
                <a href="{{ route('Order.index') }}">
                    <i class="ti-shopping-cart"></i>
                    <p>Danh sách Đơn Hàng</p>
                </a>
            </li>
            <li class="{{ Request::route()->getName() == 'Order.filter' ? 'active' : '' }}">
                <a href="{{ route('Order.filter') }}">
                    <i class="ti-shopping-cart-full"></i>
                    <p>Filter Đơn Hàng</p>
                </a>
            </li>
            <li>
            <li class="{{ Request::route()->getName() == 'Customer.list' ? 'active' : '' }}">
                <a href="{{ route('Customer.list') }}">
                    <i class="ti-server"></i>
                    <p>Danh sách KH</p>
                </a>
            </li>
            <li class="{{ Request::route()->getName() == 'User.index' ? 'active' : '' }}">
                <a href="{{ route('User.index') }}">
                    <i class="ti-user"></i>
                    <p>Danh sách tài khoản</p>
                </a>
            </li>
            <li class="{{ Request::route()->getName() == 'Role.index' ? 'active' : '' }}">
                <a href="{{ route('Role.index') }}">
                    <i class="ti-stamp"></i>
                    <p>Chức Vụ</p>
                </a>
            </li>
            <li class="{{ Request::route()->getName() == 'Roles.permissions' ? 'active' : '' }}">
                <a href="{{ route('Roles.permissions') }}">
                    <i class="ti-settings"></i>
                    <p>Quyền Hạn</p>
                </a>
            </li>
        </ul>
    </div>
</div>
