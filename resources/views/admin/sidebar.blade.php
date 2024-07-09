<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <h2 class="text-center">TIENDAT</h2>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('templateAdmin/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
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
        <!-- Dashboard -->
        <li class="nav-item {{ (request()->is('admin*')) ? 'active' : '' }}">
          <a href="{{route('index')}}" class="nav-link {{ (request()->is('admin*')) ? 'active' : '' }}">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>Dashboard</p>
          </a>
        </li>

        <!-- Danh mục -->
        <li class="nav-item {{ (request()->is('category*') || request()->is('addcategory*') || request()->is('editcategory*')) ? 'menu-is-opening menu-open' : '' }}">
          <a href="{{route('categorylist')}}" class="nav-link {{ (request()->is('category*') || request()->is('addcategory*') || request()->is('editcategory*')) ? 'active' : '' }}">
            <i class="nav-icon fas fa-copy"></i>
            <p>
              Danh mục
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{route('categorylist')}}" class="nav-link {{ (request()->is('categorylist*')|| request()->is('editcategory*')) ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Danh sách danh mục</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('addcategory')}}" class="nav-link {{ (request()->is('addcategory*')) ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Thêm danh mục</p>
              </a>
            </li>
          </ul>
        </li>

        <!-- Sản phẩm -->
        <li class="nav-item {{ (request()->is('product*') || request()->is('addproduct*') || request()->is('editproduct*')) ? 'menu-is-opening menu-open' : '' }}">
          <a href="{{route('productlist')}}" class="nav-link {{ (request()->is('addproduct*') || request()->is('productlist*') || request()->is('editproduct*')) ? 'active' : '' }}">
            <i class="nav-icon fas fa-chart-pie"></i>
            <p>
              Sản phẩm
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{route('productlist')}}" class="nav-link {{ (request()->is('productlist*') || request()->is('editproduct*')) ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Danh sách sản phẩm</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('addproduct')}}" class="nav-link {{ (request()->is('addproduct*')) ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Thêm sản phẩm</p>
              </a>
            </li>
          </ul>
        </li>

        <!-- Đơn hàng -->
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-tree"></i>
            <p>
              Đơn hàng
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{route('orderlist')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Danh sách đơn hàng</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('orderlist')}}?status=0" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Chờ xác nhận</p>
              </a>
            </li>
          </ul>
        </li>

        <!-- Người dùng -->
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-edit"></i>
            <p>
              Người dùng
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Danh sách người dùng</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Chỉnh sửa thông tin</p>
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