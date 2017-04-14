@extends('admin.layouts.master')
@section('content')

<div class="row">
  <div class="col-md-12">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">{{ trans('admin_routes.edit_route') }}</h3>
      </div>
      <form role="form" action="{!!URL::route('routes.update', $route->id)!!}" method="POST">
      {{ method_field('PUT') }}
      {{csrf_field()}}
        <div class="box-body">
          <div class="form-group col-md-6">
            <label>{{ trans('admin_routes.routes') }}</label>
            <input type="texxt" class="form-control"  name="name" value="{{$route->name}}">
          </div>
          <div class="form-group col-md-6">
            <label>{{trans('admin_routes.distance')}} </label>
            <input type="text" class="form-control"  name="distance" value="{{$route->distance}}">
          </div>
          <div class="form-group col-md-6">
            <label>{{trans('admin_routes.frequency')}} </label>
            <input type="text" class="form-control"  name="frequency" value="{{$route->frequency}}">
          </div>
          <div class="form-group col-md-6">
            <label>{{ trans('admin_routes.frequency_peak') }} </label>
            <input type="text" class="form-control"  name="frequency_peak" value="{{$route->frequency_peak}}">
          </div>
          <div class="form-group col-md-6">
              <div class="bootstrap-timepicker">
                <div class="form-group">
                  <label>{{ trans('admin_routes.start_time') }}</label>
                  <div class="input-group">
                    <input id="timepicker2" type="text" class="form-control" name="start_time" value="{{$route->start_time}}">

                    <div class="input-group-addon">
                      <i class="fa fa-clock-o"></i>
                    </div>
                  </div>
                  <!-- /.input group -->
                </div>
                <!-- /.form group -->
              </div>
          </div>
          <div class="form-group col-md-6">
              <div class="bootstrap-timepicker">
                <div class="form-group">
                  <label>{{ trans('admin_routes.end_time') }}</label>
                  <div class="input-group">
                    <input id= "timepicker2" type="text" class="form-control" name="end_time" value="{{$route->end_time}}">

                    <div class="input-group-addon">
                      <i class="fa fa-clock-o"></i>
                    </div>
                  </div>
                  <!-- /.input group -->
                </div>
                <!-- /.form group -->
              </div>
          </div>
          @if($route->type==1)
          <div class="form-group col-md-6">
            <label for="exampleInputEmail1">{{trans('admin_routes.type')}} </label>
             <p>
               <input type="radio" name="type" value="1" checked="">{{trans('admin_routes.inter_municipal')}}
             </p>
             <p>
               <input type="radio" name="type" value="0">{{trans('admin_routes.urban')}}
             </p>
          </div>
          @else 
          <div class="form-group col-md-6">
            <label for="exampleInputEmail1">{{trans('admin_routes.type')}} </label>
             <p>
               <input type="radio" name="type" value="1">{{trans('admin_routes.inter_municipal')}}
             </p>
             <p>
               <input type="radio" name="type" value="0" checked="">{{trans('admin_routes.urban')}}
             </p>
          </div>
          @endif
        </div>
        <div class="col-md-12">
          @if (count($errors) > 0)
              <div class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
          @endif
        </div>
        <div class="box-footer">
          <button type="submit" class="btn btn-primary">{{trans('admin_routes.submit')}}</button>
          <button type="button" class="btn  btn-danger"><a href="{{route('routes.index')}}">{{trans('admin_routes.cancle')}}</a></button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
