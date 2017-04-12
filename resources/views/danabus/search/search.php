  @extends('templates.danabus.master')

  @section('content') 
    <div id="contact" class="contact">
      <div class="section secondary-section">
        <div class="container">
          <div class="title">
            <h1>{!! trans('search.search') !!}</h1>
            <div class="container">
              <div class="row">
                <div class="col-md-6 col-md-offset-3">
                  <div class="panel panel-login">             
                    <div class="panel-body">
                      <div class="row">
                        <div class="col-lg-12">
                          <form id="login-form"  method="post" role="form" style="display: block;">
                            <div class="form-group">
                              <input type="text" name="username"  tabindex="1" class="form-control" placeholder="Noi di" value="">
                            </div>
                            <div class="form-group">
                              <input type="text" name="password" id="password" tabindex="2" class="form-control" placeholder="Noi den">
                            </div>  
                            <div class="form-group">
                              <div class="row">
                                <div class="col-sm-6 col-sm-offset-3">
                                  <input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-search" value="Search">
                                </div>
                              </div>
                            </div>  
                            <p>{!! trans('search.goiy') !!} <span style="color: red">Tam kỳ - Đà Nẵng</span></p>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>              
          </div>
        </div>
        <div id="contact" class="contact">
        <div class="section secondary-section">
          <div class="container">
            <div class="title">
              <h2 class="map">{!! trans('search.map') !!}</h2>
            </div>
          </div>
          <div class="map-wrapper">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d122699.13437428791!2d108.13619823048579!3d16.047423976690194!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x314219c792252a13%3A0xfc14e3a044436487!2zxJDDoCBO4bq1bmcsIEjhuqNpIENow6J1LCDEkMOgIE7hurVuZywgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1490803593419" width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen></iframe> 
          </div>
        </div>
      </div>
      </div>
    @stop