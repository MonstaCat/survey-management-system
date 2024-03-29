<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('admin') }}">
        <div class="sidebar-brand-icon">
            <i class="fas fa-lock"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Admin Panel</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ ($currentRoute === 'admin') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Users Management
    </div>

    <!-- Nav Item - Respondents -->
    <li class="nav-item {{ ($currentRoute === 'admin.respondents') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.respondents') }}">
            <i class="fas fa-fw fa-file"></i>
            <span>Respondents</span></a>
    </li>
    <li class="nav-item {{ ($currentRoute === 'admin.users') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.users') }}">
            <i class="fas fa-fw fa-users"></i>
            <span>Registered Users</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Questions Management
    </div>

    <!-- Nav Item - Question -->
    <li class="nav-item {{ ($currentRoute === 'admin.question' || $currentRoute === 'admin.question.update') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.question') }}">
            <i class="fas fa-fw fa-comments"></i>
            <span>Question</span></a>
    </li>

    <!-- Nav Item - Question Category -->
    <li class="nav-item {{ ($currentRoute === 'admin.category' || $currentRoute === 'admin.category.update') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.category') }}">
            <i class="fas fa-fw fa-list"></i>
            <span>Category</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->