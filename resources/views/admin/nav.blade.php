<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            
        </div>
        <div class="info">
            <a href="#" class="d-block">{{ Auth::user()->name ?? '' }}</a>
        </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            @if(Auth::user()->role_id == 1)
            <li class="nav-item">
                <a href="{{ url('admin/dashboard')}}" class="nav-link {{ request()->route()->getName() == 'Admin User' ? 'active' : '' }}">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('admin/cancer-type')}}" class="nav-link {{ request()->route()->getName() == 'Manage Cancer Type' || request()->route()->getName() == 'Create Cancer Type' || request()->route()->getName() == 'Cancer Type Edit' ? 'active' : '' }}">
                    <i class="nav-icon fas fa-disease"></i>
                    <p>Manage Cancer Types</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('admin/doctors')}}" class="nav-link {{ request()->route()->getName() == 'Manage Doctors' || request()->route()->getName() == 'Edit Doctor' || request()->route()->getName() == 'Create Doctor' ? 'active' : '' }}">
                    <i class="nav-icon fas fa-user-md"></i>
                    <p>
                        Manage Doctors
                    </p>
                </a>
            </li>
            @endif
            @if(Auth::user()->role_id == 2)
            <li class="nav-item">
                <a href="{{ url('doctor/dashboard')}}" class="nav-link {{ request()->route()->getName() == 'Doctor User' ? 'active' : '' }}">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('doctor/patient-enquiry')}}" class="nav-link {{ request()->route()->getName() == 'Manage Patient Enquiry' || request()->route()->getName() == 'Patient Enquiry Details' ? 'active' : '' }}">
                    <i class="nav-icon fas fa-question-circle" aria-hidden="true"></i>
                    <p>Manage Patient Enquiry</p>
                </a>
            </li>
            @endif
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>