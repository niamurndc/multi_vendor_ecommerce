@extends('layouts.admin')

@section('content')
<div class="card border-light bg-light px-3 mb-4">
  <div class="d-flex justify-content-between align-items-center">
    <h2>Withdraw</h2>
    <a href="/admin/withdraws" class="btn btn-primary">Back</a>
  </div>
  
</div>

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-4">

      <div class="card px-3 py-3 mb-5">
        <h6 class="mb-3">Withdraw Details</h6>
        <table class="table table-bordered">
          <tr>
            <td>Seller Name</td>
            <td><b>{{$withdraw->seller->name}}</b></td>
          </tr>
          <tr>
            <td>Seller Phone</td>
            <td><b>{{$withdraw->seller->phone}}</b></td>
          </tr>
          <tr>
            <td>Shop Name</td>
            <td><b>{{$withdraw->seller->shop_name}}</b></td>
          </tr>
          <tr>
            <td>Balance</td>
            <td><b>{{$withdraw->seller->balance}}</b> </td>
          </tr>
          <tr>
            <td>Amount</td>
            <td><b>{{$withdraw->amount}}</b> </td>
          </tr>
          <tr>
            <td>Method</td>
            <td><b>{{$withdraw->method}}</b> </td>
          </tr>
          <tr>
            <td>Phone</td>
            <td><b>{{$withdraw->phone}}</b> </td>
          </tr>
        </table>
        <form action="/admin/withdraw/edit/{{$withdraw->id}}" method="post">
          @csrf 
          <div class="row">

            <div class="form-group col-md-12 mb-4">
              <label for="status">Status</label>
              <select name="status" id="status" class="form-control @error('status') is-invalid @enderror" required>
                <option {{$withdraw->status == 0 ? 'slected' : ''}} value="0">Processing</option>
                <option {{$withdraw->status == 1 ? 'slected' : ''}} value="1">Accepted</option>
                <option {{$withdraw->status == 2 ? 'slected' : ''}} value="2">Rejected</option>
              </select>
              @error('status')
              <div class="invalid-feedback">
                <p>{{ $message }}</p>
              </div>
              @enderror
            </div>

            

            <div class="col-md-6 text-left">
              <button type="submit" class="btn btn-primary mt-4">Send Request</button>
            </div>
          </div>
        </form>
      </div>

      </div>
  </div>
</div>

@endsection