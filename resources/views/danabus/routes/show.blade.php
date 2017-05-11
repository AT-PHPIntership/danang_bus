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
            @foreach($value->directions as $direction)
              @if($direction->status == \App\Models\Direction::STATUS_FORWARD)
                {{$direction->stop->name}} ({{$direction->stop->address}})-
              @endif
            @endforeach
            <br>
            {!! trans('admin_routes.backwardtrip') !!}:
              @foreach($value->directions as $direction)
                @if($direction->status == \App\Models\Direction::STATUS_BACKWARD)
                  {{$direction->stop->name}} ({{$direction->stop->address}})-
                @endif
              @endforeach 
             <br>
            {{ trans('admin_routes.distance') }}: {{$value->distance}}  km<br>
            {!! trans('admin_routes.frequency')!!} :{{$value->frequency}}  {!!trans('routes.unit')!!}<br>
            {!! trans('admin_routes.frequency_peak') !!} :{{$value->frequency_peak}}  {!!trans('routes.unit')!!}<br>
            {!! trans('admin_routes.start_time') !!} :{{$value->start_time}} <br>
            {!! trans('admin_routes.end_time') !!}: {{$value->end_time}} <br>
        </div>    
      </div>
      @endforeach
    </div>
    <div hidden=""> 
      <p class="test">{{$direction->stop}}</p>
      <p class="abc">{{$value->frequency}}</p>
    </div>    
    <div id="contact" class="contact">
      <div class="section secondary-section">
        <div class="container">
          <div class="title">
            <h2 class="map">Bản đồ </h2>  
          </div>
        </div>
        <div id="mymap" style="height: 1000px; width: 80%; margin: auto;"></div>   
      </div>
    </div>
  </div>
</div>
@stop