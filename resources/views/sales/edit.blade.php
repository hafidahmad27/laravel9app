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
                    <form method="post" action="{{ route('sales.update',$sales->id) }}" enctype="multipart/form-data">
                        @csrf
                        <div class="card mt-5">
                            <div class="card-header">
                                <h3>Edit Sales</h3>
                            </div>
                            <div class="card-body">
                                @if ($errors->any())
                                <div class="alert alert-danger">
                                    <div class="alert-title">
                                        <h4>Whoops!</h4>
                                    </div>
                                    There are some problems with your input.
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif

                                @if (session('success'))
                                <div class="alert alert-success">{{ session('success') }}</div>
                                @endif

                                @if (session('error'))
                                <div class="alert alert-danger">{{ session('error') }}</div>
                                @endif
                                <div class="mb-3">
                                    <label class="form-label">Nama Sales</label>
                                    <input type="text" class="form-control" name="NamaSales" value="{{ $sales->NamaSales }}" placeholder="Name" autofocus>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Aktif</label>
                                    <input type="text" class="form-control" name="Aktif" value="{{ $sales->Aktif }}" placeholder="Aktif">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Tanggal Lahir</label>
                                    <input type="date" class="form-control" name="Tanggal_Lahir" value="{{ $sales->Tanggal_Lahir }}" placeholder="Stock">
                                </div>
                                <div class="mb-3">
                                    <label for="formFile" class="form-label">Paraf</label>
                                    <input class="form-control" type="file" name="Paraf" value="{{ $sales->Paraf }}" id="formFile">
                                </div>
                            </div>
                            <div class="card-footer">
                                <button class="btn btn-primary" type="submit">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>