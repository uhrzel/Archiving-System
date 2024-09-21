@auth
<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="/home">Archiving System</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="/home">
                <img src="{{ asset('img/tcu-logo.png') }}" class="logo h-10 w-10" alt="Logo">
            </a>
        </div>
        <ul class="sidebar-menu">

            @if (Auth::user()->role == 'admin')
            <li class="menu-header">Dashboard</li>
            <li class="{{ Request::is('home') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('home') }}"><i class="fas fa-fire"></i><span>Dashboard</span></a>
            </li>
            <li class="menu-header">Archive</li>
            <li class="{{ Request::is('admin/archive') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('admin/archive') }}"><i class="fas fa-user-shield"></i> <span>Archive List</span></a>
            </li>

            <li class="menu-header">Students</li>
            <li class="{{ Request::is('students') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('students') }}"><i class="fas fa-user-graduate"></i> <span>Students</span></a>
            </li>

            <li class="menu-header">Courses</li>
            <li class="{{ Request::is('admin/courses') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('admin/courses') }}"><i class="fas fa-book"></i> <span>Courses</span></a>
            </li>

            <li class="menu-header">Pending</li>
            <li class="{{ Request::is('admin/pending') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('admin/pending') }}"><i class="fas fa-hourglass-half"></i> <span>Pending</span></a>
            </li>
            @endif

            @if (Auth::user()->role == 'user')
            <li class="menu-header">Home</li>
            <li class="{{ Request::is('home') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('home') }}"><i class="fas fa-fire"></i><span>Home</span></a>
            </li>
            <li class="menu-header">Thesis</li>
            <li class="{{ Request::is('thesis') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('thesis') }}"><i class="fas fa-file-alt"></i> <span>Thesis</span></a>
            </li>

            <li class="menu-header">About</li>
            <li class="{{ Request::is('about') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('about') }}"><i class="fas fa-info-circle"></i> <span>About</span></a>
            </li>
            <li class="{{ Request::is('contact') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('contact') }}"><i class="fas fa-phone"></i> <span>Contact</span></a>
            </li>
            @endif
            <!-- profile change password -->
            <li class="menu-header">Profile</li>
            <li class="{{ Request::is('profile/edit') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('profile/edit') }}"><i class="far fa-user"></i> <span>Profile</span></a>
            </li>
            <li class="{{ Request::is('profile/change-password') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('profile/change-password') }}"><i class="fas fa-key"></i> <span>Change Password</span></a>
            </li>

        </ul>
    </aside>
</div>
@endauth