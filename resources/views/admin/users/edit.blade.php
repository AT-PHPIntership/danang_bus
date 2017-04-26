@extends('admin.layouts.master')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{trans('users.update')}}</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('admin.users.update',$user->id) }}">
                        {{ csrf_field() }}
                        {{method_field('PUT')}}
                        <div class="form-group">
                            <label for="username" class="col-md-4 control-label">{{trans('users.username')}}</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="username" value="{{$user->username}}"  disabled="">
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('fullname') ? ' has-error' : '' }}">
                            <label for="fullname" class="col-md-4 control-label">{{trans('users.fullname')}}</label>
                            <div class="col-md-6">
                                <input id="fullname" type="text" class="form-control" name="fullname" value="{{$user->fullname}}" autofocus>
                                @if ($errors->has('fullname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('fullname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email" class="col-md-4 control-label">{{trans('users.email')}}</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{$user->email}}" disabled="">
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('oldpassword') ? ' has-error' : '' }}">
                            <label  class="col-md-4 control-label">{{trans('users.oldpassword')}}</label>
                            <div class="col-md-6">
                                <input type="password" class="form-control" name="oldpassword" required>

                                @if ($errors->has('oldpassword'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('oldpassword') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label  class="col-md-4 control-label">{{trans('users.password')}}</label>
                            <div class="col-md-6">
                                <input  type="password" class="form-control" min="6" name="password" required>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label  class="col-md-4 control-label">{{trans('users.confirmPassword')}}</label>

                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    {{trans('users.update')}}
                                </button>
                                <button type="submit" class="btn btn-warning">
                                    {{trans('admin.cancel')}}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection