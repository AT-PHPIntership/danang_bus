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
          <h3 class="profile-username text-center">{{ Auth::user()->username }}</h3>
          <p class="text-muted text-center">Software Engineer</p>
          <ul class="list-group list-group-unbordered">
            <li class="list-group-item">
              <b>Tham gia</b> <a class="pull-right">1,322</a>
            </li>
            <li class="list-group-item">
              <b>Bài viết</b> <a class="pull-right">543</a>
            </li>
            <li class="list-group-item">
              <b>Friends</b> <a class="pull-right">13,287</a>
            </li>
          </ul>
          <a href="#" class="btn btn-primary btn-block"><b>Chỉnh sửa</b></a>
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
              <th>Title</th>
              <th>Category</th>
              <th>Content</th>
            </tr>
            <tr>
              <td>183</td>
              <td>John Doe</td>
              <td>11-7-2014</td>
              <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
            </tr>
            <tr>
              <td>219</td>
              <td>Alexander Pierce</td>
              <td>11-7-2014</td>
              <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
            </tr>
            <tr>
              <td>657</td>
              <td>Bob Doe</td>
              <td>11-7-2014</td>
              <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
            </tr>
            <tr>
              <td>175</td>
              <td>Mike Doe</td>
              <td>11-7-2014</td>
              <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
            </tr>
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
            <button type="button" class="btn btn-default btn-sm"><i class="fa fa-reply"></i></button>
            <button type="button" class="btn btn-default btn-sm"><i class="fa fa-share"></i></button>
          </div>
          <!-- /.btn-group -->
          <button type="button" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></button>
          <div class="pull-right">
            1-50/200
            <div class="btn-group">
              <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-left"></i></button>
              <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-right"></i></button>
            </div>
            <!-- /.btn-group -->
          </div>
          <!-- /.pull-right -->
        </div>
        <div class="table-responsive mailbox-messages">
          <table class="table table-hover table-striped">
            <tbody>
            <tr>
              <td><input type="checkbox"></td>
              <td class="mailbox-star"><a href="#"><i class="fa fa-star text-yellow"></i></a></td>
              <td class="mailbox-name"><a href="read-mail.html">Alexander Pierce</a></td>
              <td class="mailbox-subject"><b>AdminLTE 2.0 Issue</b> - Trying to find a solution to this problem...
              </td>
              <td class="mailbox-attachment"></td>
              <td class="mailbox-date">5 mins ago</td>
            </tr>
            <tr>
              <td><input type="checkbox"></td>
              <td class="mailbox-star"><a href="#"><i class="fa fa-star-o text-yellow"></i></a></td>
              <td class="mailbox-name"><a href="read-mail.html">Alexander Pierce</a></td>
              <td class="mailbox-subject"><b>AdminLTE 2.0 Issue</b> - Trying to find a solution to this problem...
              </td>
              <td class="mailbox-attachment"><i class="fa fa-paperclip"></i></td>
              <td class="mailbox-date">28 mins ago</td>
            </tr>
            <tr>
              <td><input type="checkbox"></td>
              <td class="mailbox-star"><a href="#"><i class="fa fa-star-o text-yellow"></i></a></td>
              <td class="mailbox-name"><a href="read-mail.html">Alexander Pierce</a></td>
              <td class="mailbox-subject"><b>AdminLTE 2.0 Issue</b> - Trying to find a solution to this problem...
              </td>
              <td class="mailbox-attachment"><i class="fa fa-paperclip"></i></td>
              <td class="mailbox-date">11 hours ago</td>
            </tr>
            <tr>
              <td><input type="checkbox"></td>
              <td class="mailbox-star"><a href="#"><i class="fa fa-star text-yellow"></i></a></td>
              <td class="mailbox-name"><a href="read-mail.html">Alexander Pierce</a></td>
              <td class="mailbox-subject"><b>AdminLTE 2.0 Issue</b> - Trying to find a solution to this problem...
              </td>
              <td class="mailbox-attachment"></td>
              <td class="mailbox-date">15 hours ago</td>
            </tr>
            <tr>
              <td><input type="checkbox"></td>
              <td class="mailbox-star"><a href="#"><i class="fa fa-star text-yellow"></i></a></td>
              <td class="mailbox-name"><a href="read-mail.html">Alexander Pierce</a></td>
              <td class="mailbox-subject"><b>AdminLTE 2.0 Issue</b> - Trying to find a solution to this problem...
              </td>
              <td class="mailbox-attachment"><i class="fa fa-paperclip"></i></td>
              <td class="mailbox-date">Yesterday</td>
            </tr>
            <tr>
              <td><input type="checkbox"></td>
              <td class="mailbox-star"><a href="#"><i class="fa fa-star-o text-yellow"></i></a></td>
              <td class="mailbox-name"><a href="read-mail.html">Alexander Pierce</a></td>
              <td class="mailbox-subject"><b>AdminLTE 2.0 Issue</b> - Trying to find a solution to this problem...
              </td>
              <td class="mailbox-attachment"><i class="fa fa-paperclip"></i></td>
              <td class="mailbox-date">2 days ago</td>
            </tr>
            <tr>
              <td><input type="checkbox"></td>
              <td class="mailbox-star"><a href="#"><i class="fa fa-star-o text-yellow"></i></a></td>
              <td class="mailbox-name"><a href="read-mail.html">Alexander Pierce</a></td>
              <td class="mailbox-subject"><b>AdminLTE 2.0 Issue</b> - Trying to find a solution to this problem...
              </td>
              <td class="mailbox-attachment"><i class="fa fa-paperclip"></i></td>
              <td class="mailbox-date">2 days ago</td>
            </tr>
            <tr>
              <td><input type="checkbox"></td>
              <td class="mailbox-star"><a href="#"><i class="fa fa-star text-yellow"></i></a></td>
              <td class="mailbox-name"><a href="read-mail.html">Alexander Pierce</a></td>
              <td class="mailbox-subject"><b>AdminLTE 2.0 Issue</b> - Trying to find a solution to this problem...
              </td>
              <td class="mailbox-attachment"></td>
              <td class="mailbox-date">2 days ago</td>
            </tr>
            <tr>
              <td><input type="checkbox"></td>
              <td class="mailbox-star"><a href="#"><i class="fa fa-star text-yellow"></i></a></td>
              <td class="mailbox-name"><a href="read-mail.html">Alexander Pierce</a></td>
              <td class="mailbox-subject"><b>AdminLTE 2.0 Issue</b> - Trying to find a solution to this problem...
              </td>
              <td class="mailbox-attachment"></td>
              <td class="mailbox-date">2 days ago</td>
            </tr>
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
            <button type="button" class="btn btn-default btn-sm"><i class="fa fa-reply"></i></button>
            <button type="button" class="btn btn-default btn-sm"><i class="fa fa-share"></i></button>
          </div>
          <!-- /.btn-group -->
          <button type="button" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></button>
          <div class="pull-right">
            1-50/200
            <div class="btn-group">
              <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-left"></i></button>
              <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-right"></i></button>
            </div>
            <!-- /.btn-group -->
          </div>
          <!-- /.pull-right -->
        </div>
      </div>
    </div>
  </div>
@endsection
