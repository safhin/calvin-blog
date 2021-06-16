<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex justify-content-between">
                <div class="logo">
                    <a href="{{ route('dashboard') }}"><img src="{{ asset('backend/assets/images/logo/logo.png') }}" alt="Logo"></a>
                </div>
                <div class="toggler">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-title">Menu</li>

                <li class="sidebar-item active ">
                    <a href="{{ route('dashboard') }}" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="sidebar-item  has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-grid-1x2-fill"></i>
                        <span>Posts</span>
                    </a>
                    <ul class="submenu ">
                        <li class="submenu-item ">
                            <a href="{{ route('posts.index') }}">Manage Posts</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="{{ route('posts.create') }}">Create Post</a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-item">
                    <a href="{{ route('categories.index') }}" class='sidebar-link'>
                        <i class="bi bi-stack"></i>
                        <span>Categories</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a href="{{ route('tags.index') }}" class='sidebar-link'>
                        <i class="bi bi-collection-fill"></i>
                        <span>Tags</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="{{ route('users') }}" class='sidebar-link'>
                        <i class="bi bi-image-fill"></i>
                        <span>Users</span>
                    </a>
                </li>
            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>