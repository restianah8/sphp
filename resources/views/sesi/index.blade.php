<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="{{asset('template/assets/css/normalize.css')}}">
    <link rel="stylesheet" href="{{asset('template/assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('template/assets/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('template/assets/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('template/assets/css/flag-icon.min.css')}}">
    <link rel="stylesheet" href="{{asset('template/assets/css/cs-skin-elastic.css')}}">
    <!-- <link rel="stylesheet" href="assets/css/bootstrap-select.less"> -->
    <link rel="stylesheet" href="{{asset ('template/assets/scss/style.css')}}">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
    @include('komponen/pesan')

</head>
<body class="Ghost-White">


    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-logo">
                    <a href="">
                        <img class="align-content" src="{{asset('publik/assets/img/logo.png')}}" 
                        alt="" style="width:180px; height:180px">
                    </a>
                </div>
                <br>
                <div class="login-form">
                    <form action="/sesi/login" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Email address</label>
                            <input type="email" name="email" value="{{Session::get('email')}}" 
                            class="form-control" placeholder="email">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Password">
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox"> Remember Me
                            </label>
                            <label class="pull-right">
                                <a href="#">Forgotten Password?</a>
                            </label>

                        </div>
                        <button name="submit" type="submit" class="btn btn-success btn-flat m-b-30 m-t-30" >login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script src="{{asset('template/assets/js/vendor/jquery-2.1.4.min.js')}}"></script>
    <script src="{{asset('template/assets/js/popper.min.js')}}"></script>
    <script src="{{asset('template/assets/js/plugins.js')}}"></script>
    <script src="{{asset('template/assets/js/main.js')}}"></script>
   
</body>
</html>
