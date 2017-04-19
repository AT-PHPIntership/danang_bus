@extends('admin.layouts.master')
@section('title', 'List Stop')
@section('content')
<div class="row">
  @if(Session::has('success'))
      <div class="alert alert-success">
          {{ Session::get('success') }}
      </div>
  @endif
  <div class="col-md-10 col-md-offset-1">
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">{{trans('categories.list')}}</h3>
      </div>
      <div class="box-body">
        <table class="table table-bordered">
          <tr>
            <th style="width: 5%">#</th>
            <th>{{trans('stops.title')}}</th>
            <th>{{trans('stops.lat')}}</th>
            <th>{{trans('stops.lng')}}</th>
            <th>{{trans('stops.address')}}</th>
            <th style="width: 15%">{{trans('admin.action')}}</th>
          </tr>
           @foreach($stops as $stop)
          <tr>
            <td>{{$stop->id}}</td>
            <td>{{$stop->name}}</td>
            <td>{{$stop->lat}}</td>
            <td>{{$stop->lng}}</td>
            <td>{{$stop->address}}</td>
            <td>
                <div class="btn-group">
                  <button type="button" class="btn btn-success">{{trans('admin.action')}}</button>
                  <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
                    <li>
                      <form action="{!!route('admin.stops.destroy',$stop->id)!!}" enctype="multipart/form-data" method="POST">
                        <input type="hidden" name="_token"  value="{!! csrf_token()!!}">
                      {{ method_field('DELETE') }}
                      <input type="submit" name="" onclick="return confirmDelete('Are you want to delete this !!!')" value="{{trans('admin.delete')}}">
                    </form>
                    </li>
                    <li><a href="{{route('admin.stops.edit',$stop->id)}}">{{trans('admin.edit')}}</a></li>
                  </ul>
                </div>
            </td>
          </tr>
          @endforeach
        </table>
      </div>
      <div class="box-footer clearfix">
        <ul class="pagination pagination-sm no-margin pull-right">
        <li> {{$stops->render()}}</li>
        </ul>
      </div>
    </div>
  </div>
</div>
@endsection
