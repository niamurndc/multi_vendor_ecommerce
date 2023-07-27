@extends('layouts.admin')

@section('content')
<div class="card border-light bg-light px-3 mb-4">
  <div class="d-flex justify-content-between align-items-center">
    <h2>Products</h2>
    <a href="/admin/products" class="btn btn-primary">Back</a>
  </div>
  
</div>

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">

      <div class="card px-3 py-3 mb-5">
        <h6 class="mb-3">Add Product</h6>
        <form action="/admin/product/create" method="post" enctype="multipart/form-data">
          @csrf 
          <div class="row">
            <div class="form-group col-md-6 mb-4">
              <label for="title">Title</label>
              <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror">
              @error('title')
              <div class="invalid-feedback">
                <p>{{ $message }}</p>
              </div>
              @enderror
            </div>
            <div class="form-group col-md-6 mb-4">
              <label for="image">Image</label>
              <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror">
              @error('image')
              <div class="invalid-feedback">
                <p>{{ $message }}</p>
              </div>
              @enderror
            </div>

            <div class="form-group col-md-4 mb-4">
              <label for="offprice">Old Price </label>
              <input type="number" name="offprice" id="offprice" class="form-control">
            </div>

            <div class="form-group col-md-4 mb-4">
              <label for="price">Regular Price</label>
              <input type="number" name="price" id="price" class="form-control @error('price') is-invalid @enderror">
              @error('price')
              <div class="invalid-feedback">
                <p>{{ $message }}</p>
              </div>
              @enderror
            </div>
            
            <div class="form-group col-md-4 mb-4">
              <label for="qty">Quantity</label>
              <input type="number" name="qty" id="qty" class="form-control @error('qty') is-invalid @enderror">
              @error('qty')
              <div class="invalid-feedback">
                <p>{{ $message }}</p>
              </div>
              @enderror
            </div>

            <div class="form-group col-md-6 mb-4">
              <label for="category">Category</label>
              <select name="category" id="category" class="form-control @error('category') is-invalid @enderror">
                <option value="">Select Category</option>
                @foreach($categories as $cat)
                <option value="{{$cat->id}}">{{$cat->title}}</option>
                @endforeach
              </select>
              @error('category')
              <div class="invalid-feedback">
                <p>{{ $message }}</p>
              </div>
              @enderror
            </div>
            <div class="form-group col-md-6 mb-4">
              <label for="brand">Brand</label>
              <select name="brand" id="brand" class="form-control @error('brand') is-invalid @enderror">
                <option value="">Select Brand</option>
                @foreach($brands as $brand)
                <option value="{{$brand->id}}">{{$brand->title}}</option>
                @endforeach
              </select>
              @error('brand')
              <div class="invalid-feedback">
                <p>{{ $message }}</p>
              </div>
              @enderror
            </div>

            <div class="form-group col-md-12 mb-4">
              <label for="desc">Description</label>
              <textarea name="desc" id="desc" rows="4" class="form-control"></textarea>
            </div>

            <div class="form-group col-md-12 mb-4">
              <label for="meta_desc">Meta Description (For SEO only)</label>
              <textarea name="meta_desc" id="meta_desc" rows="4" class="form-control"></textarea>
            </div>

            <div class="form-group col-md-12 mb-4">
              <label for="tags">Meta Tags (For SEO only)</label>
              <textarea name="tags" id="tags" rows="4" class="form-control" placeholder="Tag1, tag-2"></textarea>
            </div>

            <div class="form-group form-check col-md-6 px-4">
              <input type="checkbox" class="form-check-input" id="campaign" name="campaign">
              <label class="form-check-label"  for="campaign">Campaign Products</label>
            </div>

            <div class="form-group form-check col-md-6 px-4">
              <input type="checkbox" class="form-check-input" id="discount" name="discount">
              <label class="form-check-label"  for="discount">Discount Products</label>
            </div>

            <div class="col-md-6 mt-4" id="size-box">
              <p>Add Size</p>
              <div class="input-group mb-3">
                <div class="input-group-prepend" id="remove-size">
                  <span class="input-group-text bg-danger">X</span>
                </div>
                <input type="text" class="form-control" name="size[]">
                <div class="input-group-append" id="add-size">
                  <span class="input-group-text bg-success">+</span>
                </div>
              </div>
            </div>

            <div class="col-md-6 mt-4" id="color-box">
              <p>Add Color</p>
              <div class="input-group mb-3">
                <div class="input-group-prepend" id="remove-color">
                  <span class="input-group-text bg-danger">X</span>
                </div>
                <input type="text" class="form-control" name="color[]">
                <div class="input-group-append" id="add-color">
                  <span class="input-group-text bg-success">+</span>
                </div>
              </div>
            </div>

            <div class="col-md-6 text-left">
              <button type="submit" class="btn btn-primary mt-4">Create</button>
            </div>
          </div>
        </form>
      </div>

      </div>
  </div>
</div>

@endsection

@section('script')
  <script>
    $(document).ready(function(){
      $('#add-size').click(function(){
        $('#size-box').append('<div class="input-group mb-3" id="size-item"><input type="text" class="form-control" name="size[]"></div>');
      });

      $('#remove-size').click(function(){
        $('#size-item').last().remove();
      });

      $('#add-color').click(function(){
        $('#color-box').append('<div class="input-group mb-3" id="color-item"><input type="text" class="form-control" name="color[]"></div>');
      });

      $('#remove-color').click(function(){
        $('#color-item').last().remove();
      });
    });
  </script>
@endsection