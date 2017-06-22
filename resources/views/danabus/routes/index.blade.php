@extends('templates.danabus.master')
@section('content')
  <div class="section secondary-section " id="portfolio">
    <div class="container">
      <div class=" title">
        <h1> {!! trans('admin_routes.list_route') !!} </h1>
      </div>
      <div class="container">    
        <div class="row">
          <div class="on-city" > {!! trans('admin_routes.interprovincial_routes') !!}</div>
          @foreach ($interprovincial as $item)   
          <div class="col-sm-4">
            <div class="panel panel-primary">
              <div class="panel-heading">
                <a  href="routes/{{$item ->id}}"> {{trans('admin_routes.routes')}}  {{ $item ->name }}</a>
              </div>
            </div>
          </div>
          @endforeach     
        </div>
        <div class="row">
          <div class="on-city" > {!! trans('admin_routes.inner_city_routes') !!}</div>
          @foreach ($innercity as $item)
          <div class="col-sm-4"> 
            <div class="panel panel-primary">
              <div class="panel-heading"><a  href="/routes/{{$item ->id}}">{{trans('routes.routes')}}{{ $item ->name }}</a></div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
    <div class="section secondary-section">
      <div class="container">
        <div class="title">
          <h2 class="map">{!! trans('index.map') !!} </h2>
        </div>
      </div>
      <div id="mymap">   
      </div>   
    </div>
  </div> 

  <script type="text/javascript">
    var routesJSON=  '<?php echo $routes->toJson();?>';
  </script>

@endsection
  