@extends('admin.layouts.master')
@section('title', 'List Category')
@section('content')
<div class="row">
  @if(Session::has('msg'))
      <div class="alert alert-success">
          {{ Session::get('msg') }}
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
            <th style="width: 20px">#</th>
            <th>{{trans('categories.title')}}</th>
            <th style="width: 150px">{{trans('admin.action')}}</th>
          </tr>
           @foreach($data as $item)
          <tr>
            <td>1.</td>
            <td>{{ $item->name}}</td>
            <td>
                <div class="btn-group">
                  <button type="button" class="btn btn-success">{{trans('admin.action')}}</button>
                  <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
                    <li>
                      <form action="{!!route('categories.destroy',$item->id)!!}" enctype="multipart/form-data" method="POST">
                        <input type="hidden" name="_token" value="{!! csrf_token()!!}">
                      {{ method_field('DELETE') }}
                      <input type="submit" name="" value="{{trans('admin.delete')}}">
                    </form>
                    </li>
                    <li><a href="{{route('categories.show',$item->id)}}">{{trans('admin.edit')}}</a></li>
                  </ul>
                </div>
            </td>
          </tr>
          @endforeach
        </table>
      </div>
      <div class="box-footer clearfix">
        <ul class="pagination pagination-sm no-margin pull-right">
        <li> {{$data->render()}}</li>
        </ul>
      </div>
    </div>
  </div>
</div>
@endsection
