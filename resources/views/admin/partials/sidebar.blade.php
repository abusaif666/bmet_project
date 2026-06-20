<div class="sidebar">

    <div class="logo">
        <a href="{{ route('admin.dashboard') }}">
            <img src="{{ $websiteSetting && $websiteSetting->logo
                ? asset('storage/setting/' . $websiteSetting->logo)
                : asset('assets/images/logo.png') }}"
                alt="Logo">
        </a>
    </div>

    <div class="menu">
        <ul>

            {{-- Dashboard --}}
            <li class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <a href="{{ route('admin.dashboard') }}"><span><i data-lucide="home"></i> Dashboard </span></a>
            </li>


            {{-- BMET Menu --}}
<li class="has-submenu {{ request()->routeIs('bmet.create') || request()->routeIs('bmet.index') || request()->routeIs('bmet.edit') ? 'active' : '' }}">
    <a href="javascript:void(0)">
        <span> <i data-lucide="users"></i> BMET </span>
        <i class="fa-solid fa-angle-right arrow"></i>
    </a>
    <ul class="submenu">
        <li> <a href="{{ route('bmet.create') }}"> Add BMET </a></li>
        <li> <a href="{{ route('bmet.index') }}"> BMET List </a></li>
    </ul>
</li>

         


            {{-- User Menu --}}
            <li
                class="has-submenu {{ request()->routeIs('user.create') || request()->routeIs('user.index') ? 'active' : '' }}">
                <a href="javascript:void(0)"> <span> <i data-lucide="user"></i> User </span> <i
                        class="fa-solid fa-angle-right arrow"></i> </a>
                <ul class="submenu">
                    <li> <a href="{{ route('user.create') }}"> Add User </a></li>
                    <li> <a href="{{ route('user.index') }}"> User List </a></li>
                </ul>
            </li>


      


            {{-- Setting Menu --}}
            <li
                class="has-submenu {{ request()->routeIs('general.setting') || request()->routeIs('website.setting') ? 'active' : '' }}">
                <a href="javascript:void(0)"> <span> <i data-lucide="settings"></i> Setting </span> <i
                        class="fa-solid fa-angle-right arrow"></i> </a>
                <ul class="submenu">
                    <li> <a href="{{ route('general.setting') }}"> General Settings </a></li>
                    <li> <a href="{{ route('website.setting') }}"> Website Settings </a></li>
                </ul>
            </li>

        </ul>
    </div>

</div>

<div class="sidebar_overlay"></div>

<button class="menu-toggle">
    Toggle Menu
</button>
