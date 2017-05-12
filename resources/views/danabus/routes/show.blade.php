@extends('templates.danabus.master')

@section('content')
  <div class="section secondary-section " id="portfolio">
    <div class="triangle"></div>
    <div class="container">
      <div class=" title">
        <h1>{{trans('admin_routes.routes')}} : {{$route->name}} </h1>  
      </div>
      <div id="single-project">
        <div class="newcontent">
          {!! trans('admin_routes.routes') !!} :{{$route->name}}<br>
          {!! trans('admin_routes.forwardtrip') !!}: 
          @foreach($route->forwardDirections as $forwardDirection) 
            ->{{$forwardDirection->stop->address}} 
          @endforeach
          <br>
          {!! trans('admin_routes.backwardtrip') !!}: 
          @foreach($route->backwardDirections as $backwardDirection) 
            ->{{$backwardDirection->stop->address}} 
          @endforeach  
          <br>
          {{ trans('admin_routes.distance') }} {{$route->distance}}  km<br>
          {!! trans('admin_routes.frequency')!!} {{$route->frequency}}  {!!trans('admin_routes.unit')!!}<br>
          {!! trans('admin_routes.frequency_peak') !!} {{$route->frequency_peak}}  {!!trans('admin_routes.unit')!!}<br>
          {!! trans('admin_routes.start_time') !!} {{$route->start_time}} <br>
          {!! trans('admin_routes.end_time') !!}{{$route->end_time}} <br>
        </div>    
      </div>
    </div>
    <div id="contact" class="contact">
      <div class="section secondary-section">
        <div class="container">
          <div class="title">
            <h2 class="map">{!! trans('index.map') !!} </h2>
            <button onclick="showBusStopOnMap('forwardDirection')">{!! trans('admin_routes.forwardtrip') !!}</button>    
            <button onclick="showBusStopOnMap('backwardDirection')">{!! trans('admin_routes.backwardtrip') !!}</button>  
          </div>
        </div>
        <div id="mymap"></div>   
        </div>
      </div>
    </div>
  </div>
  <script type="text/javascript">
    var forwardDirectionJson =  '<?php echo $forwardDirection->toJson();?>';
    var backwardDirectionJson =  '<?php echo $backwardDirection->toJson();?>';
  </script>
@stop