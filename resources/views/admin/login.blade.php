<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Rivercrane Login</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <link rel="stylesheet" href="dist/css/style.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <img src="https://lh6.googleusercontent.com/WkKyT4UBm9_BLLGumTeQ19JaYFcH9EQ8rT8KrVUUR0mXO3Nx74monVaJqUjKZde4XiIGwIUabW0TQWCWod1J_E58psQ3MmOzdxZjgxoqQ2J8JrKfyVqJISnhojKUjE8v8tuMoVdWsw" alt="">
    </div>
    <div class="card-body">


      <form action="{{route('postLogin')}}" method="post" novalidate >
        @csrf
        <div class="input-group mb-3">
          <input type="email"  class="form-control" placeholder="Email" name="email" id="email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>


                <span class="error_message" id="emailerror"></span>


        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="password" id="password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>


                <span class="error_message" id="passworderror"></span>


        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" name='remember' value="remember" id='remember'>
              <label for="remember">
                Remember Me
              </label>

            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block" id="submit">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>


                <span class="error_message" id="msg"></span>



      <!-- /.social-auth-links -->


      {{-- <p class="mb-0">
        <a href="register.html" class="text-center">Register a new membership</a>
      </p> --}}
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<script>
   $(document).ready(function () {
       $("form").on('submit',function (e) {
           e.preventDefault();

        //    console.log($('#remember').prop("checked"));
           $.ajax({
               type: "post",
               url: "{{route('postLogin')}}",
               data: { '_token': '{{ csrf_token()}}', 'email': $('#email').val() , 'password':$('#password').val(), 'remember':$('#remember').prop("checked")},
               success: function (response) {
                //    console.log(response);
                   $('#emailerror').empty();
                   $('#passworderror').empty();
                   $('#msg').empty();
                   if (response.error){
                    $('#emailerror').html(response.error.email);
                    $('#passworderror').html(response.error.password);
                   }
                   if (response.msg != '1'){
                       $('#msg').html(response.msg);
                   }else{
                       return window.location.href = '{{route("getListProduct")}}';
                   }

               }
           });
       });
   });
</script>
</body>
</html>
