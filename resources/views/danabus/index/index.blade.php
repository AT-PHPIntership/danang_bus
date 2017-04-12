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
            <a href="">{!! trans('index.all') !!}</a>
          </li>
          <li class="filter" >
            <a href="">{!! trans('index.giaothong') !!} </a>
          </li>
          <li class="filter" >
            <a href="">{!! trans('index.tuyenxe') !!}</a>
          </li>
        </ul>
        <div id="single-project">
          <div id="slidingDiv" class="toggleDiv row-fluid single-project">
            <div class="span6 news-pic">
              <img src="{{ asset('templates/danabus/images/image-1.jpg')}}" alt="" />
            </div>
            <div class="span6 news-content">
              <div class="project-description">
                <div class="project-title clearfix">
                  <h3 class="title-news"><a href="tintuc.html">Chương trình “xe buýt đồng hành cùng người khuyết tật”</a> </h3>
                </div>
                <div class="project-info">
                  <div>
                    Sáng ngày 25/3, Đoàn thanh niên Trung tâm phối hợp cùng Hợp tác xã vận tải 19/5 triển khai Chương trình “xe buýt đồng hành cùng người khuyết tật”........
                  </div>
                </div>
              </div>
            </div>
          </div>                  
        </div>
        <div id="single-project">
          <div id="slidingDiv" class="toggleDiv row-fluid single-project">
            <div class="span6 news-pic">
              <img src="{{ asset('templates/danabus/images/image-2.jpg')}}" alt="" />
            </div>
            <div class="span6 news-content">
              <div class="project-description">
                <div class="project-title clearfix">
                  <h3 class="title-news"><a href="tintuc.html">Kế hoạch phục vụ Lễ Giỗ tổ Hùng Vương năm 2017</a> </h3>
                </div>
                <div class="project-info">
                  <div>
                    Nhằm phục vụ hành khách vào ngày Lễ Giỗ tổ Hùng Vương năm 2017, Trung tâm đã có kế hoạch tăng chuyến trên các tuyến xe buýt phục vụ hành khách đến khu vui chơi, giảm chuyến và tạm ngưng một số tuyến trong dịp sinh viên nghỉ lễ.....
                  </div>
                </div>
              </div>
            </div>
          </div>                  
        </div>
        <div id="single-project">
          <div id="slidingDiv" class="toggleDiv row-fluid single-project">
            <div class="span6 news-pic">
              <img src="{{ asset('templates/danabus/images/image-1.jpg')}}" alt="" />
            </div>
            <div class="span6 news-content">
              <div class="project-description">
                <div class="project-title clearfix">
                  <h3 class="title-news"><a href="tintuc.html">Chương trình “xe buýt đồng hành cùng người khuyết tật”</a> </h3>
                </div>
                <div class="project-info">
                  <div>
                    Sáng ngày 25/3, Đoàn thanh niên Trung tâm phối hợp cùng Hợp tác xã vận tải 19/5 triển khai Chương trình “xe buýt đồng hành cùng người khuyết tật”.......
                  </div>
                </div>
              </div>
            </div>
          </div>                  
        </div>
      </div>
      <div class="container fix-cont-pad" >
        <div class="row fix-pagina">
          <ul class="pagination">
            <li><a href="#">&laquo;</a></li>
            <li class="active"><a href="#">1</a></li>
            <li class="disabled"><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">4</a></li>
            <li><a href="#">5</a></li>
            <li><a href="#">&raquo;</a></li>
          </ul>
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
        <div class="map-wrapper">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d122699.13437428791!2d108.13619823048579!3d16.047423976690194!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x314219c792252a13%3A0xfc14e3a044436487!2zxJDDoCBO4bq1bmcsIEjhuqNpIENow6J1LCDEkMOgIE7hurVuZywgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1490803593419" width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen></iframe> 
        </div>
      </div>
    </div>
    @stop