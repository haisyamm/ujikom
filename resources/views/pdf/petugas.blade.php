<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" />
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center mb-3">Laporan Petugas</h2>
        <table class="table">
            <thead>
                <tr>
                <th>ID Petugas</th>
                <th>Nama Petugas</th>
                <th>Username</th>
                <th>Level</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
            @foreach ($petugas as $data)
                <tr>
                    <td>{{ $data->id_petugas }}</td>
                    <td>{{ $data->nama_petugas }}</td>
                    <td>{{ $data->username }}</td>
                    <td>{{ $data->id_level }}</td>
                    </td>
                </tr>
            @endforeach
            </tbody>
            </table>
    </div>
    <script src="{{ asset('js/app.js') }}" type="text/js"></script>
</body>
</html>