@extends('admin.layouts.master')
@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">{{trans('categories.edit')}}</h3>
      </div>
        <form action="{!!route('admin.categories.update',$category->id)!!}" enctype="multipart/form-data" method="POST">
          {{csrf_field()}}
        {{ method_field('PUT') }}
        <div class="box-body">
          <div class="form-group ">
            <label>{{trans('categories.old')}}</label>
            <input type="email" class="form-control"  value="{{$category->name}}" disabled="">
          </div>
          <div class="form-group ">
            <label>{{trans('categories.news')}}</label>
            <input type="text" class="form-control"  name="name" placeholder="Enter news title category">
          </div>
          </div>
          @if (count($errors) > 0)
              <div class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
          @endif
          <div class="box-footer">
            <button type="submit" class="btn btn-primary">{{trans('admin.submit')}}</button>
            <a href="{{route('admin.categories.index')}}"><button type="button" class="btn  btn-danger">{{trans('admin.cancel')}}</button></a>
          </div>
      </form>
    </div>
  </div>
</div>
@endsection