@extends('admin.layouts.master')
@section('content')

<div class="row">
  <div class="col-md-12">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">{{ trans('admin_routes.edit_route') }}</h3>
      </div>
      <form role="form" action="{!!URL::route('admin.routes.update', $route->id)!!}" method="POST">
      {{ method_field('PUT') }}
      {{csrf_field()}}
        <div class="box-body">
          <div class="form-group col-md-6">
            <label>{{ trans('admin_routes.routes') }}</label>
            <input type="texxt" class="form-control"  name="name" value="{{$route->name}}">
            @if ($errors->first('name'))
            <div class="form-group has-error"> 
              <span class="help-block">{{$errors->first('name')}}</span>
            </div>
            @endif
          </div>
          <div class="form-group col-md-6">
            <label>{{trans('admin_routes.distance')}} </label>
            <input type="text" class="form-control"  name="distance" value="{{$route->distance}}">
            @if ($errors->first('distance'))
            <div class="form-group has-error"> 
              <span class="help-block">{{$errors->first('distance')}}</span>
            </div>
            @endif
          </div>
          <div class="form-group col-md-6">
            <label>{{trans('admin_routes.frequency')}} </label>
            <input type="text" class="form-control"  name="frequency" value="{{$route->frequency}}">
            @if ($errors->first('frequency'))
            <div class="form-group has-error"> 
              <span class="help-block">{{$errors->first('frequency')}}</span>
            </div>
            @endif
          </div>
          <div class="form-group col-md-6">
            <label>{{ trans('admin_routes.frequency_peak') }} </label>
            <input type="text" class="form-control"  name="frequency_peak" value="{{$route->frequency_peak}}">
            @if ($errors->first('frequency_peak'))
            <div class="form-group has-error"> 
              <span class="help-block">{{$errors->first('frequency_peak')}}</span>
            </div>
            @endif
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
              @if ($errors->first('start_time'))
              <div class="form-group has-error"> 
              <span class="help-block">{{$errors->first('start_time')}}</span>
              </div>
              @endif
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
              @if (errors->first('end_time'))
              <div class="form-group has-error"> 
              <span class="help-block">{{$errors->first('end_time')}}</span>
              </div>
              @endif
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
          @if ($errors->first('type'))
          <div class="form-group has-error"> 
            <span class="help-block">{{$errors->first('type')}}</span>
          </div>
          @endif
        </div>
        <div class="box-footer">
          <button type="submit" class="btn btn-primary">{{trans('admin_routes.submit')}}</button>
          <button type="button" class="btn  btn-danger"><a href="{{route('admin.routes.index')}}">{{trans('admin_routes.cancle')}}</a></button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
