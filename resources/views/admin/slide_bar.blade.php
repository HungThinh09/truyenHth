
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{url('/')}}" class="brand-link">
        <img src="/template/admin/dist/img/AdminLTELogo.png" alt="Hungthinh Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Truyện HTH</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="/template/admin/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{$admin->name}}</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Danh sách
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('theloai.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p> Thể loại</p>
                            </a>
                        </li>
                         <li class="nav-item">
                            <a href="{{route('truyen.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Truyện</p>
                            </a>
                        </li>
                    </ul>
                </li>
                 <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Thêm
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('theloai.create')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Thêm thể loại</p>
                            </a>
                        </li>
                         <li class="nav-item">
                            <a href="{{route('truyen.create')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Thêm truyện</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Action
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('theloai.create')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Action 1</p>
                            </a>
                        </li>
                         <li class="nav-item">
                            <a href="{{route('truyen.create')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Action 2</p>
                            </a>
                        </li>
                    </ul>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
