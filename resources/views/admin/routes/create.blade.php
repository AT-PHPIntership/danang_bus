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
              </div>
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
               <input type="radio" name="type" value="1">{{trans('admin_routes.interprovincial_routes')}}
             </p>
             <p>
               <input type="radio" name="type" value="2">{{trans('admin_routes.inner_city_routes')}}
             </p>
            @if ($errors->has('type'))
              <span class="help-block">{{$errors->first('type')}}</span>
            @endif
          </div>  
        </div>
        <div class="box box-info col-md-6">
          <div class="box-header with-border">
            <h3 class="box-title">{{trans('admin_routes.adddirections')}}</h3>
          </div>
          <div class="row">
          <!-- /.box-header -->
          <div class="box-body col-md-6">
            <div class="table-responsive">
            <h4 class="box-title">{{trans('admin_routes.forwardtrip')}}</h4>
              <table class="table no-margin" id="lists">
                <thead>
                <tr>
                  <th>{{trans('admin_routes.order')}}</th>
                  <th>{{trans('admin_routes.busstop')}}</th>
                  <th>{{trans('admin_routes.time')}}</th>
                  <th>{{trans('admin_routes.fee')}}</th>
                  <th>{{trans('admin_routes.action')}}</th>
                </tr>
                </thead>
                <tbody id ="foward_trip">
                <tr id="item">
                  <td><input style="width: 70%;" type="text" name="order_forwardtrip[]" class="order_id_1" value="1"></td>
                  <td>
                    <select class="form-control select2" name="stop_id_forwardtrip[]" id="stop_id">
                      <option value="">-- Choose --</option>
                      @foreach($stops as $item)
                      <option value="{{$item->id}}">{{$item->name}}</option>
                      @endforeach
                    </select>
                  </td>
                  <td><input type="text" name="time_forwardtrip[]" id="time"></td>
                  <td><input type="text" name="fee_forwardtrip[]" id="fee"></td>
                  <td><a class="delete1">{{trans('admin_routes.delete')}}</a></td>
                </tr>
                </tbody>
                <tr>
                  <td colspan="4"></td>
                  <td><a id="add" class="add_to_forwardtrip">{{trans('admin_routes.add')}}</a></td>
                </tr>
              </table>
            </div>
          </div>
          <div class="box-body col-md-6">
            <div class="table-responsive">
              <h4 class="box-title">{{trans('admin_routes.backwardtrip')}}</h4>
              <table class="table no-margin" id="lists">
                <thead>
                <tr>
                  <th>{{trans('admin_routes.order')}}</th>
                  <th>{{trans('admin_routes.busstop')}}</th>
                  <th>{{trans('admin_routes.time')}}</th>
                  <th>{{trans('admin_routes.fee')}}</th>
                  <th>{{trans('admin_routes.action')}}</th>
                </tr>
                </thead>
                <tbody id ="backward_trip">
                <tr id="item2">
                  <td ><input style="width: 70%;" type="text" name="order_backwardtrip" class="order_id_2" value="1"></td>
                  <td>
                    <select class="form-control select2" name="stop_id_backwardtrip" id="stop_id">
                      <option value="">-- Choose --</option>
                      @foreach($stops as $item)
                      <option value="{{$item->id}}">{{$item->name}}</option>
                      @endforeach
                    </select>
                  </td>
                  <td><input type="text" name="time_backwardtrip" id="time_back"></td>
                  <td><input type="text" name="fee_backwardtrip" id="fee_back"></td>
                  <td><a class="delete2" >{{trans('admin_routes.delete')}}</a></td>
                </tr>
                </tbody>
                <tr>
                  <td colspan="4"></td>
                  <td rowspan="4"><a id="add" class="add_to_backwardtrip">{{trans('admin_routes.add')}}</a></td>
                </tr>
              </table>
            </div>
          </div>
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
