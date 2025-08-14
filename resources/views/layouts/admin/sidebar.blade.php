<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">

        {{-- Dashboard --}}
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>

        {{-- Role Users --}}
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('admin.role*') ? '' : 'collapsed' }}"
               data-bs-toggle="collapse" href="#role"
               aria-expanded="{{ request()->routeIs('admin.role*') ? 'true' : 'false' }}">
                <i class="icon-layout menu-icon"></i>
                <span class="menu-title">Administration</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse {{ request()->routeIs('admin.role*') ? 'show' : '' }}" id="role">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('admin.role') ? 'active' : '' }}"
                           href="{{ route('admin.role') }}">Role</a>
                    </li>
                     <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('admin.permission') ? 'active' : '' }}"
                           href="{{ route('admin.permission') }}">Permission</a>
                    </li>
                </ul>
            </div>
        </li>

        {{-- Institute --}}
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('admin.institute*') ? '' : 'collapsed' }}"
               data-bs-toggle="collapse" href="#institute"
               aria-expanded="{{ request()->routeIs('admin.institute*') ? 'true' : 'false' }}">
                <i class="icon-layout menu-icon"></i>
                <span class="menu-title">Institute</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse {{ request()->routeIs('admin.institute*') ? 'show' : '' }}" id="institute">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('admin.institute') ? 'active' : '' }}"
                           href="{{ route('admin.institute') }}">Manage</a>
                    </li>
                </ul>
            </div>
        </li>

        {{-- Category --}}
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('admin.category*') ? '' : 'collapsed' }}"
               data-bs-toggle="collapse" href="#category"
               aria-expanded="{{ request()->routeIs('admin.category*') ? 'true' : 'false' }}">
                <i class="icon-layout menu-icon"></i>
                <span class="menu-title">Category</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse {{ request()->routeIs('admin.category*') ? 'show' : '' }}" id="category">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('admin.category') ? 'active' : '' }}"
                           href="{{ route('admin.category') }}">Manage</a>
                    </li>
                </ul>
            </div>
        </li>

        {{-- Product --}}
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('admin.product*') || request()->routeIs('admin.variant*') ? '' : 'collapsed' }}"
               data-bs-toggle="collapse" href="#product"
               aria-expanded="{{ request()->routeIs('admin.product*') || request()->routeIs('admin.variant*') ? 'true' : 'false' }}">
                <i class="icon-layout menu-icon"></i>
                <span class="menu-title">Product</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse {{ request()->routeIs('admin.product*') || request()->routeIs('admin.variant*') ? 'show' : '' }}" id="product">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('admin.product') ? 'active' : '' }}"
                           href="{{ route('admin.product') }}">Manage</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('admin.variant*') ? 'active' : '' }}"
                           href="{{ route('admin.variant') }}">Variants</a>
                    </li>
                </ul>
            </div>
        </li>

    </ul>
</nav>
