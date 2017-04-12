  @extends('templates.danabus.master')

  @section('content')
   <div class="section secondary-section " id="portfolio">
      <div class="triangle"></div>
      <div class="container">
        <div class=" title">
            <h1> Tuyến Tam kỳ Đà Nẵng </h1>       
        </div>
          <div id="single-project">  
            <div class="newcontent">
              Tuyến số 1: Bến xe Trung tâm Đà Nẵng - Bến xe Hội An: <br>

                  {!! trans('tuyen.di') !!}: Bến xe Trung tâm Đà Nẵng - Tôn Đức Thắng - Nguyễn Sinh Sắc - Kinh Dương Vương - Lý Thái Tông - Thanh Khê 6 - Dũng sỹ Thanh Khê - Trần Cao Vân - Điện Biên Phủ - Lê Duẩn - Trần Phú - Trưng Nữ Vương - Núi Thành - Cầu Trần Thị Lý - Ngũ Hành Sơn - Trần Đại Nghĩa - Bến xe Hội An.

                  {!! trans('tuyen.ve') !!} Bến xe Hội An - Trần Đại Nghĩa - Ngũ Hành Sơn - Cầu Trần Thị Lý - Núi Thành - Trưng Nữ Vương - Bạch Đằng - Phan Đình Phùng - Yên Bái - Lê Duẩn - Điện Biên Phủ - Trần Cao Vân - Dũng Sỹ Thanh Khê - Thanh Khê 6 - Lý Thái Tông - Kinh Dương Vương - Nguyễn Sinh Sắc - Tôn Đức Thắng - Bến xe Trung tâm Đà Nẵng.

                  {!! trans('tuyen.tansuat') !!}                                                    20 phút/chuyến. <br>

                  Số chuyến (đi và về) trong ngày:               76 chuyến. <br>

                  {!! trans('tuyen.thoigian') !!}             5 giờ 30 đến 17 giờ 50. <br>

                  Doanh nghiệp khai thác tuyến: <br>

                  * Công ty cổ phần Xe khách & DVTM Đà Nẵng - Điện thoại : (0511) 3680670; <br>

                  * Hợp tác xã Vận tải Thuỷ bộ & Khách du lịch Hội An – Điện thoại: (0510) 3861240.

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