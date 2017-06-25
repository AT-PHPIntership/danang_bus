@extends('templates.danabus.master')

@section('content')
  <div class="section secondary-section " id="portfolio">
    <div class="container">
      <div class="title">
        <h1>{{$news->title}}</h1>
      </div>
      <div id="single-project text-news">       
        {{$news->content}}
      </div > 
    </div>
    <div style="text-align: center;" class="fb-comments" data-href="" data-numposts="5" data-width="100%">
    </div>
  </div>  
  <script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.9&appId={{config('constant.facebook_appid')}}";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));</script>
@endsection
 