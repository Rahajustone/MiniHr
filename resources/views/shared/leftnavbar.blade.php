<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('employee.index') }}">
                <i class="mdi mdi-account-multiple menu-icon"></i>
                <span class="menu-title">Employees</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('position.index') }}">
                <i class="mdi mdi-view-headline menu-icon"></i>
                <span class="menu-title">Positions</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('department.index') }}">
                <i class="mdi mdi-chart-pie menu-icon"></i>
                <span class="menu-title">Departments</span>
            </a>
        </li>
    </ul>
</nav>