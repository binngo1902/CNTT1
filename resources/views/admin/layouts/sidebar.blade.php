<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <div class="brand-link">
        <img src="../dist/img/logoriver.jfif" alt="Rivercrane Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Rivercrane</span>
        </div>
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      {{-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        @if (Auth::check())
        <div class="info">
          <a href="#" class="d-block">{{Auth::user()->email}}</a>

        </div>
        <a href="{{route('logout')}}" type="button" class="btn btn-default btn-sm">
            <span class="glyphicon glyphicon-log-out"></span> Log out
          </a>
        @endif

      </div> --}}

        <!-- SidebarSearch Form -->
      {{-- <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div> --}}

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item ">
            <a class="nav-link ">
              <i class="nav-icon fab fa-product-hunt"></i>

                <p>
                Sản phẩm
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('getListProduct')}}" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh sách</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('newProduct')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Thêm sản phẩm</p>
                </a>
              </li>

            </ul>
          </li>
          <li class="nav-item">
            <a href="{{route('getListUser')}}" class="nav-link">
                <i class="fas fa-user nav-icon"></i>

                <p>
                Users
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('getListCustomer')}}" class="nav-link">
                <i class="fas fa-address-card nav-icon"></i>
                <p>
                Khách hàng
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('getListOrder')}}" class="nav-link">
                <i class="far fa-file-alt nav-icon"></i>
                <p>
                Đơn hàng
              </p>
            </a>
          </li>



        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
