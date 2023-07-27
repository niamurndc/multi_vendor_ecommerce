@extends('layouts.admin')

@section('content')
<div class="card border-light bg-light px-3 mb-4">
  <div class="d-flex justify-content-between align-items-center">
    <h2>Due Sell Report</h2>
  </div>
  
</div>

<div class="container">

  <div class="card px-3 py-3 mt-5">

    <h6 class="mb-3">Due Sale Report</h6>

    
    <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Time</th>
          <th scope="col">Invc.</th>
          <th scope="col">Name</th>
          <th scope="col">Phone</th>
          <th scope="col">Area</th>
          <th scope="col">Type</th>
          <th scope="col">Subtotal</th>
          <th scope="col">Paid</th>
          <th scope="col">Due</th>
        </tr>
      </thead>
      <tbody>
        @foreach($sells as $sell)
        <tr>
          <td>{{$sell->id}}</td>
          <td>{{$sell->created_at->format('d-M-y')}}</td>
          <td>{{$sell->invc}}</td>
          <td>{{$sell->name}}</td>
          <td>{{$sell->phone}}</td>
          <td>{{$sell->area}}</td>
          <td>{{$sell->type}}</td>
          <td>{{$sell->subtotal}}</td>
          <td>{{$sell->pay}}</td>
          <td>{{$sell->due}}</td>

        </tr>
        @endforeach
      </tbody>
    </table>
  </div>

</div>
@endsection
