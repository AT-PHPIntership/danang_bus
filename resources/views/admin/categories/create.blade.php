@extends('admin.layouts.master')
@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">{{trans('categories.add')}}</h3>
        </div>
        <!-- form start -->
        <form action="{!! URL::route('admin.categories.store')!!}" enctype="multipart/form-data" method="POST">
          <input type="hidden" name="_token" value="{!! csrf_token()!!}">
          <div class="box-body">
            <div class="form-group ">
                <label for="exampleInputEmail1">{{trans('categories.title')}} </label>
                <input type="text" class="form-control" id="exampleInputTitle" name="name" placeholder="Enter title category">
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