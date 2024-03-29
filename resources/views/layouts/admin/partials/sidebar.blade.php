<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item {{ Request::segment(1) === 'dashboard' ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('dashboard') }}">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item {{ Request::segment(1) === 'about_us' ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('about_us.index') }}">
                <i class="icon-heart menu-icon"></i>
                <span class="menu-title">About Us</span>
            </a>
        </li>
        <li class="nav-item {{ Request::segment(1) === 'courses' ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('courses.index') }}">
                <i class="icon-ribbon menu-icon"></i>
                <span class="menu-title">Data Courses</span>
            </a>
        </li>
        <li class="nav-item {{ Request::segment(1) === 'customers' ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('customers.index') }}">
                <i class="icon-head menu-icon"></i>
                <span class="menu-title">Data User</span>
            </a>
        </li>
        <li class="nav-item {{ Request::segment(1) === 'transactions' ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('transactions.index') }}">
                <i class="icon-paper menu-icon"></i>
                <span class="menu-title">Data Transactions</span>
            </a>
        </li>
    </ul>
</nav>
