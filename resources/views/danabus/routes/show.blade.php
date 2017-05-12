@extends('templates.danabus.master')

@section('content')
  <div class="section secondary-section " id="portfolio">
    <div class="triangle"></div>
    <div class="container">
    @foreach($route as $value)
      <div class=" title">
        <h1>{{trans('admin_routes.routes')}} : {{$value->name}} </h1>  
      </div>
      <div id="single-project">
        <div class="newcontent">
          {!! trans('admin_routes.routes') !!} :{{$value->name}}<br>
          {!! trans('admin_routes.forwardtrip') !!}: 
            @foreach($value->directions as $forward)
              @if($forward->status == \App\Models\Direction::STATUS_FORWARD)
                {{$forward->stop->name}} ({{$forward->stop->address}})-
              @endif
            @endforeach
            <br>
          {!! trans('admin_routes.backwardtrip') !!}:
            @foreach($value->directions as $backward)
              @if($backward->status == \App\Models\Direction::STATUS_BACKWARD)
                {{$backward->stop->name}} ({{$backward->stop->address}})-
              @endif
            @endforeach 
          <br>
          {!! trans('admin_routes.distance') !!}: {{$value->distance}}  km<br>
          {!! trans('admin_routes.frequency')!!} :{{$value->frequency}}  {!!trans('admin_routes.unit')!!}<br>
          {!! trans('admin_routes.frequency_peak') !!} :{{$value->frequency_peak}}  {!!trans('admin_routes.unit')!!}<br>
          {!! trans('admin_routes.start_time') !!} :{{$value->start_time}} <br>
          {!! trans('admin_routes.end_time') !!}: {{$value->end_time}} <br>
        </div>    
      </div>
      @endforeach
    </div>
    <div id="contact" class="contact">
      <div class="section secondary-section">
        <div class="container">
          <div class="title">
            <h2 class="map">{!! trans('index.map') !!} </h2>
            <button class="go" onclick="showDirection('forward')">{!! trans('admin_routes.forwardtrip') !!}</button>    
            <button class="back" onclick="showDirection('backward')">{!! trans('admin_routes.backwardtrip') !!}</button>  
          </div>
        </div>
        <div id="mymap"></div>   
        </div>
      </div>
    </div>
  </div>
  <script type="text/javascript">
    var forward = <?php print_r(json_encode($forward)); ?>;
    var backward = <?php print_r(json_encode($backward)); ?>;
  </script>
@stop