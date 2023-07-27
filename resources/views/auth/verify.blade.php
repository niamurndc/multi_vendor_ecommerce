@extends('layouts.home')

@section('title')
Verify User
@endsection

@section('content')

<div class="col-md-4 mt-5 mx-auto">
  <div class="card p-4">
    
    <h2 class="text-center">Varify</h2>

    <form action="/varify" method="POST"> @csrf

    <div class="form-group">
      <label for="code">Varification Code</label>
      <input type="number" name="code" id="code" class="form-control @error('code') is-invalid @enderror" value="{{old('code')}}" required autofocus>
      @error('code')
        <div class="invalid-feedback">
          {{$message}}
        </div>
      @enderror
    </div>

    <button type="submit" class="btn btn-skyblue text-light btn-block my-4">Varify</button>
    
    </form>
  </div>
</div>
 <!-- / Cart view section -->
@endsection