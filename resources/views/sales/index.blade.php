<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>
    <div id="app">
        <div class="main-wrapper">
            <div class="main-content">
                <div class="container">
                    <div class="card mt-5">
                        <div class="card-header">
                            <h3>List sales</h3>
                        </div>
                        <div class="card-body">
                            @if (session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                            @endif

                            @if (session('error'))
                            <div class="alert alert-danger">{{ session('error') }}</div>
                            @endif
                            <p>
                                <a class="btn btn-primary" href="{{ route('sales.create') }}">New sales</a>
                            </p>
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nama Sales</th>
                                        <th>Aktif</th>
                                        <th>Tanggal Lahir</th>
                                        <th>Paraf</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no = 1; @endphp
                                    @forelse ($sales as $sale)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $sale->NamaSales }}</td>
                                        <td>{{ $sale->Aktif }}</td>
                                        <td>{{ $sale->Tanggal_Lahir }}</td>
                                        <td><img src="{{ asset($sale->Paraf) }}" class="img-thumbnail" style="width:200px" /></td>
                                        <td>
                                            <a href="edit/{{ $sale->id }}" class="btn btn-primary">Edit</a>
                                            <a href="destroy/{{ $sale->id }}" onclick="return confirm('Apakah Anda Yakin Menghapus Data?');" class="btn btn-danger">Hapus</a>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="6">
                                            No record found!
                                        </td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>