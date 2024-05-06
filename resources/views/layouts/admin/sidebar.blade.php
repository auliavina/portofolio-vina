<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Portofolio Vina</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ request()->is('home') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('home') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Menu
    </div>

    <!-- About-->
    <li class="nav-item {{ request()->is('about*') ? 'active' : '' }}">
        <a class="nav-link collapsed" href="{{ route('about') }}" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Abouts</span>
        </a>
    </li>

    <!-- Skil-->
    <li class="nav-item {{ request()->is('skill*') ? 'active' : '' }}">
        <a class="nav-link collapsed" href="{{ route('skill') }}" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Skill</span>
        </a>
    </li>

    <!-- Education-->
    <li class="nav-item {{ request()->is('education*') ? 'active' : '' }}">
        <a class="nav-link collapsed" href="{{ route('education') }}" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Education</span>
        </a>
    </li>

    <!-- Experience-->
    <li class="nav-item {{ request()->is('experience*') ? 'active' : '' }}">
        <a class="nav-link collapsed" href="{{ route('experience') }}" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Experience</span>
        </a>
    </li>

    <!-- E-Commerce-->
    <li class="nav-item {{ request()->is('product*') ? 'active' : '' }}">
        <a class="nav-link collapsed" href="{{ route('product') }}" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Product</span>
        </a>
    </li>

    <!-- Pesanan-->
    <li class="nav-item {{ request()->is('pesanan*') ? 'active' : '' }}">
        <a class="nav-link collapsed" href="{{ route('pesanan') }}" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Pesanan</span>
        </a>
    </li>

    <!-- Contact-->
    <li class="nav-item {{ request()->is('contact*') ? 'active' : '' }}">
        <a class="nav-link collapsed" href="{{ route('contact') }}" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Contact</span>
        </a>
    </li>

    <!-- Nav Item - Tables -->
    {{-- <li class="nav-item">
        <a class="nav-link" href="tables.html">
            <i class="fas fa-fw fa-table"></i>
            <span>Tables</span></a>
    </li> --}}

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
