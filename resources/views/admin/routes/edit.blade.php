@extends('admin.layouts.master')
@section('content')

<div class="row">
  <div class="col-md-12">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">{{ trans('admin_routes.edit_route') }}</h3>
      </div>
      @foreach($routes  as $route)
      <form role="form" action="{!!route('admin.routes.update', $route->id)!!}" method="POST">
      {{ method_field('PUT') }}
      {{csrf_field()}}
        <div class="box-body">
          <div class="form-group col-md-6 {{ $errors->has('name') ? ' has-error' : '' }}">
            <label>{{ trans('admin_routes.routes') }}</label>
            <input type="texxt" class="form-control"  name="name" value="{{$route->name}}"> 
            @if ($errors->has('name'))         
              <span class="help-block">{{$errors->first('name')}}</span>
            @endif
          </div>
          <div class="form-group col-md-6 {{ $errors->has('distance') ? ' has-error' : '' }}">
            <label>{{trans('admin_routes.distance')}} </label>
            <input type="text" class="form-control"  name="distance" value="{{$route->distance}}">
            @if ($errors->has('distance'))
              <span class="help-block">{{$errors->first('distance')}}</span>
            @endif
          </div>
          <div class="form-group col-md-6 {{ $errors->has('frequency') ? ' has-error' : '' }} ">
            <label>{{trans('admin_routes.frequency')}} </label>
            <input type="text" class="form-control"  name="frequency" value="{{$route->frequency}}">
            @if ($errors->has('frequency'))
              <span class="help-block">{{$errors->first('frequency')}}</span>
            @endif
          </div>
          <div class="form-group col-md-6 {{ $errors->has('frequency_peak') ? ' has-error' : '' }}">
            <label>{{ trans('admin_routes.frequency_peak') }} </label>
            <input type="text" class="form-control"  name="frequency_peak" value="{{$route->frequency_peak}}">
            @if ($errors->has('frequency_peak'))
              <span class="help-block">{{$errors->first('frequency_peak')}}</span>
            @endif
          </div>
          <div class="form-group col-md-6 {{ $errors->has('start_time') ? ' has-error' : '' }}">
            <div class="bootstrap-timepicker">
              <div class="form-group">
                <label>{{ trans('admin_routes.start_time') }}</label>
                <div class="input-group">
                  <input id="timepicker2" type="text" class="form-control" name="start_time" value="{{$route->start_time}}">

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
                  <input id= "timepicker2" type="text" class="form-control" name="end_time" value="{{$route->end_time}}">
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
               <input type="radio" name="type" value="1" {{ $route->type==\App\Models\Route::TYPE_INTERPROVINCIAL ? 'checked' : '' }}>
               {{trans('admin_routes.interprovincial_routes')}}
             </p>
             <p>
               <input type="radio" name="type" value="2" {{ $route->type==\App\Models\Route::TYPE_INNER_CITY ? 'checked' : '' }}>
               {{trans('admin_routes.inner_city_routes')}}
             </p>
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
                 @foreach($directions as $direction)
                  @if($direction->status==\App\Models\Direction::STATUS_FORWARD_TRIP)
                     <tr id="item_forwardtrip">
                       <td><input hidden="" class="forwardtrip_id" type="text" name="id_forwardtrip[]" value="{{$direction->id}}">   <input style="width: 70%;" type="text" name="order_forwardtrip[]" class="order_forwardtrip" value="{{$direction->order}}"></td>
                       <td>
                         <select class="form-control" name="stop_id_forwardtrip[]">
                           @foreach($stops as $item)
                           <option value="{{$item->id}}" {{$direction->stop_id == $item->id ? 'selected' :''}}>{{$item->name}}</option>
                           @endforeach
                         </select>
                       </td>
                       <td><input type="text" name="time_forwardtrip[]" value="{{$direction->time}}"></td>
                       <td><input type="text" name="fee_forwardtrip[]" value="{{$direction->fee}}"></td>
                       <td><a class="delete_forwardtrip" >{{trans('admin_routes.delete')}}</a></td>
                     </tr>
                   @endif
                 @endforeach
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
                 @foreach($directions as $direction)
                   @if($direction->status==\App\Models\Direction::STATUS_BACKWARD_TRIP)
                     <tr id="item_backwardtrip">
                       <td ><input hidden="" class="backwardtrip_id" type="text" name="id_backwardtrip[]" value="{{$direction->id}}"><input style="width: 70%;" type="text" name="order_backwardtrip[]" class="order_backwardtrip" value="{{$direction->order}}"></td>
                       <td>
                         <select class="form-control" name="stop_id_backwardtrip[]">
                           @foreach($stops as $item)
                           <option value="{{$item->id}}" {{$direction->stop_id == $item->id ? 'selected' :''}}>{{$item->name}}</option>
                           @endforeach
                         </select>
                       </td>
                       <td><input type="text" name="time_backwardtrip[]"  value="{{$direction->time}}"></td>
                       <td><input type="text" name="fee_backwardtrip[]" value="{{$direction->fee}}"></td>
                       <td><a class="delete_backwardtrip">{{trans('admin_routes.delete')}}</a></td>
                     </tr>
                  @endif
                 @endforeach
                 </tbody>
                 <tr>
                  <td colspan="4"></td>
                   <td><a id="add" class="add_to_backwardtrip">{{trans('admin_routes.add')}}</a></td>
                 </tr>
               </table>
             </div>
           </div>
           </div>
         </div>
        @endforeach
        <div class="box-footer">
          <button type="submit" class="btn btn-primary">{{trans('admin_routes.submit')}}</button>
          <button type="button" class="btn  btn-danger"><a href="{{route('admin.routes.index')}}">{{trans('admin_routes.cancle')}}</a></button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
