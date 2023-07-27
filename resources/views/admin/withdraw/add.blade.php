@extends('layouts.admin')

@section('content')
<div class="card border-light bg-light px-3 mb-4">
  <div class="d-flex justify-content-between align-items-center">
    <h2>Withdraw Money</h2>
    <a href="/admin/withdraws" class="btn btn-primary">Back</a>
  </div>
  
</div>

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-4">

      <div class="card px-3 py-3 mb-5">
        <h6 class="mb-3">Add Withdraw</h6>
        <table class="table table-bordered">
          <tr>
            <td>Shop Name</td>
            <td><b>{{auth()->user()->shop_name}}</b></td>
          </tr>
          <tr>
            <td>Balance</td>
            <td><b>{{auth()->user()->balance}}</b> </td>
          </tr>
        </table>
        <form action="/admin/withdraw/add" method="post">
          @csrf 
          <div class="row">

            
            <div class="form-group col-md-12 mb-4">
              <label for="phone">Phone</label>
              <input type="number" name="phone" id="phone" value="{{auth()->user()->phone}}" class="form-control @error('phone') is-invalid @enderror" required>
              @error('phone')
              <div class="invalid-feedback">
                <p>{{ $message }}</p>
              </div>
              @enderror
            </div>

            <div class="form-group col-md-12 mb-4">
              <label for="amount">Amount</label>
              <input type="number" name="amount" id="amount" value="{{old('amount')}}" class="form-control @error('amount') is-invalid @enderror" max="{{auth()->user()->balance}}" required>
              @error('amount')
              <div class="invalid-feedback">
                <p>{{ $message }}</p>
              </div>
              @enderror
            </div>

            <div class="form-group col-md-12 mb-4">
              <label for="method">Shop Address</label>
              <select name="method" id="method" class="form-control @error('method') is-invalid @enderror" required>
                <option value="Bkash">Bkash</option>
                <option value="Nagad">Nagad</option>
              </select>
              @error('method')
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