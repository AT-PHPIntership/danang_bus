@extends('admin.layouts.master')
@section('content')
<div class="container">
  <div class="row">
    @if(Session::has('success'))
      <div class="alert alert-success">
          {{ Session::get('success') }}
      </div>
    @endif
    <div class="col-md-10 col-md-offset-1">
    </div>
    <div class="col-md-10 col-md-offset-1">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">{{trans('admin_routes.list_route')}}</h3>
        </div>
        
        <!-- /.box-header -->
        <div class="box-body no-padding">
          <table class="table">
            <tr>
              <th>{{trans('admin_routes.id')}}</th>
              <th>{{trans('admin_routes.routes')}}</th>
              <th>{{trans('admin_routes.distance')}}</th>
              <th>{{trans('admin_routes.type')}}</th>
              <th>{{trans('admin_routes.frequency')}}</th>
              <th>{{trans('admin_routes.frequency_peak')}}</th>
              <th>{{trans('admin_routes.start_time')}}</th>
              <th>{{trans('admin_routes.end_time')}}</th>
              <th style="width: 15%;">{{trans('admin_routes.action')}}</th>
            </tr>
            @foreach( $routes as $route)
            <tr>
              <td>{{$route->id}}</td>
              <td>{{$route->name}}</td>
              <td>{{$route->distance}}</td>
              <td>{{$route->type_label}}</td>
              <td>{{$route->frequency}}</td>
              <td>{{$route->frequency_peak}}</td>
              <td>{{$route->start_time}}</td>
              <td>{{$route->end_time}}</td>
              <td>
                <a href="{{route('admin.routes.edit',$route->id)}}">
                <button type="button" class="btn btn-block btn-info btn-sm">
                  <i class="fa fa-fw fa-edit"></i>
                </button></a>
                <form action="{{route('admin.routes.destroy',$route->id)}}" enctype="multipart/form-data" method="POST">
                   {{csrf_field()}}
                  {{ method_field('DELETE') }}
                  <button type="submit"  onclick="return confirmDelete('Are you want to delete this !!!')" class="btn btn-block btn-danger btn-sm"><i class="fa fa-trash-o"></i></button>
                </form>
              </td>
            </tr>
            @endforeach
          </table>
        </div>
        <!-- /.box-body -->
        <div class="box-footer clearfix">
          <ul class="pagination pagination-sm no-margin pull-right">
           <li> {{$routes->render()}}</li>
          </ul>
        </div>
      </div>
    </div>
   
    <!-- /.col -->
  </div>
</div>

@endsection
