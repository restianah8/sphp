<!doctype html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>@yield('title')</title>
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
        <link rel="stylesheet" href="{{asset('template/assets/scss/style.css')}}">
        <link rel="stylesheet" href="{{asset('template/assets/css/lib/vector-map/jqvmap.min.css')}}">
        <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>


    
        <link rel="stylesheet" href="{{asset('template/assets/css/lib/datatable/dataTables.bootstrap.min.css')}}">
        <!-- <link rel="stylesheet" href="assets/css/bootstrap-select.less"> -->
        <link rel="stylesheet" href="{{asset('template/assets/scss/style.css')}}">

        <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
    </head>
    <body>
        
        
        @include('layout.nav')
        @include('komponen/pesan')


            @yield('content')

            @include('layout.script')
    </body>
</html>
