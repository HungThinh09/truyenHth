
<!DOCTYPE html>
<html lang="en">
<head>
@include('admin.head')
</head>
<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-logo">
        <a href="{{url('/')}}"><b>Truyện HTH</b></a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body">

                <p class="login-box-msg">Đăng Kí</p>
                @include('admin.alert')
            <form action="{{url('log-customer')}}" method="post">
                <div class="input-group mb-3">
                    <input type="email" class="form-control" name="email" id="email" value="{{old('email')}}" placeholder="Email">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" name="password" class="form-control" placeholder="Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- /.col -->
                    <div class="form-group col-12">
                        <button type="submit" class="btn btn-primary btn-block">Đăng nhập</button>
                        <a href="{{url('dang-ki')}}" class="btn btn-primary btn-block"> Đăng kí </a>
                    </div>
                    <!-- /.col -->
                </div>
                @csrf
                @method('get')
            </form>
        </div>
        <!-- /.login-card-body -->
    </div>
</div>
<!-- /.login-box -->

@include('admin.footer')
</body>
</html>
<style>
    body{
        background: url('{{asset('uploads/cus/avenger1.jpg')}}');
        background-size: cover;
    }
    .login-logo a{
        color: #fff;
    }
    .login-box{
        background-color: rgba(108, 92, 231,0.8);
        border-radius: 20%;
    }
</style>