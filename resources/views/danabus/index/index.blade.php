  @extends('templates.danabus.master')

  @section('content')
   
    <div class="section secondary-section " id="portfolio">
      <div class="container">
        <div class=" title">
          <h1>{!! trans('index.title') !!}</h1>
          <p>{!! trans('index.show') !!} </p>
        </div>
        <ul class="nav nav-pills">
          <li class="filter" >
            <a href="/">{!! trans('index.all') !!}</a>
          </li>
          @foreach ($cats as $cat)
          <?php
            $id = $cat->id;
            $name = $cat->name;
            $slug= str_slug($name);
            $urlCat = route('index.filter',['slug'=>$slug, 'id' =>$id]);

          ?>
          <li class="filter" >
            <a href="{{ $urlCat }}">{{$cat -> name}}</a>
          </li>
          @endforeach
        </ul>
        @foreach ($news as $value)
        <?php
            $id = $value ->id;
            $title = $value ->title;
            $content = $value->content;
            $picture_path = $value ->picture_path;
            $slug = str_slug($title);
            $url = route('news.content',['slug' => $slug, 'id' =>$id]);

        ?>
        <div id="single-project">
          <div id="slidingDiv" class="toggleDiv row-fluid single-project">
            <div class="span6 news-pic">
              <img src="{{ asset('')}}/assets/files/{{ $picture_path }}" alt="" />
            </div>
            <div class="span6 news-content">
              <div class="project-description">
                <div class="project-title clearfix">
                  <h3 class="title-news"><a href="{{$url}}">{{{$title}}}</a> </h3>
                </div>
                <div class="project-info">
                  <div>
                    {{ str_limit($content, $limit = 280, $end = '...')}}
                  </div>
                </div>
              </div>
            </div>
          </div>                  
        </div>
        @endforeach
        
      </div>
      <div class="container fix-cont-pad" >
        <div class="row fix-pagina">
         {{$news -> render()}}
        </div>
      </div>
    </div>
    <div id="contact" class="contact">
      <div class="section secondary-section">
        <div class="container">
          <div class="title">
            <h2 class="map">{!! trans('index.map') !!}</h2>
          </div>
        </div>
        <div id="mymap" style="height: 1000px;"></div>   
      </div>
    </div>
    @stop