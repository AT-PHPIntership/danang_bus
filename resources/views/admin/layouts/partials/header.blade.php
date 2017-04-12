<header class="main-header">
  <!-- Logo -->
  <a href="index2.html" class="logo">
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><b>{{trans('admin.admin')}}</b>{{trans('admin.danabus')}}</span>
  </a>
  <!-- Header Navbar: style can be found in header.less -->
  <nav class="navbar navbar-static-top">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
      <span class="sr-only">Toggle navigation</span>
    </a>

    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        <!-- Messages: style can be found in dropdown.less-->
        <li class="dropdown messages-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="fa fa-envelope-o"></i>
            <span class="label label-success"></span>
          </a>
        </li>
        <!-- Notifications: style can be found in dropdown.less -->
        <li class="dropdown notifications-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="fa fa-bell-o"></i>
            <span class="label label-warning"></span>
          </a>
        </li>
        <!-- User Account: style can be found in dropdown.less -->
        @if (Auth::guest())
            <li><a href="{{ route('login') }}">{{trans('admin.login')}}</a></li>
            <li><a href="{{ route('register') }}">{{trans('admin.register')}}</a></li>
        @else
        <li class="dropdown user user-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <img src="{{asset('bower_components/AdminLTE/dist/img/user2-160x160.jpg')}}" class="user-image" alt="User Image">
            <span class="hidden-xs">{{ Auth::user()->username }}</span>
          </a>
          <ul class="dropdown-menu">
            <!-- User image -->
            <li class="user-header">
              <img src="{{asset('bower_components/AdminLTE/dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
              <p>
                 {{ Auth::user()->username }}
              </p>
            </li>
            <!-- Menu Footer-->
            <li class="user-footer">
              <div class="pull-left">
                <a href="#" class="btn btn-default btn-flat">{{trans('admin.profile')}}</a>
              </div>
              <div class="pull-right">
                <a class="btn btn-default btn-flat" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                    {{trans('admin.logout')}}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
              </div>
            </li>
          </ul>
        </li>
        @endif
        <!-- Control Sidebar Toggle Button -->
        <li>
          <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
        </li>
      </ul>
    </div>
  </nav>
</header>
