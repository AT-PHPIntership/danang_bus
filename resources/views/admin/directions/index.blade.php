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
        <h3 class="box-title">{{trans('directions.list_direction')}}</h3>
      </div>
      <div class="box-body">
        <table class="table table-bordered">
          <tr>
            <th style="width: 5%">#</th>
            <th>{{trans('directions.route')}}</th>
            <th>{{trans('directions.stop')}}</th>
            <th>{{trans('directions.order')}}</th>
            <th>{{trans('directions.status')}}</th>
            <th>{{trans('directions.time')}}</th>
            <th>{{trans('directions.fee')}}</th>
            <th style="width: 15%">{{trans('admin.action')}}</th>
          </tr>
           @foreach($directions as $direction)
          <tr>
            <td>{{$direction->id}}</td>
            <td>{{$direction->routes->name}}</td>
            <td>{{$direction->stop->name}}</td>
            <td>{{$direction->order}}</td>
            <td>{{$direction->status_label}}</td>
            <td>{{$direction->time}}</td>
            <td>{{$direction->fee}}</td>
            <td>
                <div class="btn-group">
                  <button type="button" class="btn btn-success">{{trans('admin.action')}}</button>
                  <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
                    <li>
                      <form action="{!!route('admin.directions.destroy',$direction->id)!!}" enctype="multipart/form-data" method="POST">
                        <input type="hidden" name="_token"  value="{!! csrf_token()!!}">
                      {{ method_field('DELETE') }}
                      <input type="submit" name="" onclick="return confirmDelete('Are you want to delete this !!!')" value="{{trans('admin.delete')}}">
                    </form>
                    </li>
                    <li><a href="{{route('admin.directions.edit',$direction->id)}}">{{trans('admin.edit')}}</a></li>
                  </ul>
                </div>
            </td>
          </tr>
          @endforeach
        </table>
      </div>
      <div class="box-footer clearfix">
        <ul class="pagination pagination-sm no-margin pull-right">
        <li> {{$directions->render()}}</li>
        </ul>
      </div>
    </div>
  </div>
</div>
@endsection
