
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
                <form action="{{url('add-customer')}}" method="post">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="name" id="name" value="{{old('name')}}" placeholder="Name">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <select class="form-control" name="sex">
                            <option value="">--Giới tính--</option>
                            <option value="0">Nam</option>
                            <option value="1">Nữ</option>
                            <option value="2">Khác</option>
                        </select>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-genderless"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" name="email" id="email" value="{{old('email')}}" placeholder="Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="integer" class="form-control" name="phone" id="phone" value="{{old('phone')}}" placeholder="Phone">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                     <div class="input-group mb-3">
                        <input type="text" class="form-control" name="adress" id="adress" value="{{old('adress')}}" placeholder="adress">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-address-card"></span>
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
                      <div class="input-group mb-3">
                        <input type="password" name="repassword" class="form-control" placeholder="Nhập lại Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!-- /.col -->
                        <div class="form-group col-12">
                            <button type="submit" class="btn btn-primary btn-block">Đăng Kí</button>
                             <a href="{{url('dang-nhap')}}" class="btn btn-primary btn-block"> Đăng nhập</a>
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