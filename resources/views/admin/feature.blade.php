@extends('layouts.admin')

@section('content')
<div class="card border-light bg-light px-3 mb-4">
  <div class="d-flex justify-content-between align-items-center">
    <h2>Feature Section</h2>
  </div>
  
</div>

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">

      <div class="card px-3 py-3 mb-4">
        <h6 class="mb-3">Feature Section 1 (After Category Home Page)</h6>
        <form action="/admin/feature/edit/1" method="post" enctype="multipart/form-data">
          @csrf 
          <div class="row">
            <div class="form-group col-md-6">
              <label for="title">Title</label>
              <input type="text" name="title" id="title" value="{{$feature->title1}}" class="form-control @error('title') is-invalid @enderror">
              @error('title')
              <div class="invalid-feedback">
                <p>{{ $message }}</p>
              </div>
              @enderror
            </div>
            
            <div class="form-group col-md-6">
              <label for="number">Number of product show</label>
              <input type="text" name="number" id="number" value="{{$feature->number1}}" class="form-control @error('number') is-invalid @enderror">
              @error('number')
              <div class="invalid-feedback">
                <p>{{ $message }}</p>
              </div>
              @enderror
            </div>

            <div class="col-md-6 text-left">
              <button type="submit" class="btn btn-primary mt-4">Update</button>
            </div>
          </div>
        </form>
      </div> 

      <div class="card px-3 py-3 mb-4">
        <h6 class="mb-3">Feature Section 2 (home page 1st category)</h6>
        <form action="/admin/feature/edit/2" method="post" enctype="multipart/form-data">
          @csrf 
          <div class="row">
            <div class="form-group col-md-6">
              <label for="title">Title</label>
              <input type="text" name="title" id="title" value="{{$feature->title2}}" class="form-control @error('title') is-invalid @enderror">
              @error('title')
              <div class="invalid-feedback">
                <p>{{ $message }}</p>
              </div>
              @enderror
            </div>
            
            <div class="form-group col-md-6">
              <label for="number">Number of products</label>
              <input type="text" name="number" id="number" value="{{$feature->number2}}" class="form-control @error('number') is-invalid @enderror">
              @error('number')
              <div class="invalid-feedback">
                <p>{{ $message }}</p>
              </div>
              @enderror
            </div>

            <div class="form-group col-md-6 mt-4">

              <label for="cat_id">Select Category</label>
              <select name="cat_id" id="cat_id" class="form-control @error('image') is-invalid @enderror">
              @foreach($categories as $category)
                <option {{$category->id == $feature->cat_id2 ? 'selected' : ''}} value="{{$category->id}}">{{$category->title}}</option>
              @endforeach
              </select>
              @error('cat_id')
              <div class="invalid-feedback">
                <p>{{ $message }}</p>
              </div>
              @enderror
            </div>
            <div class="col-md-6 text-left mt-4">
              <button type="submit" class="btn btn-primary mt-4">Update</button>
            </div>
          </div>
        </form>
      </div>

      <div class="card px-3 py-3 mb-4">
        <h6 class="mb-3">Feature Section 3 (home page second category)</h6>
        <form action="/admin/feature/edit/3" method="post" enctype="multipart/form-data">
          @csrf 
          <div class="row">
            <div class="form-group col-md-6">
              <label for="title">Title</label>
              <input type="text" name="title" id="title" value="{{$feature->title3}}" class="form-control @error('title') is-invalid @enderror">
              @error('title')
              <div class="invalid-feedback">
                <p>{{ $message }}</p>
              </div>
              @enderror
            </div>
            
            <div class="form-group col-md-6">
              <label for="number">Number of products</label>
              <input type="text" name="number" id="number" value="{{$feature->number3}}" class="form-control @error('number') is-invalid @enderror">
              @error('number')
              <div class="invalid-feedback">
                <p>{{ $message }}</p>
              </div>
              @enderror
            </div>

            <div class="form-group col-md-6 mt-4">

              <label for="cat_id">Select Category</label>
              <select name="cat_id" id="cat_id" class="form-control @error('image') is-invalid @enderror">
              @foreach($categories as $category)
                <option {{$category->id == $feature->cat_id3 ? 'selected' : ''}} value="{{$category->id}}">{{$category->title}}</option>
              @endforeach
              </select>
              @error('cat_id')
              <div class="invalid-feedback">
                <p>{{ $message }}</p>
              </div>
              @enderror
            </div>

            <div class="col-md-6 text-left mt-4">
              <button type="submit" class="btn btn-primary mt-4">Update</button>
            </div>
          </div>
        </form>
      </div>



    </div>
  </div>
</div>

@endsection