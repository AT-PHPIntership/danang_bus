@extends('admin.layouts.master')
@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">{{ trans('stops.add_stop') }}</h3>
      </div>
      <form role="form" action="{!!URL::route('admin.stops.store')!!}" method="POST">
      {{csrf_field()}}
        <div class="box-body">
          <div class="form-group col-md-6 {{ $errors->has('name') ? ' has-error' : '' }}">
            <label>{{ trans('stops.stop') }}</label>
            <input type="texxt" class="form-control"  name="name">
            @if ($errors->has('name'))
              <span class="help-block">{{$errors->first('name')}}</span>
            @endif
          </div>
          <div class="form-group col-md-6 {{ $errors->has('address') ? ' has-error' : '' }}">
            <label>{{ trans('stops.address') }} </label>
            <input type="text" class="form-control"  name="address" id="input-address">
            @if ($errors->has('address'))
              <span class="help-block">{{$errors->first('address')}}</span>
            @endif
          </div>
          <div class="form-group col-md-6 {{ $errors->has('lat') ? ' has-error' : '' }}">
            <label>{{trans('stops.lat')}} </label>
            <input type="text" class="form-control"  name="lat" id="input-lat">
            @if ($errors->has('lat'))
              <span class="help-block">{{$errors->first('lat')}}</span>
            @endif
          </div>
          <div class="form-group col-md-6 {{ $errors->has('lng') ? ' has-error' : '' }}">
            <label>{{trans('stops.lng')}} </label>
            <input type="text" class="form-control"  name="lng" id="input-lng">
            @if ($errors->has('lng'))
              <span class="help-block">{{$errors->first('lng')}}</span>
              @endif
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
<div id="mymap" style="height: 700px"></div>
@endsection
