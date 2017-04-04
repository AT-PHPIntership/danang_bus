<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset=utf-8>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{!! trans('header.title') !!} </title>
    
    <link rel="stylesheet" type="text/css" href="{{ asset('templates/danabus/css/bootstrap-responsive.css')}}" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    
    <link rel="stylesheet" type="text/css" href="{{ asset('templates/danabus/css/style.css') }}" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
  </head>
  <body>
    <div class="header">
      <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner" role="listbox">
          <div class="item active">
            <img src="{{ asset('templates/danabus/images/banner.jpg')}}" alt="Banner Da Nang Bus" width="100%" height="100%">
          </div>
          <div class="item">
            <img src="{{ asset('templates/danabus/images/banner1.jpg')}}" alt="Banner Da Nang Bus" width="100%" height="100%">
          </div> 
          <div class="item">
            <img src="{{ asset('templates/danabus/images/banner.jpg')}}" alt="Banner Da Nang Bus" width="100%" height="100%">
           </div>
          <div class="item">
            <img src="{{ asset('templates/danabus/images/banner.jpg')}}" alt="Banner Da Nang Bus" width="100%" height="100%">
          </div>
        </div>
      </div>
    </div>
    <nav class="navbar navbar-inverse">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>                        
          </button>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
          <ul class="nav navbar-nav">
            <li><a href="index.html">{!! trans('header.home') !!} </a></li>
            <li><a href="tuyen.html">{!! trans('header.routes') !!} </a></li>
            <li><a href="search.html">{!! trans('header.search') !!} </a></li>
            <li><a href="feedback.html">{!! trans('header.feedback') !!} </a></li>
          </ul>
        </div>
      </div>
      </nav>