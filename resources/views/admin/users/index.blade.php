@extends('admin.layouts.master')
@section('content')
<div class="row">
@if(Session::has('success'))
  <div class="alert alert-success">
      {{ Session::get('success') }}
  </div>
@endif
@if(Session::has('error'))
  <div class="alert alert-error">
      {{ Session::get('error') }}
  </div>
@endif
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">{{trans('users.table')}}</h3>
        <div class="box-tools">
        </div>
      </div>
      <div class="box-body table-responsive no-padding">
        <table class="table table-hover">
          <tr>
            <th>#</th>
            <th style="width:25%">{{trans('users.username')}}</th>
            <th >{{trans('users.fullname')}}</th>
            <th style="width:15%">{{trans('users.email')}}</th>
            <th style="width:8%">{{trans('admin.action')}}</th>
          </tr>
          @foreach($users as $user)
          <tr>
            <td>{{$user->id}}</td>
            <td>{{$user->username}}</td>
            <td>{{$user->fullname}}</td>
            <td>{{$user->email}}</td>
            <td>
              <a href="{{route('admin.users.edit',$user->id)}}">
              <button type="button" class="btn btn-block btn-info btn-sm">
                <i class="fa fa-fw fa-edit"></i>
              </button></a>
            </td>
          </tr>
          @endforeach
        </table>
      </div>
      <div class="box-footer clearfix">
        <ul class="pagination pagination-sm no-margin pull-right">
          <li> {{$users->render()}}</li>
        </ul>
      </div>
    </div>
  </div>
</div>
@endsection
