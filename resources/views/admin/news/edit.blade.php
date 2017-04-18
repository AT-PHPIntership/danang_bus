@extends('admin.layouts.master')
@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">{{trans('news.news')}}</h3>
      </div>
      <form action="{!! URL::route('admin.news.update',$news->id)!!}" enctype="multipart/form-data" method="POST">
        {{csrf_field()}}
        {{ method_field('PUT') }}
        <div class="box-body">
          <div class="form-group">
            <label >{{trans('news.oldtitle')}}</label>
            <input type="text" class="form-control"  disabled="" value="{{$news->title}}">
          </div>
          <div class="form-group">
            <label >{{trans('news.newstitle')}} </label>
            <input type="text" class="form-control" name="title"  placeholder="Enter new title">
          </div>
          <div class="form-group has-error">
          <span class="help-block">{{$errors->first('title')}}</span>
          </div>
          <div class="form-group">
            <label>{{trans('categories.category')}}</label>
            <select class="form-control select2" style="width: 100%;" name="category_id">
              @foreach($categories as $item)
                  <option <?php if ($item->id == $news->category_id) {
                      echo "selected=''";
} ?>  value="{{$item->id}}" >{{$item->name}}</option>
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
                <textarea id="editor1" name="content" rows="10" cols="80">
                     {{$news->content}}
                </textarea>
              </div>
            </div>
          </div>
          <div class="form-group has-error">
          <span class="help-block">{{$errors->first('content')}}</span>
          </div>
          <div class="form-group">
            <label>{{trans('news.imageold')}} </label>
            <div>
            <img style="height:100px;width: 100px" src="{{asset(trans('path.picture_news'))}}/{{$news->picture_path}}"/>
            </div>
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
          <button type="submit" class="btn btn-primary">{{trans('admin.edit')}}</button>
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
