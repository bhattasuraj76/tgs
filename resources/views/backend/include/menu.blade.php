@section('aside')
<!-- MENU SIDEBAR WRAPPER -->
<aside class="sidebar sidebar-left">
    <div class="sidebar-content">
        <nav class="main-menu">
            <ul class="nav metismenu">
                <li class="sidebar-header"><span>Admin Panel</span></li>
                <ul class="nav metismenu">
                    <li class="@yield('activeDashboard')">
                        <a href="{{ route('admin.dashboard') }}" aria-expanded="false"><i class="fas fa-home"></i><span> Dashboard</span></a>
                    </li>
                    @if($authUser->can('view-settings'))
                    <li class="nav-dropdown @yield('activeSetting')">
                        <a class="has-arrow" href="#" aria-expanded="false"><i class="fas fa-cog"></i>Settings</span></a>
                        <ul class="collapse nav-sub" aria-expanded="false">
                            <li class="@yield('activeWebsiteConfig')"><a href="{{ route('admin.setting.index') }}"><span>Website Config</span></a></li>
                            <!-- <li class="@yield('activeFileManger')"><a href="{{ url(config('lfm.url_prefix')) }}" target="_blank"><span>Media Manager</span></a></li> -->
                        </ul>
                    </li>
                    @endif

                    @if($authUser->can('view-logs'))
                    <li class="@yield('activeLog')">
                        <a href="{{ route('admin.log.index') }}" aria-expanded="false"><i class="fas fa-history"></i><span>Logs</span></a>
                    </li>
                    @endif

                    @if($authUser->can('view-users'))
                    <li class="nav-dropdown @yield('activeUserManagement')">
                        <a class="has-arrow" href="#" aria-expanded="false"><i class="fas fa-user-cog"></i>User Management</span></a>
                        <ul class="collapse nav-sub" aria-expanded="false">
                            <li class="@yield('activePermission')"><a href="{{ route('admin.permission.index') }}"><span>Permissions</span></a></li>
                            <li class="@yield('activeRole')"><a href="{{ route('admin.role.index') }}"><span>Roles</span></a></li>
                            <li class="@yield('activeUser')"><a href="{{ route('admin.user.index') }}"><span>User</span></a></li>
                        </ul>
                    </li>
                    @endif

                    @if($authUser->can('view-tokens'))
                    <li class="@yield('activeToken')">
                        <a href="{{ route('admin.token.index') }}" aria-expanded="false"><i class="	fas fa-sticky-note"></i><span>Tokens</span></a>
                    </li>
                    @endif

                    @if($authUser->can('view-departments'))
                    <li class="@yield('activeDepartment')">
                        <a href="{{ route('admin.department.index') }}" aria-expanded="false"><i class="fas fa-laptop"></i><span>Departments</span></a>
                    </li>
                    @endif

                    @if($authUser->can('view-holidays'))
                    <li class="@yield('activeHoliday')">
                        <a href="{{ route('admin.holiday.index') }}" aria-expanded="false"><i class="fas fa-holly-berry"></i><span>Holidays</span></a>
                    </li>
                    @endif

                    <!-- <li>
                        <a href="{{ route('admin.sitemap.create') }}" aria-expanded="false"><i class="fas fa-sitemap"></i><span>Generate Sitemap</span></a>
                    </li> -->

                    <li>
                        <a href="{{ route('admin.db.backup') }}" aria-expanded="false"><i class="fas fa-file-import"></i><span>Backup Database</span></a>
                    </li>

                </ul>
            </ul>
    </div>
</aside>
<!-- END MENU SIDEBAR WRAPPER -->
@endsection