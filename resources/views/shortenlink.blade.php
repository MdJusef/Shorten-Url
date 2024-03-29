<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Shorten Link</title>
</head>
<body>
<div class="container">
    <h1>Laravel - Create URL Shortner</h1>
    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <div class="card">
        <div class="card-header">
            <form method="post" action="{{ route('generate.shorten.link') }}">
                @csrf
                <div class="input-group mb-3">
                    <input type="text" name="real_link" class="form-control" placeholder="Enter URL">
                    <div class="input-group-addon">
                        <button class="btn btn-success">Generate Shorten Link</button>
                    </div>
                </div>
                    @error('real_link')
                    <p class="m-0 p-0 text-danger">{{ $message }}</p>
                    @enderror

            </form>
        </div>
    </div>

    <div>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Id</th>
                <th>Short Link</th>
                <th>Link</th>
            </tr>
            </thead>
            <tbody>
            <tbody>
            @foreach($shortenLinks as $row)
                <tr>
                    <td>{{ $row->id }}</td>
                    <td><a href="{{ $row->real_link }}" target="_blank">{{url('/',$row->short_code) }}</a></td>
                    <td>{{ $row->real_link }}</td>
                </tr>
            @endforeach
            </tbody>

            </tbody>
        </table>
    </div>
</div>


<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
-->
</body>
</html>
