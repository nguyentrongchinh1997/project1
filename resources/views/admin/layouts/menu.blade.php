<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li class="sidebar-search">
                <div class="input-group custom-search-form">
                    <input type="text" class="form-control" placeholder="Search...">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="button">
                            <i class="fa fa-search"></i>
                        </button>
                    </span>
                </div>
            </li>
            <li>
                <a href="#"><i class="fa fa-dashboard fa-fw"></i> {{ trans('message.admin.menu') }}</a>
            </li>
            <li>

                <a href="admin/theloai/danhsach"><i class="fa fa-bar-chart-o fa-fw"></i>{{ trans('message.admin.category') }} <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ route('category.add') }}">{{ trans('message.admin.add') }}</a>
                    </li>
                    <li>
                        <a href="{{ route('category.list') }}">{{ trans('message.admin.list') }} </a>
                    </li>
                    
                </ul>
            </li>
            <li>
                <a href="admin/tintuc/danhsach"><i class="fa fa-bar-chart-o fa-fw"></i>{{ trans('message.admin.post') }}<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ route('post.add') }}">{{ trans('message.admin.add') }}</a>
                    </li>
                    <li>
                        <a href="{{ route('post.list') }}">{{ trans('message.admin.list') }}</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="admin/tintuc/danhsach"><i class="fa fa-bar-chart-o fa-fw"></i>{{ trans('message.admin.document') }}<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ route('document.add') }}">{{ trans('message.admin.add') }}</a>
                    </li>
                    <li>
                        <a href="{{ route('document.list') }}">{{ trans('message.admin.list') }}</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i>{{ trans('message.admin.user') }}<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="admin/user/danhsach">{{ trans('message.admin.add') }}</a>
                    </li>
                    <li>
                        <a href="admin/user/them">{{ trans('message.admin.list') }}</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>
