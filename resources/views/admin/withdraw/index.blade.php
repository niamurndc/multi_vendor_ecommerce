@extends('layouts.admin')

@section('content')
<div class="card border-light bg-light px-3 mb-4">
  <div class="d-flex justify-content-between align-items-center">
    <h2>Withdrawls</h2>
  </div>
  
</div>

<div class="container">

  <div class="card px-3 py-3 mt-5">
    <h6 class="mb-3">All withdraw requests</h6>
    <table class="table table-striped" id="example">
      <thead>
        <tr>
          <th scope="col">ID</th>
          @if(auth()->user()->role == 1)
          <th scope="col">Name</th>
          <th scope="col">Shop</th>
          @endif
          <th scope="col">Method</th>
          <th scope="col">Phone</th>
          <th scope="col">Amount</th>
          <th scope="col">Status</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach($withdraws as $withdraw)
        <tr>
          <td>{{$withdraw->id}}</td>
          @if(auth()->user()->role == 1)
          <td>{{optional($withdraw->seller)->name}}</td>
          <td>{{optional($withdraw->seller)->shop_name}}</td>
          @endif
          <td>{{$withdraw->method}}</td>
          <td>{{$withdraw->phone}}</td>
          <td>{{$withdraw->amount}} Tk</td>
          <td>@if($withdraw->status == 0) Pending @elseif($withdraw->status == 1) Accepted @elseif($withdraw->status == 2) Rejected @endif</td>
          <td>
          @if(auth()->user()->role == 1)
            <a href="/admin/withdraw/view/{{$withdraw->id}}" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></a>
            @endif
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>

</div>
@endsection
