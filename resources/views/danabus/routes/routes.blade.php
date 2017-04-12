  @extends('templates.danabus.master')

  @section('content')
    <div class="section secondary-section " id="portfolio">
      <div class="container">
        <div class=" title">
          <h1> {!! trans('routes.title') !!} </h1>
        </div>
        <div class="container">    
          <div class="row">
            <div class="on-city" > {!! trans('routes.supurban') !!}</div>
            @foreach ($supurban as $value)
            <?php 
                $id = $value ->id;
                $name = $value ->name;
                $slug = str_slug($name);
                $urlRoute = route('routes.content',['slug'=>$slug,'id'=> $id]);
            ?>
            <div class="col-sm-4">
              <div class="panel panel-primary">
                <div class="panel-heading">
                  <a  href="{{ $urlRoute }}"> Tuyến : {{ $name }}</a>
                </div>
              </div>
            </div>
            @endforeach
            <?php 
                $id = $value ->id;
                $name = $value ->name;
                $slug = str_slug($name);
                $urlRoute = route('routes.content',['slug'=>$slug,'id'=> $id]);
            ?>
          </div>
          <div class="row">
            <div class="on-city" > {!! trans('routes.urban') !!}</div>
            @foreach ($urban as $value)

            <div class="col-sm-4"> 
              <div class="panel panel-primary">
                <div class="panel-heading"><a  href="{{ $urlRoute }}">Tuyến: {{$value->name}}</a></div>
              </div>
            </div>
            @endforeach
          
          </div>
        </div>
        </div>
        <div id="contact" class="contact">
          <div class="section secondary-section">
            <div class="container">
              <div class="title">
              <h2 class="map">{!! trans('routes.map') !!}</h2>
              </div>
            </div>
            <div id="mymap" style="height: 1000px;"></div>   
          </div>
        </div>
      </div>
    @stop
    