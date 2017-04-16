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
        <div class="map-wrapper">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d122699.13437428791!2d108.13619823048579!3d16.047423976690194!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x314219c792252a13%3A0xfc14e3a044436487!2zxJDDoCBO4bq1bmcsIEjhuqNpIENow6J1LCDEkMOgIE7hurVuZywgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1490803593419" width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen></iframe> 
        </div>
      </div>
    </div>
    @stop
   