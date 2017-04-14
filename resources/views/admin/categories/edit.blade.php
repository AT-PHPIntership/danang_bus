@extends('admin.layouts.master')
@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">{{trans('categories.edit')}}</h3>
      </div>
        <form action="{!!route('categories.update',$category->id)!!}" enctype="multipart/form-data" method="POST">
          <input type="hidden" name="_token" value="{!! csrf_token()!!}">
      {{ method_field('PUT') }}
        <div class="box-body">
          <div class="form-group ">
            <label for="exampleInputEmail1">{{trans('categories.old')}}</label>
            <input type="email" class="form-control" id="exampleInputEmail1" value="{{$category->name}}" disabled="">
          </div>
          <div class="form-group ">
            <label for="exampleInputEmail1">{{trans('categories.news')}}</label>
            <input type="text" class="form-control" id="exampleInputEmail1" name="name" placeholder="Enter news title category">
          </div>
          </div>
          @if (count($errors) > 0)
            <div class="row">
              <div style="color: red;" class="col-md-6 col-md-offset-1 ">
              <p>{{ $errors->first('name')}}</p>
            </div>
            </div>
            @endif
          <div class="box-footer">
            <button type="submit" class="btn btn-primary">{{trans('admin.submit')}}</button>
            <a href="{{route('categories.index')}}"><button type="button" class="btn  btn-danger">{{trans('admin.cancel')}}</button></a>
          </div>
      </form>
    </div>
  </div>
</div>
@endsection