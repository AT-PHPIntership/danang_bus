@extends('admin.layouts.master')
@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">{{ trans('stops.edit_stop') }}</h3>
      </div>
      <form role="form" action="{!!URL::route('admin.stops.update',$stop->id)!!}" method="POST">
      {{csrf_field()}}
      {{ method_field('PUT') }}
        <div class="box-body">
          <div class="form-group col-md-6  @if($errors->first('name')) has-error @endif">
            <label>{{ trans('stops.stop') }}</label>
            <input type="texxt" class="form-control"  name="name" value="{{$stop->name}}">           
            <span class="help-block" >{{$errors->first('name')}}</span>
          </div>
          <div class="form-group col-md-6 @if($errors->first('lat')) has-error @endif">
            <label>{{trans('stops.lat')}} </label>
            <input type="text" class="form-control"  name="lat" value="{{$stop->lat}}">
            <span class="help-block" >{{$errors->first('lat')}}</span>
          </div>
          <div class="form-group col-md-6 @if($errors->first('lng')) has-error @endif">
            <label>{{trans('stops.lng')}} </label>
            <input type="text" class="form-control"  name="lng" value="{{$stop->lng}}">            
            <span class="help-block">{{$errors->first('lng')}}</span>
          </div>
          <div class="form-group col-md-6 @if($errors->first('address')) has-error @endif">
            <label>{{ trans('stops.address') }} </label>
            <input type="text" class="form-control"  name="address" value="{{$stop->address}}">
            <span class="help-block">{{$errors->first('address')}}</span>
          </div>
        </div>
        <div class="box-footer">
          <button type="submit" class="btn btn-primary">{{trans('stops.submit')}}</button>
          <button type="button" class="btn  btn-danger"><a href="{{route('admin.stops.index')}}">{{trans('stops.cancle')}}</a></button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
