@extends('admin.layouts.master')
@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">{{ trans('admin_routes.edit_route') }}</h3>
      </div>
      <form role="form" action="{!!URL::route('admin.routes.store')!!}" method="POST">
      {{csrf_field()}}
        <div class="box-body">
          <div class="form-group col-md-6 @if($errors->first('name')) has-error @endif">
            <label>{{ trans('admin_routes.routes') }}</label>
            <input type="text" class="form-control"  name="name">
            <span class="help-block">{{$errors->first('name')}}</span>
          </div>
          <div class="form-group col-md-6 @if($errors->first('distance')) has-error @endif">
            <label>{{trans('admin_routes.distance')}} </label>
            <input type="text" class="form-control"  name="distance">
            <span class="help-block" >{{$errors->first('distance')}}</span>
          </div>          
          <div class="form-group col-md-6 @if($errors->first('frequency')) has-error @endif">
            <label>{{trans('admin_routes.frequency')}} </label>
            <input type="text" class="form-control"  name="frequency">
            <span class="help-block" >{{$errors->first('frequency')}}</span>
          </div>         
          <div class="form-group col-md-6 @if($errors->first('frequency_peak')) has-error @endif">
            <label>{{ trans('admin_routes.frequency_peak') }} </label>
            <input type="text" class="form-control"  name="frequency_peak">
            <span class="help-block" >{{$errors->first('frequency_peak')}}</span>
          </div>        
          <div class="form-group col-md-6 @if($errors->first('start_time')) has-error @endif">
              <div class="bootstrap-timepicker">
                <div class="form-group">
                  <label>{{ trans('admin_routes.start_time') }}</label>
                  <div class="input-group">
                    <input id="timepicker2" type="text" class="form-control" name="start_time">

                    <div class="input-group-addon">
                      <i class="fa fa-clock-o"></i>
                    </div>
                  </div>
                  <!-- /.input group -->
                </div>
                <!-- /.form group -->
              </div>
              <span class="help-block">{{$errors->first('start_time')}}</span>
          </div>         
          <div class="form-group col-md-6 @if($errors->first('end_time')) has-error @endif">
              <div class="bootstrap-timepicker">
                <div class="form-group">
                  <label>{{ trans('admin_routes.end_time') }}</label>
                  <div class="input-group">
                    <input id= "timepicker2" type="text" class="form-control" name="end_time">

                    <div class="input-group-addon">
                      <i class="fa fa-clock-o"></i>
                    </div>
                  </div>
                  <!-- /.input group -->
                </div>
                <!-- /.form group -->
              </div>
              <span class="help-block">{{$errors->first('end_time')}}</span>
          </div>        
          <div class="form-group col-md-6 @if($errors->first('type')) has-error @endif">
            <label>{{trans('admin_routes.type')}} </label>
             <p>
               <input type="radio" name="type" value="1">{{trans('admin_routes.inter_municipal')}}
             </p>
             <p>
               <input type="radio" name="type" value="0">{{trans('admin_routes.urban')}}
             </p>
            <span class="help-block">{{$errors->first('type')}}</span>
          </div>
          
        </div>
        <div class="box-footer">
          <button type="submit" class="btn btn-primary">{{trans('admin_routes.submit')}}</button>
          <button type="button" class="btn  btn-danger"><a href="/admin/routes">{{trans('admin_routes.cancle')}}</a></button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
