
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
        <li><a href="/">{!! trans('header.home') !!} </a></li>
        <li><a href="/tuyen">{!! trans('header.routes') !!} </a></li>
        <li><a href="/search">{!! trans('header.search') !!} </a></li>
        <li><a href="/feedback">{!! trans('header.feedback') !!} </a></li>
      </ul>
    </div>
  </div>
</nav>

