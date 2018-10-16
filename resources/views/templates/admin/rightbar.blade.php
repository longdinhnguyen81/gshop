<div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse">
                        <ul class="nav" id="side-menu">
                            <li class="sidebar-search">
                                <!-- /input-group -->
                            </li>
                            <li>
                                <a href="{{route('admin.index.index')}}"  class="{{ (Request::is('admin') ? 'active': '') }}" style="font-weight: bold"><i class="fa fa-dashboard fa-fw"></i> Trang chủ</a>
                            </li>
                            <li>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="{{route('admin.cat.index')}}" class="{{ (Request::is('admin/cat*') ? 'active': '') }}"><i class="fa fa-sitemap fa-fw"></i>Quản lý danh mục</a>
                                    </li>
                                    <li>
                                        <a href="{{route('admin.produce.index')}}" class="{{ (Request::is('admin/travel*') ? 'active': '') }}"><i class="fa fa-bar-chart-o fa-fw"></i>Quản lý giỏ hàng</a>
                                    </li>
                                    <li>
                                        <a href="{{route('admin.users.index')}}" class="{{ (Request::is('admin/users*') ? 'active': '') }}"><i class="fa fa-qrcode fa-fw"></i>Quản lý người dùng</a>
                                    </li>
                                    <li>
                                        <a href="{{route('admin.admin.index')}}" class="{{ (Request::is('admin/admin*') ? 'active': '') }}"><i class="fa fa-qrcode fa-fw"></i>Quản lý admin</a>
                                    </li>
                                    <li>
                                        <a href="{{route('admin.payment.index')}}" class="{{ (Request::is('admin/payment*') ? 'active': '') }}"><i class="fa fa-pencil fa-fw"></i>Quản lý đơn hàng</a>
                                    </li>
                                    <li>
                                        <a href="{{route('admin.card.index')}}" class="{{ (Request::is('admin/card*') ? 'active': '') }}"><i class="fa fa-refresh fa-fw"></i>Quản lý nhà mạng</a>
                                    </li>
                                    <li>
                                        <a href="{{route('admin.setcard.index')}}" class="{{ (Request::is('admin/card*') ? 'active': '') }}"><i class="fa fa-refresh fa-fw"></i>Quản lý thẻ cào</a>
                                    </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>