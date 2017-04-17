@extends('admin.layouts.master')
@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">{{trans('news.news')}}</h3>
      </div>
       <form action="{!!route('admin.news.store')!!}" enctype="multipart/form-data" method="POST">
        {{csrf_field()}}
        <div class="box-body">
          <div class="form-group">
            <label>{{trans('news.title')}} </label>
            <input type="text" class="form-control" name="title" placeholder="Enter title">
          </div>
          <div class="form-group has-error">
          <span class="help-block">{{$errors->first('title')}}</span>
          </div>
          <div class="form-group">
            <label>{{trans('admin.category')}}</label>
            <select class="form-control select2" name="category_id" style="width: 100%;">
              <option value="">-- Choose --</option>
              @foreach($categories as $item)
              <p>$item->name</p>
              <option value="{{$item->id}}">{{$item->name}}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group has-error">
          <span class="help-block">{{$errors->first('category_id')}}</span>
          </div>
          <div class="form-group">
            <label>{{trans('news.content')}}</label>
            <div class="box box-info ">
              <div class="box-header">
                <small>{{trans('news.advanced')}}</small>
                <div class="pull-right box-tools">
                <button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fa fa-minus"></i></button>
                </div>
              </div>
              <div class="box-body pad">
                <textarea id="editor1" name="content" rows="10" cols="80" placeholder="This is my textarea to be replaced with CKEditor.">
                </textarea>
              </div>
            </div>
          </div>
          <div class="form-group has-error">
            <span class="help-block">{{$errors->first('content')}}</span>
          </div>
          <div class="form-group">
            <label>{{trans('news.image')}} </label>
            <input type="file" name="picture_path">
          </div>
          <div class="form-group has-error">
          <span class="help-block">{{$errors->first('picture_path')}}</span>
          </div>
        </div>
        <div class="box-footer">
          <button type="submit" class="btn btn-primary">{{trans('admin.add')}}</button>
          <button type="button" class="btn  btn-danger">{{trans('admin.cancel')}}</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
@section('script')
<script src="{{asset('admin/js/editor.js')}}"></script>
@endsection
