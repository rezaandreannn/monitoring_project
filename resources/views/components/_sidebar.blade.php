<aside id="sidebar-wrapper">
    <div class="sidebar-brand">
        <a href="index.html">Monitoring Project</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
        <a href="index.html">MJ</a>
    </div>
    <ul class="sidebar-menu">
        <li class="menu-header">Dashboard</li>
        <li class="nav-item dropdown">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Dashboard</span></a>
            <ul class="dropdown-menu">
                <li><a class="nav-link" href="index-0.html">General Dashboard</a></li>
                {{-- <li><a class="nav-link" href="index.html">Ecommerce Dashboard</a></li> --}}
            </ul>
        </li>
        <li class="menu-header">Starter</li>
        <li class="nav-item dropdown">
            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Master
                    Data </span></a>
            <ul class="dropdown-menu">
                <li><a class="nav-link" href="layout-top-navigation.html">Category</a></li>
            </ul>
        </li>

        <li class="menu-header">Task</li>

        <li class="{{ request()->is('schedule*') ? 'active' : '' }}"><a class="nav-link"
                href="{{ route('schedule.index')}}"><i class="fas fa-calendar-alt"></i>
                <span>Schedule</span></a>
        </li>
        <li><a class="nav-link" href="blank.html"><i class="fas fa-plane-arrival"></i></i>
                <span>Planning</span></a>
        </li>
        <li><a class="nav-link" href="blank.html"> <i class="fas fa-tasks"></i></i>
                <span>Task</span></a>
        </li>
        <li class="menu-header">Manage role</li>
        <li class="nav-item dropdown">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-unlock-alt"></i>
                <span>Role And Permission</span></a>
            <ul class="dropdown-menu">
                <li><a href="{{ route('role.index')}}">Role</a></li>
                <li><a href="auth-login.html">Permission</a></li>
            </ul>
        </li>
        <li><a class="nav-link" href="blank.html"><i class="far fa-user"></i> <span>Account</span></a></li>


    </ul>

    <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
        <a href="https://getstisla.com/docs" class="btn btn-primary btn-lg btn-block btn-icon-split">
            <i class="fas fa-rocket"></i> Documentation
        </a>
    </div>
</aside>
