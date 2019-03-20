<div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{{asset('superadmin/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">Super Admin</a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
                        with font-awesome or any other icon font library -->
                        <li class="nav-item">
                            <a href="/admin/dashboard" class="nav-link {{ Request::is('admin/dashboard') ? 'active' : '' }}">
                                <i class="nav-icon fa fa-th"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/seller" class="nav-link {{ Request::is('admin/seller') ? 'active' : '' }}">
                                <i class="nav-icon fa fa-th"></i>
                                <p>
                                    Sellers
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/buyer" class="nav-link {{ Request::is('admin/buyer') ? 'active' : '' }}">
                                <i class="nav-icon fa fa-th"></i>
                                <p>
                                    Buyers
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/room" class="nav-link {{ Request::is('admin/room') ? 'active' : '' }}">
                                <i class="nav-icon fa fa-th"></i>
                                <p>
                                    Rooms
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/category" class="nav-link {{ Request::is('admin/category') ? 'active' : '' }}">
                                <i class="nav-icon fa fa-th"></i>
                                <p>
                                    Category
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/member" class="nav-link {{ Request::is('admin/member') ? 'active' : '' }}">
                                <i class="nav-icon fa fa-th"></i>
                                <p>
                                    Members
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/profile" class="nav-link {{ Request::is('admin/profile') ? 'active' : '' }}">
                                <i class="nav-icon fa fa-th"></i>
                                <p>
                                    Profile
                                </p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                            <i class="nav-icon fa fa-building"></i>
                            <p>
                                Frontend
                                <i class="right fa fa-angle-left"></i>
                            </p>
                            </a>
                            <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>Room Lists</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>Add New Room</p>
                                </a>
                            </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                <i class="nav-icon fa fa-sign-out"></i>
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>