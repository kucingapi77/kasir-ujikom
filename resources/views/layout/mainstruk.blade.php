<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/icon/css/all.css">
    <link rel="stylesheet" href="/assets/sweetalert2.min.css">
    <script src="/assets/sweetalert2.all.min.js"></script>

    <title>Struk Pembayaran</title>
    <style>
        @media print{
            .btn{
                display: none;
            }
        }
    </style>
</head>
<body>
    @yield('content');
    <script src="/assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="/assets/icon/js/all.js"></script>
</body>
<script>
    window.print();
</script>
</html>
