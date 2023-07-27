@extends('layouts.admin')

@section('content')
<div class="card border-light bg-light px-3 mb-4">
  <div class="d-flex justify-content-between align-items-center">
    <h2>Backups</h2>
    <a href="/admin/backup/create" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Create Backup</a>
  </div>
  
</div>

<div class="container">

  <div class="card px-3 py-3 mt-5">
    <div class="row mb-4">
      <div class="col-md-6">
        <h6 class="mb-3">Backups List</h6>
      </div>
    </div>



    <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col">Time</th>
          <th scope="col">File</th>
          <th scope="col">Size</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach($backups as $backup)
        <tr>
          <td>{{$backup['created_at']}}</td>
          <td>{{$backup['file_name']}}</td>
          <td>{{$backup['file_size']}}</td>
          <td><a href="/admin/backup/download/{{$backup['file_name']}}" class="btn btn-success btn-sm"><i class="fa fa-download"></i></a>
            <a href="/admin/backup/delete/{{$backup['file_name']}}" class="btn btn-danger btn-sm"><i class="fa fa-trash" onClick="return confirm('Are you want to delete?')"></i></a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>

  </div>

</div>
@endsection
