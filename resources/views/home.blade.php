<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

@php
    $userInfo = Session::get('userInfo');
@endphp

<body>
    <div class="container my-5">

        <div class="card">
            <div class="card-header">
                Home
            </div>
            <div class="card-body">
                <p class="card-text">Nama : {{ $userInfo['name'] }}</p>
                <p class="card-text">NIP : {{ $userInfo['nip'] }}</p>
                <p class="card-text">Jabatan : {{ $userInfo['jabatan'] }}</p>
                <p class="card-text">Organisasi : {{ $userInfo['organisasi'] }}</p>
                <p class="card-text">Jenis jabatan : {{ $userInfo['jenis_jabatan'] }}</p>
                <p class="card-text">No. Telp : {{ $userInfo['phone_number'] }}</p>
                <p class="card-text">NIK : {{ $userInfo['g2c_Nik'] }}</p>
                <p class="card-text">NPWP : {{ $userInfo['g2c_Npwp'] }}</p>
                <a href="{{ route('logout') }}" class="btn btn-primary">Logout</a>
            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>
