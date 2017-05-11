@extends('admin.layouts.master')
@section('content')
<div class="row">
@if(Session::has('success'))
  <div class="alert alert-success">
      {{ Session::get('success') }}
  </div>
@endif
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">{{trans('admin_feedback.list_feedback')}}</h3>
        <div class="box-tools">
        </div>
      </div>
      <div class="box-body table-responsive no-padding">
        <table class="table table-hover">
          <tr>
            <th>#</th>
            <th style="width:25%">{{trans('admin_feedback.email')}}</th>
            <th >{{trans('admin_feedback.content')}}</th>
            <th style="width:25%">{{trans('admin_feedback.reply')}}</th>
            <th style="width:8%">{{trans('admin.action')}}</th>
          </tr>
          @foreach($feedbacks as $item)
          <tr>
            <td>{{$item->id}}</td>
            <td>{{$item->email}}</td>
            <td>{{$item->content}}</td>
            <td>{{$item->reply}}</td>
            <td>
              <a href="{{route('admin.feedbacks.edit',$item->id)}}">
              <button type="button" class="btn btn-block btn-info btn-sm">
                <i class="fa fa-fw fa-edit"></i>
              </button></a>
              <form action="{{route('admin.feedbacks.destroy',$item->id)}}" enctype="multipart/form-data" method="POST">
                {{csrf_field()}}
                {{ method_field('DELETE') }}
                <button type="submit"  onclick="return confirmDelete('Are you want to delete this !!!')" class="btn btn-block btn-danger btn-sm"><i class="fa fa-trash-o"></i></button>
              </form>
            </td>
          </tr>
          @endforeach
        </table>
      </div>
      <div class="box-footer clearfix">
        <ul class="pagination pagination-sm no-margin pull-right">
          <li> {{$feedbacks->render()}}</li>
        </ul>
      </div>
    </div>
  </div>
</div>
@endsection
