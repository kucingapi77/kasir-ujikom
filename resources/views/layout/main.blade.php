<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/sweetalert2.min.css">
    <link rel="stylesheet" href="/assets/icon/css/all.css">
    <script src="/assets/sweetalert2.all.min.js"></script>
    <script src="{{ asset('assets/jquery-3.7.1.min.js') }}"></script>

    <title>Document</title>
</head>

<body style="background-color: rgb(230, 235, 235);">
    <div class="container-fluid ">
        <div class="row">
            @include('component.sidebar')
            <div class="col">
                @include('component.navbar')
                @yield('content')
            </div>
        </div>
    </div>

    <script src="/assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="/assets/icon/js/all.js"></script>
</body>

</html>
