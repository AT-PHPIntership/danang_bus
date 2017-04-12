  @extends('templates.danabus.master')

  @section('content')
    <div class="section secondary-section " id="portfolio">
      <div class="container">
        <div class=" title">
          <h1> {!! trans('tuyen.tieude') !!} </h1>
        </div>
        <div class="container">    
          <div class="row">
            <div class="on-city" > {!! trans('tuyen.lientinh') !!}</div>
            <div class="col-sm-4">
              <div class="panel panel-primary">
                <div class="panel-heading">
                  <a  href="tuyencontent.html"> Tuyến số  1. Đà Nẵng - Bến xe Hội An</a>
                </div>
              </div>
            </div>
            <div class="col-sm-4"> 
              <div class="panel panel-primary">
                <div class="panel-heading"><a  href="tuyencontent.html">  Tuyến số  3: Đà Nẵng - Bến xe Ái Nghĩa</a></div>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="panel panel-primary">
                <div class="panel-heading"><a  href="tuyencontent.html">Tuyến số 4: Đà Nẵng - Tam Kỳ</a>
                </div>
              </div>
            </div>
            <div class="col-sm-4"> 
              <div class="panel panel-primary">
                <div class="panel-heading"><a  href="tuyencontent.html">Tuyến số 6: Bến xe Trung tâm Đà Nẵng - Phú Đa</a></div>
              </div>
            </div>
            <div class="col-sm-4"> 
              <div class="panel panel-primary">
                <div class="panel-heading"><a  href="tuyencontent.html">Tuyến số 9:  Thọ Quang  - Quế Sơn </a></div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="on-city" > {!! trans('tuyen.noithanh') !!}</div>
            <div class="col-sm-4"> 
              <div class="panel panel-primary">
                <div class="panel-heading"><a  href="tuyencontent.html">Tuyến số 2: Kim Liên - Chợ Hàn</a></div>
              </div>
            </div>
            <div class="col-sm-4"> 
              <div class="panel panel-primary">
                <div class="panel-heading"><a  href="tuyencontent.html">Tuyến số  5 . Nguyễn Tất Thành - Xuân Diệu</a></div>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="panel panel-primary">
                <div class="panel-heading"><a  href="tuyencontent.html">Tuyến số 7 Xuân Diệu - Metro - Phạm Hung</a>
                </div>
              </div>
            </div>
            <div class="col-sm-4"> 
              <div class="panel panel-primary">
                <div class="panel-heading"><a  href="tuyencontent.html">Tuyến số 8 Tho Quang - Pham Hung</a></div>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="panel panel-primary">
                <div class="panel-heading"><a  href="tuyencontent.html">Tuyến số 11 Xuan Dieu - Lotte Mart</a>
                </div>
              </div>
            </div>
            <div class="col-sm-4"> 
              <div class="panel panel-primary">
                <div class="panel-heading"><a  href="tuyencontent.html">Tuyến số 12 Tho Quang - Truong Sa</a></div>
              </div>
            </div>
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
      @stop
    