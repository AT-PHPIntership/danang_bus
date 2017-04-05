  @extends('templates.danabus.master')

  @section('content')
   <div class="section secondary-section " id="portfolio">
      <div class="triangle"></div>
      <div class="container">
        <div class=" title">
            <h1> {{$routes->name}} </h1>       
        </div>
          <div id="single-project">  
            <div class="newcontent">
              Tuyến: {{$routes->name}} <br>

                  {!! trans('tuyen.di') !!}: Bến xe Trung tâm Đà Nẵng - Tôn Đức Thắng - Nguyễn Sinh Sắc - Kinh Dương Vương - Lý Thái Tông - Thanh Khê 6 - Dũng sỹ Thanh Khê - Trần Cao Vân - Điện Biên Phủ - Lê Duẩn - Trần Phú - Trưng Nữ Vương - Núi Thành - Cầu Trần Thị Lý - Ngũ Hành Sơn - Trần Đại Nghĩa - Bến xe Hội An. <br>

                  {!! trans('tuyen.ve') !!} Bến xe Hội An - Trần Đại Nghĩa - Ngũ Hành Sơn - Cầu Trần Thị Lý - Núi Thành - Trưng Nữ Vương - Bạch Đằng - Phan Đình Phùng - Yên Bái - Lê Duẩn - Điện Biên Phủ - Trần Cao Vân - Dũng Sỹ Thanh Khê - Thanh Khê 6 - Lý Thái Tông - Kinh Dương Vương - Nguyễn Sinh Sắc - Tôn Đức Thắng - Bến xe Trung tâm Đà Nẵng. <br>

                  {{ trans('tuyen.khoangcach') }}  {{$routes->distance}} km<br>

                  {!! trans('tuyen.tansuat') !!}                                                    {{$routes->frequency}} <br>

                  {!! trans('tuyen.thoigian') !!}             {{$routes->start_time}} đến {{$routes->end_time}} <br>

                 

            </div>    
          </div>
      </div>    
      <div id="contact" class="contact">
        <div class="section secondary-section">
          <div class="container">
            <div class="title">
              <h2 class="map">{!! trans('tuyen.bando') !!}</h2>             
            </div>
          </div>
          <div class="map-wrapper">           
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d122699.13437428791!2d108.13619823048579!3d16.047423976690194!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x314219c792252a13%3A0xfc14e3a044436487!2zxJDDoCBO4bq1bmcsIEjhuqNpIENow6J1LCDEkMOgIE7hurVuZywgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1490803593419" width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen></iframe>     
          </div>
        </div>
      </div>
    </div>
  </div>
  @stop