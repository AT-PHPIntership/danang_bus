@extends('templates.danabus.master')

@section('content') 
  <div id="contact" class="contact">
    <div class="section secondary-section">
      <h1>{{trans('search.search_busstop')}}</h1>
        <div class="row">
          <div class="col-md-6 col-md-offset-3">
            <div class="row">
              <div class="col-lg-12">
                <form action="/search" method="GET" id="login-form" role="form" style="display: block;">
                <meta name="csrf-token" content="{{ csrf_token() }}" />
                  <div class="form-group">
                    <label>{{trans('search.type_starting_point')}}</label>
                    <input type="text" name="input-starting-point" id="input-starting-point">
                  </div>
                  <div class="form-group">
                    <label>{{trans('search.type_destination')}}</label>
                    <input type="text" name="input-destination" id="input-destination">
                  </div>
                  <div class="form-group">
                    <div class="col-sm-6 col-sm-offset-3">
                      <a href="#" class="btn-search">{{trans('search.search')}}</a>
                    </div>
                  </div>  
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>              
      <div id="contact" class="contact">
        <div class="title">
         <h2 class="map">{{trans('index.map')}}</h2>
        </div>
        <div id="mymap" style="height: 800px; width: 80%; margin: auto;">
        </div>   
      </div>
    </div>
  </div>
@stop
