<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <title>Home</title>
</head>

<body>
    <div class="container text-center pt-4">
        Selamat Datang {{ auth()->user()->nama }}
        <div class="div">
            <form action="{{ route('logout') }}" method="post">
                @csrf
                <input type="submit" class="btn btn-danger" value="Logout">
            </form>
        </div>
        <div class="card">
            <div class="card-header">Gates</div>
            <div class="card-body">
                @can('admin')
                    <h3>Ini adalah admin {{ auth()->user()->kode_satker }}</h3>
                @elsecan('editor')
                    <h3>Ini adalah editor {{ auth()->user()->kode_satker }}</h3>
                @elsecan('user')
                    <h3>Ini adalah user {{ auth()->user()->kode_satker }}</h3>
                @endcan
            </div>
        </div>
    </div>
</body>

</html>
