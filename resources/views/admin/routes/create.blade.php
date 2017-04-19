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
          <div class="form-group col-md-6 {{ $errors->has('name') ? ' has-error' : '' }}">
            <label>{{ trans('admin_routes.routes') }}</label>
            <input type="text" class="form-control"  name="name">
            @if ($errors->has('name'))
              <span class="help-block">{{$errors->first('name')}}</span>
            @endif
          </div>
          <div class="form-group col-md-6 {{ $errors->has('distance') ? ' has-error' : '' }}">
            <label>{{trans('admin_routes.distance')}} </label>
            <input type="text" class="form-control"  name="distance">
            @if ($errors->has('distance'))
              <span class="help-block" >{{$errors->first('distance')}}</span>
            @endif
          </div>          
          <div class="form-group col-md-6 {{ $errors->has('frequency') ? ' has-error' : '' }}">
            <label>{{trans('admin_routes.frequency')}} </label>
            <input type="text" class="form-control"  name="frequency">
            @if ($errors->has('frequency'))
              <span class="help-block" >{{$errors->first('frequency')}}</span>
            @endif
          </div>         
          <div class="form-group col-md-6 {{ $errors->has('frequency_peak') ? ' has-error' : '' }}">
            <label>{{ trans('admin_routes.frequency_peak') }} </label>
            <input type="text" class="form-control"  name="frequency_peak">
            @if ($errors->has('frequency_peak'))
              <span class="help-block" >{{$errors->first('frequency_peak')}}</span>
            @endif
          </div>        
          <div class="form-group col-md-6 {{ $errors->has('start_time') ? ' has-error' : '' }}">
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
            @if ($errors->has('start_time'))
              <span class="help-block">{{$errors->first('start_time')}}</span>
            @endif
          </div>         
          <div class="form-group col-md-6 {{ $errors->has('end_time') ? ' has-error' : '' }}">
            <div class="bootstrap-timepicker">
              <div class="form-group">
                <label>{{ trans('admin_routes.end_time') }}</label>
                <div class="input-group">
                  <input id= "timepicker2" type="text" class="form-control" name="end_time">
                  <div class="input-group-addon">
                    <i class="fa fa-clock-o"></i>
                  </div>
                </div>
              </div>
            </div>
            @if ($errors->has('end_time'))
              <span class="help-block">{{$errors->first('end_time')}}</span>
            @endif
          </div>        
          <div class="form-group col-md-6 {{ $errors->has('type') ? ' has-error' : '' }}">
            <label>{{trans('admin_routes.type')}} </label>
             <p>
               <input type="radio" name="type" value="1">{{trans('admin_routes.inter_municipal')}}
             </p>
             <p>
               <input type="radio" name="type" value="2">{{trans('admin_routes.urban')}}
             </p>
            @if ($errors->has('type'))
              <span class="help-block">{{$errors->first('type')}}</span>
            @endif
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
