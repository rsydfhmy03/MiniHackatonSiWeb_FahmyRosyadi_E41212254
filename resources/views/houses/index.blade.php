<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data Rumah</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="#">Aplikasi Perumahan</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link" href="{{ route('houses.index') }}">Dashboard</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('houses.create') }}">Tambah Rumah</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Logout</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container mt-4">
    <h2>Data Rumah</h2>
    <a href="{{ route('houses.create') }}" class="btn btn-primary mb-2">Tambah Rumah</a>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">Id</th>
          <th scope="col">Type</th>
          <th scope="col">Price</th>
          <th scope="col">Status</th>
          <th scope="col">Keterangan</th>
          <th scope="col">Foto Rumah</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($houses as $house)
            
       
        <tr>
          <th scope="row">{{ $house->id }}</th>
          <td>{{ $house->type }}</td>
          <td>{{ $house->price }}</td>
          <td>{{ $house->status }}</td>
          <td>{{ $house->keterangan }}</td>
          {{-- <td>{{ $house->photo }}</td> --}}
          <td>
            <img src="{{ asset('storage/' . $house->photo) }}" alt="Foto Rumah" style="width: 100px;">
          </td>
          <td>
            <a href="{{ route('houses.edit', $house->id) }}" class="btn btn-primary btn-sm">Edit</a>
            <form action="{{ route('houses.destroy', $house->id) }}" method="POST">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
