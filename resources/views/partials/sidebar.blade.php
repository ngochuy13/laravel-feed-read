<div class="sidebar" data-background-color="white" data-active-color="danger">

    <!--
        Tip 1: you can change the color of the sidebar's background using: data-background-color="white | black"
        Tip 2: you can change the color of the active button using the data-active-color="primary | info | success | warning | danger"
    -->

    <div class="sidebar-wrapper">
        <div class="logo text-center">
            <a href="{{ url('/') }}">8bitrockstars</a>
        </div>

        <ul class="nav">
            <li class="{{ Request::is('/') ? 'active' : '' }}">
                <a href="{{ url('/') }}">
                    <i class="ti-panel"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li>
                <a href="{{ route('Import.index') }}">
                    <i class="ti-server"></i>
                    <p>Import</p>
                </a>
            </li>
            <li>
                <a href="{{ route('Blog.index') }}">
                    <i class="ti-list"></i>
                    <p>Blog</p>
                </a>
            </li>
        </ul>
    </div>
</div>
