<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin | Login</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="robots" content="noindex, nofollow">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="{{asset('admin_assets/css/bootstrap.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('admin_assets/css/AdminLTE.min.css')}}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{asset('admin_assets/css/blue.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin_assets/css/customer.css') }}">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
      a{
        text-decoration: none;
        color: white;
      }
      .error {
         color:red;
         font-weight: normal;
      }
      .has-feedback label~.form-control-feedback {
         top:0;
      }
    </style>
  </head>
  <body class="hold-transition login-page">
    <div class="login-box">
      <div class="login-logo">
        <a href="javascript:;" title="Admin"><b>Đăng Ký</b></a>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <form action="{{ route('register') }}" method="post" autocomplete="off" id="login">
          {!! csrf_field() !!}
          <input style="display:none">
          <input type="password" style="display:none">
          <div class="form-group has-feedback">
            <input type="text" class="form-control" placeholder="name" name="name">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
           {{--  @if($errors->has('password'))
                <p class="error">{{ $errors->first('password') }}</p>
            @endif --}}
          </div>
          <div class="form-group has-feedback">
            <input type="email" class="form-control" placeholder="Email" name="email" autocomplete="off" value="{{old('email')}}">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            @if($errors->has('email'))
                <p class="error">{{ $errors->first('email') }}</p>
            @endif
          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" placeholder="Password" name="password">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            @if($errors->has('password'))
                <p class="error">{{ $errors->first('password') }}</p>
            @endif
          </div>

          <div class="form-group has-feedback">
              <input type="password" id="password-confirm" class="form-control" placeholder="Confirm Password" name="password_confirmation">
          </div>
          <div class="row">
            <!-- /.col -->
            <div class="col-xs-4">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Đăng ký</button>
              <p>Đã có tài khoản?</p><button type="submit" class="btn btn-primary btn-block btn-flat"><a href="login">Đăng Nhập</a></button>
            </div><!-- /.col -->
          </div>
        </form>
      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

    <!-- jQuery 2.1.4 -->
    <script src="{{asset('admin_assets/js/jQuery-3.2.1.min.js')}}"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="{{asset('admin_assets/js/bootstrap.min.js')}}"></script>
    <!-- iCheck -->
    <script src="{{asset('admin_assets/js/icheck.min.js')}}"></script>
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>
    <!-- jquery validate -->
    <script src="http://cdn.jsdelivr.net/jquery.validation/1.15.0/jquery.validate.min.js"></script>
    <script>
      $(function () {
         $('#login').validate ({
            rules: {
               email: {
                 required: true,
                 email: true,
               },
               name: {
                 required: true,
               },
               password: {
                 required :true,
                 minlength: 6
               }
            },
            submitHandle: function (form) {
               form.submit();
            }
         });
      });
    </script>
  </body>
</html>
