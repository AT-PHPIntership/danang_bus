@extends('admin.layouts.master')
@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">{{ trans('directions.edit') }}</h3>
      </div>
      @foreach($direction as $value)
      <form role="form" action="{!!URL::route('admin.directions.update', $value->id)!!}" method="POST">
      {{csrf_field()}}
      {{ method_field('PUT') }}
        <div class="box-body">
          <div class="form-group col-md-6 {{ $errors->has('route_id') ? ' has-error' : '' }}" >
            <label>{{trans('directions.route')}}</label>
            <select class="form-control select2" name="route_id" style="width: 100%;">
              <option value="{{$value->routes->id}}">{{$value->routes->name}}</option>
              @foreach($routes as $item)
              <option value="{{$item->id}}">{{$item->name}}</option>
              @endforeach
            </select>
            @if($errors->first('route_id'))
            <span class="help-block">{{$errors->first('route_id')}}</span>
            @endif
          </div>
          <div class="form-group col-md-6 {{ $errors->has('order') ? ' has-error' : '' }}">
            <label>{{ trans('directions.order') }}</label>
            <input type="texxt" class="form-control"  name="order" value="{{$value->order}}">
            @if ($errors->has('order'))
              <span class="help-block">{{$errors->first('order')}}</span>
            @endif
          </div>
          <div class="form-group col-md-6 {{ $errors->has('stop_id') ? ' has-error' : '' }}" >
            <label>{{trans('directions.stop')}}</label>
            <select class="form-control select2" name="stop_id" style="width: 100%;">
              <option value="{{$value->stop->id}}">{{$value->stop->name}}</option>
              @foreach($stops as $item)
              <option value="{{$item->id}}">{{$item->name}}</option>
              @endforeach
            </select>
            @if($errors->first('stop_id'))
            <span class="help-block">{{$errors->first('stop_id')}}</span>
            @endif
          </div>
          <div class="form-group col-md-6 {{ $errors->has('fee') ? ' has-error' : '' }}">
            <label>{{trans('directions.fee')}} </label>
            <input type="text" class="form-control"  name="fee" value="{{$value->fee}}">
            @if ($errors->has('fee'))
              <span class="help-block">{{$errors->first('fee')}}</span>
              @endif
          </div>
          <div class="form-group col-md-6 {{ $errors->has('time') ? ' has-error' : '' }}">
            <div class="bootstrap-timepicker">
              <div class="form-group">
                <label>{{ trans('directions.time') }}</label>
                <div class="input-group">
                  <input id="timepicker2" type="text" class="form-control" name="time" value="{{$value->time}}">
                  <div class="input-group-addon">
                    <i class="fa fa-clock-o"></i>
                  </div>
                </div>
              </div>
            </div>
            @if ($errors->has('time'))
              <span class="help-block">{{$errors->first('time')}}</span>
            @endif
          </div>   
          <div class="form-group col-md-6 {{ $errors->has('status') ? ' has-error' : '' }}">
            <label>{{trans('directions.status')}} </label>
             <p>
               <input type="radio" name="status" value="0" {{ $value->status==\App\Models\Directions::STATUS_FORWARD_TRIP ? 'checked' : '' }}>
               {{trans('directions.go')}}
             </p>
             <p>
               <input type="radio" name="status" value="1" {{ $value->status==\App\Models\Directions::STATUS_BACKWARD_TRIP ? 'checked' : '' }}>
               {{trans('directions.comeback')}}
             </p>
          </div>      
        </div>
        @endforeach
        <div class="box-footer">
          <button type="submit" class="btn btn-primary">{{trans('directions.submit')}}</button>
          <button type="button" class="btn  btn-danger"><a href="{{route('admin.directions.index')}}">{{trans('directions.cancle')}}</a></button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
