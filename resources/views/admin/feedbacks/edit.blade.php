@extends('admin.layouts.master')
@section('content')
  <div class="row">
    <div class="col-md-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">{{trans('categories.edit')}}</h3>
        </div>
          <form action="{!!route('admin.feedbacks.update',$feedback->id)!!}" enctype="multipart/form-data" method="POST">
          {{csrf_field()}}
          {{ method_field('PUT') }}
          <div class="box-body">
            <div class="form-group ">
              <label>{{trans('admin_feedback.email')}}</label>
              <input type="email" name="email" class="form-control"  value="{{$feedback->email}}" readonly>
            </div>
            <div class="form-group ">
              <label>{{trans('admin_feedback.content')}}</label>
              <input type="text" class="form-control"  name="content" value="{{$feedback->content}}" readonly>
            </div>
            <div class="form-group ">
              <label>{{trans('admin_feedback.reply')}}</label>
                <textarea class="textarea" name="reply" rows="10" cols="220" >
                </textarea>
            </div>
            </div>
            <div class="box-footer">
              <button type="submit" class="btn btn-primary">{{trans('admin.submit')}}</button>
              <a href="{{route('admin.feedbacks.index')}}"><button type="button" class="btn  btn-danger">{{trans('admin.cancel')}}</button></a>
            </div>
        </form>
      </div>
    </div>
  </div>
@endsection