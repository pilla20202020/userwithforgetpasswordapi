<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Main</li>

                <li>
                    <a href="{{route('dashboard')}}" class="waves-effect">
                        <i class="mdi mdi-speedometer"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                @role('SuperAdmin')

                    <li>
                        <a href="javascript: void(0);" class="has-arrow" aria-expanded="false">
                            <i class="mdi mdi-share-variant"></i>
                            <span>Admin</span>
                        </a>
                        <ul class="sub-menu mm-collapse" aria-expanded="true">
                            <li><a href="{{ route('user.index')}}" aria-expanded="false"><i class="fas fa-user"></i></i> User</a></li>
                            <li><a href="{{ route('role.index')}}" aria-expanded="false"><i class="fa fa-tasks"></i> Roles</a></li>
                            <li><a href="{{ route('permission.index')}}" aria-expanded="false"><i class="fa fa-lock"></i> Permissions</a></li>
                        </ul>
                    </li>
                @endrole

                @role('Staff')
                    <li>
                        <a href="{{route('user.index','student')}}" class="waves-effect">
                            <i class="fas fa-user"></i>
                            <span>Student</span>
                        </a>
                    </li>
                @endrole

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
