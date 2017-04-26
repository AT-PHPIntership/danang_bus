<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{asset('bower_components/AdminLTE/dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{trans('admin.admin')}}</p>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="active treeview">
          <a href="{{URL('admin/home')}}">
            <i class="fa fa-dashboard"></i> <span>{{trans('admin.home')}}</span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-bars" aria-hidden="true"></i>
            <span>{{trans('categories.category')}}</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('admin.categories.create')}}"><i class="fa fa-circle-o"></i>{{trans('admin.add')}} </a></li>
            <li><a href="{{route('admin.categories.index')}}"><i class="fa fa-circle-o"></i> {{trans('admin.list')}} </a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
          <i class="fa fa-newspaper-o" aria-hidden="true"></i>
            <span>{{trans('admin.news')}}</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('admin.news.create')}}"><i class="fa fa-circle-o"></i> {{trans('admin.add')}} </a></li>
            <li><a href="{{route('admin.news.index')}}"><i class="fa fa-circle-o"></i> {{trans('admin.list')}} </a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
           <i class="fa fa-random" aria-hidden="true"></i><span>{{trans('admin.route')}}</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('admin.routes.create')}}"><i class="fa fa-circle-o"></i> {{trans('admin.add')}} </a></li>
            <li><a href="{{route('admin.routes.index')}}"><i class="fa fa-circle-o"></i> {{trans('admin.list')}} </a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-bus" aria-hidden="true"></i> <span>{{trans('stops.stop')}}</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('admin.stops.create')}}"><i class="fa fa-circle-o"></i>  {{trans('admin.add')}} </a></li>
            <li><a href="{{route('admin.stops.index')}}"><i class="fa fa-circle-o"></i> {{trans('admin.list')}}  </a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-road" aria-hidden="true"></i> <span>{{trans('admin.direction')}}</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href=""><i class="fa fa-circle-o"></i> {{trans('admin.add')}} </a></li>
            <li><a href=""><i class="fa fa-circle-o"></i> {{trans('admin.list')}}  </a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-envelope-o" aria-hidden="true"></i><span>{{trans('admin.feedback')}}</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href=""><i class="fa fa-circle-o"></i> {{trans('admin.list')}}  </a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-user" aria-hidden="true"></i> <span>{{trans('admin.user')}}</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href=""><i class="fa fa-circle-o"></i> {{trans('admin.add')}} </a></li>
            <li><a href=""><i class="fa fa-circle-o"></i> {{trans('admin.list')}} </a></li>
          </ul>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>