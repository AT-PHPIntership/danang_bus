@extends('templates.danabus.master')

@section('content')
</nav>
<div class="section secondary-section " id="portfolio">
  <div class="container">
    <div class="container-fluid">
      <div class="row content">
        <div class="col-sm-3 sidenav" style="border: 2px outset #ff0000;">
          <h4 style="text-align: center;">{{trans('feedbacks.feedbacks')}}</h4>
          <ul>
          @foreach($feedbacks as $item)
            @if($item->reply != '')
              <li>
                <div>
                  <h5>{{trans('feedbacks.reply')}}{{$item->email}}</h5>
                  <p>{{$item->reply}}</p>
                </div>
              </li>
            @endif
          @endforeach
          </ul>
        </div>
        <div class="col-sm-9">
          <div class="col-md-12 ">
            <div class="well well-sm">
              <form class="form-horizontal" action="/feedback" method="POST">
              {{csrf_field()}}
                <fieldset>
                  <h3 class="text-feedback"> {{trans('feedbacks.information')}} </h3>
                    <div class="form-group">                         
                    <div class="col-md-12" >
                      <input id="email" name="email" type="text" placeholder="Your email" class="form-control">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-md-12">
                      <textarea class="form-control" id="message" name="content" placeholder="Please enter your message here..." rows="5"></textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-md-7 text-right">
                      <button type="submit" class="btn btn-primary btn-lg"> {{trans('feedbacks.send')}}</button>
                    </div>
                  </div>
                </fieldset>
              </form>
            </div>
          </div>
          <div>
            @if(Session::has('success'))
              <div class="alert alert-success" style="text-align: center;">
                {{ Session::get('success') }}
              </div>
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@stop