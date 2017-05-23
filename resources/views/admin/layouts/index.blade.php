@extends('admin.layouts.master')
@section('content')
  <div class="row">
    <div class="col-md-3">
      <div class="box box-primary">
        <div class="box-body box-profile">
          <img class="profile-user-img img-responsive img-circle" src="{{('/bower_components/AdminLTE/dist/img/user4-128x128.jpg')}}" alt="User profile picture">
           @if (Auth::guest())
          <h3 class="profile-username text-center">Login</h3>
          @else
          {{-- {{dd(Auth::user())}} --}}
          <h3 class="profile-username text-center">{{ Auth::user()->username }}</h3>
          <ul class="list-group list-group-unbordered">
            <li class="list-group-item">
              <b>Tham gia</b> <a class="pull-right">{{ Auth::user()->created_at}}</a>
            </li>
            <li class="list-group-item">
              <b>Bài viết</b> <a class="pull-right">{{ Auth::user()->news->count()}}</a>
            </li>
          </ul>
          <a href="{{route('admin.users.edit',Auth::user()->id)}}" class="btn btn-primary btn-block"><b>Chỉnh sửa</b></a>
          @endif
        </div>
      </div>
    </div>
    <div class="col-md-9">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Bài viết của bạn</h3>
          <div class="box-tools">
            <div class="input-group input-group-sm" style="width: 150px;">
              <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">
              <div class="input-group-btn">
                <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
              </div>
            </div>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive no-padding">
          <table class="table table-hover">
            <tr>
              <th>ID</th>
              <th>Category</th>
              <th>Title</th>
              <th>Content</th>
            </tr>
            @foreach (Auth::user()->news as $news)
              <tr>
              <td>{{$news->id}}</td>
              <td>{{$news->category->name}}</td>
              <td>{{$news->title}}</td>
              <td>{!!str_limit($news->content,100)!!}</td>
            </tr>
            @endforeach
          </table>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Inbox</h3>
        <div class="box-tools pull-right">
          <div class="has-feedback">
            <input type="text" class="form-control input-sm" placeholder="Search Mail">
            <span class="glyphicon glyphicon-search form-control-feedback"></span>
          </div>
        </div>
        <!-- /.box-tools -->
      </div>
      <!-- /.box-header -->
      <div class="box-body no-padding">
        <div class="mailbox-controls">
          <!-- Check all button -->
          <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i>
          </button>
          <div class="btn-group">
            <button type="button" class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i></button>
          </div>
          <!-- /.btn-group -->
          <button type="button" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></button>
        </div>
        <div class="table-responsive mailbox-messages">
          <table class="table table-hover table-striped">
            <tbody>
            @foreach ($feedbacks as $feedback)
              <tr>
              <td><input type="checkbox"></td>
              <td class="mailbox-star"><a href="#"><i class="fa fa-star text-yellow"></i></a></td>
              <td class="mailbox-name"><a href="read-mail.html">{{$feedback->email}}</a></td>
              <td class="mailbox-subject"> {{str_limit($feedback->content,50)}}
              </td>
              <td><button type="button" class="btn btn-default btn-sm"><a href="{{route('admin.feedbacks.edit',$feedback->id)}}"><i class="fa fa-share"></i></a></button></td>
              <td class="mailbox-attachment"></td>
              <td>{{ Carbon\Carbon::parse($feedback->created_at)->format('d-m-Y') }}</td>
            </tr>
            @endforeach
            
            </tbody>
          </table>
          <!-- /.table -->
        </div>
        <!-- /.mail-box-messages -->
      </div>
      <!-- /.box-body -->
      <div class="box-footer no-padding">
        <div class="mailbox-controls">
          <!-- Check all button -->
          <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i>
          </button>
          <div class="btn-group">
            <button type="button" class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i></button>
          </div>
          <!-- /.btn-group -->
          <button type="button" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></button>
          <ul class="pagination pagination-sm no-margin pull-right">
            <li> {{$feedbacks->render()}}</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
@endsection
