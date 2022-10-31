<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="{{ asset('public/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">
            @if(Auth::user()->role == 1)
                Super Admin
            @elseif(Auth::user()->role == 2)
                Admin
            @elseif(Auth::user()->role == 3)
                Manager
            @endif
        </span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('public/assets-turist/images/'.Auth::user()->image) }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="{{ route('admin.edit', Auth::user()->id ) }}" class="d-block">{{ Auth::user()->name }}</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
{{--        <div class="form-inline">--}}
{{--            <div class="input-group" data-widget="sidebar-search">--}}
{{--                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">--}}
{{--                <div class="input-group-append">--}}
{{--                    <button class="btn btn-sidebar">--}}
{{--                        <i class="fas fa-search fa-fw"></i>--}}
{{--                    </button>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->


                <li class="nav-item">
                    <a href="#" class="nav-link {{Request::is('admin') ? 'active':'' }} ">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Profile
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">


                        <li class="nav-item">
                            <a href="{{ route('admin.edit',Auth::user()->id) }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Tahrirlash</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                <i class="far fa-circle nav-icon"></i>
                                {{ __('Chqish') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>

                    </ul>
                </li>

                <li class="nav-item">
                    <a href="{{ route('travel.index') }}" class="nav-link {{Request::is('travel') ? 'active':'' }}">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Travel
                            <span class="right badge badge-danger">New</span>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('carousel.index') }}" class="nav-link {{Request::is('carousel') ? 'active':'' }}">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Carousel
                            <span class="right badge badge-danger">New</span>
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('about.index') }}" class="nav-link {{Request::is('about') ? 'active':'' }}">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Biz haqimizda
                            <span class="right badge badge-danger">New</span>
                        </p>
                    </a>
                </li>








            </ul>

        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

