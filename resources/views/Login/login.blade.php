<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Login Form</title>
  
    <base href="{{asset('')}}">
      <link rel="stylesheet" href="Login_asset/css/style.css">

  
</head>

<body>
  <div class="login">
  <div class="login-triangle"></div>
  
  <h2 class="login-header">Log in</h2>

  <form class="login-container" method="post" action="Admin/dangnhap">
    @if ( ! $errors->isEmpty() )
        <div class="row">
            @foreach ( $errors->all() as $error )
                <div class="col-md-6 col-md-offset-2 alert alert-danger">{{ $error }}</div>
            @endforeach
        </div>
    @elseif ( Session::has( 'message' ) )
        <div class="row">
            <div class="col-md-6 col-md-offset-2 alert alert-success">{{ Session::get( 'message' ) }}</div>
        </div>
    @else
        <p> </p>
    @endif
    <input type="hidden" name="_token" value="{{csrf_token()}}">
    <p><input type="text" placeholder="Username" name="username"></p>
    <p><input type="password" placeholder="Password" name="password"></p>
    <p><input type="submit" value="Log in" name="submit"></p>
  </form>
</div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

  
</body>
</html>
