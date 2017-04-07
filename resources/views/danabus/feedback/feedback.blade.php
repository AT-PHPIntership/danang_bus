@extends('templates.danabus.master')

@section('content')
</nav>
<div class="section secondary-section " id="portfolio">
  <div class="container">
    <div class="container-fluid">
      <div class="row content">
        <div class="col-sm-3 sidenav" style="border: 2px outset #ff0000;">
          <h4 style="text-align: center;">{!! trans('feedback.reply') !!}</h4>
          <ul>
            <li>
              <div>
                <h5>Tra loi mail abc@gmail.com</h5>
                <p>xin tra loi nhu ri</p>
              </div>
            </li>
            <li>
              <div>
                <h5>Tra loi mail abc@gmail.com</h5>
                <p>xin tra loi nhu ri</p>
              </div>
            </li>
          </ul>
        </div>
        <div class="col-sm-9">
          <div class="col-md-12 ">
            <div class="well well-sm">
              <form class="form-horizontal" action="" method="post">
                <fieldset>
                  <!-- <legend class="text-center">Gửi phản hổi</legend> -->
                  <h3 class="text-feedback"> {!! trans('feedback.form') !!} </h3>
                    <div class="form-group">                         
                    <div class="col-md-12" >
                      <input id="email" name="email" type="text" placeholder="Your email" class="form-control">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-md-12">
                      <textarea class="form-control" id="message" name="message" placeholder="Please enter your message here..." rows="5"></textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-md-7 text-right">
                      <button type="submit" class="btn btn-primary btn-lg"> {!! trans('feedback.send') !!} </button>
                    </div>
                  </div>
                </fieldset>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@stop