@extends('admin.layouts.master')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
    @if(Session::has('success'))
        {{Session::get('success')}}
    @endif
    </div>
    <div class="col-md-10 col-md-offset-1">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">{{trans('admin_routes.list_route')}}</h3>
          
          <div class="box-tools">
            <ul class="pagination pagination-sm no-margin pull-right">
              <li><a href="#">{{$routes->render()}}</a></li>
            </ul>
          </div>
        </div>
        
        <!-- /.box-header -->
        <div class="box-body no-padding">
          <table class="table">
            <tr>
              <th style="width: 10px">{{trans('admin_routes.id')}}</th>
              <th>{{trans('admin_routes.routes')}}</th>
              <th>{{trans('admin_routes.distance')}}</th>
              <th>{{trans('admin_routes.type')}}</th>
              <th>{{trans('admin_routes.frequency')}}</th>
              <th>{{trans('admin_routes.frequency_peak')}}</th>
              <th>{{trans('admin_routes.start_time')}}</th>
              <th>{{trans('admin_routes.end_time')}}</th>
              <th>{{trans('admin_routes.action')}}</th>
            </tr>
            @foreach( $routes as $route)
            <tr>
              <td>{{$route->id}}</td>
              <td>{{$route->name}}</td>
              <td>{{$route->distance}}</td>
              <td>
              @if($route->type==1)
              {{trans('admin_routes.inter_municipal')}}
              @else
              {{trans('admin_routes.urban')}}
              @endif
              </td>
              <td>{{$route->frequency}}</td>
              <td>{{$route->frequency_peak}}</td>
              <td>{{$route->start_time}}</td>
              <td>{{$route->end_time}}</td>
              <td>
                <div class="btn-group">
                  <button type="button" class="btn btn-success">{{trans('admin_routes.action')}}</button>
                  <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">
                    <span class="caret"></span>
                    <span class="sr-only"></span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="{{route('routes.edit',$route->id)}}">{{trans('admin_routes.edit')}}</a></li>
                    <li><form action="{{route('routes.destroy',$route->id)}}" method="POST">
                    {{csrf_field()}}
                    {{ method_field('DELETE') }}
                      <input type="submit" name="Detele" value="Detele">   
                    </form>
                    </li>
                  </ul>
                </div>
              </td>
            </tr>
            @endforeach
          </table>
        </div>
        <!-- /.box-body -->
      </div>
    </div>
   
    <!-- /.col -->
  </div>
</div>

@endsection
