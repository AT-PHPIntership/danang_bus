  @extends('templates.danabus.master')

  @section('content')
    <div class="section secondary-section " id="portfolio">
      <div class="container">
        <div class="title">
          <h1>{{{$news->title}}}</h1>
        </div>
        <div id="single-project text-news">       
            {{$news->content}}
        </div > 
      </div>
    </div>  
    <div id="contact" class="contact">
      <div class="section secondary-section">
        <div class="container">
          <div class="title">
              <h2 class="map">{{ trans('index.map')}}</h2>
          </div>
        </div>
        <div id="mymap" style="height: 1000px;"></div>   
      </div>
    </div>
    @stop
   