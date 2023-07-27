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
        <h6 class="mb-3">Edit Product</h6>
        <form action="/admin/product/edit/{{$product->id}}" method="post" enctype="multipart/form-data">
          @csrf 
          <div class="row">
            <div class="form-group col-md-12 mb-4">
              <label for="title">Title</label>
              <input type="text" name="title" id="title" value="{{$product->title}}" class="form-control @error('title') is-invalid @enderror">
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

            <div class="form-group col-md-6 mb-4">
              @if(auth()->user()->role == 1)
              <label for="status">Publish Status</label>
              <select name="status" id="status" class="form-control @error('status') is-invalid @enderror">
                <option {{$product->status == 0 ? 'selected' : ''}} value="0">Unpublished</option>
                <option {{$product->status == 1 ? 'selected' : ''}} value="1">Published</option>
              </select>
              @error('status')
              <div class="invalid-feedback">
                <p>{{ $message }}</p>
              </div>
              @enderror
              @endif
            </div>
            

            <div class="form-group col-md-4 mb-4">
              <label for="price">Price</label>
              <input type="number" name="price" id="price" value="{{$product->price}}" class="form-control @error('price') is-invalid @enderror">
              @error('price')
              <div class="invalid-feedback">
                <p>{{ $message }}</p>
              </div>
              @enderror
            </div>
            <div class="form-group col-md-4 mb-4">
              <label for="offprice">Offer Price</label>
              <input type="number" name="offprice" id="offprice" value="{{$product->offprice}}" class="form-control">
            </div>
            <div class="form-group col-md-4 mb-4">
              <label for="qty">Quantity</label>
              <input type="number" name="qty" id="qty" value="{{$product->qty}}" class="form-control @error('qty') is-invalid @enderror">
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
                <option {{$product->category_id == $cat->id ? 'selected' : ''}} value="{{$cat->id}}">{{$cat->title}}</option>
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
                <option {{$product->brand_id == $brand->id ? 'selected' : ''}} value="{{$brand->id}}">{{$brand->title}}</option>
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
              <textarea name="desc" id="desc" rows="4" class="form-control">{{$product->desc}}</textarea>
            </div>

            <div class="form-group col-md-12 mb-4">
              <label for="meta_desc">Meta Description (For SEO only)</label>
              <textarea name="meta_desc" id="meta_desc" rows="4" class="form-control">{{$product->meta_desc}}</textarea>
            </div>

            <div class="form-group col-md-12">
              <label for="tags">Meta Tags (For SEO only)</label>
              <textarea name="tags" id="tags" rows="4" class="form-control">{{$product->tags}}</textarea>
            </div>

            <div class="form-group form-check col-md-6 pl-4">
              <input type="checkbox" class="form-check-input" {{$product->campaign == 'on' ? 'checked' : ''}} name="campaign" id="campaign">
              <label class="form-check-label"  for="campaign">Campaign Products</label>
            </div>

            <div class="form-group form-check col-md-6">
              <input type="checkbox" class="form-check-input" {{$product->discount == 'on' ? 'checked' : ''}} name="discount" id="discount">
              <label class="form-check-label"  for="discount">Discount Products</label>
            </div>

            <div class="col-md-6 mt-4" id="size-box">
              <p>Add Size</p>
              @foreach(json_decode($product->size) as $size)
              @if($loop->first)
              <div class="input-group mb-3">
                <div class="input-group-prepend" id="remove-size">
                  <span class="input-group-text bg-danger">X</span>
                </div>
                <input type="text" class="form-control" name="size[]" value="{{$size}}">
                <div class="input-group-append" id="add-size">
                  <span class="input-group-text bg-success">+</span>
                </div>
              </div>
              @else
              <div class="input-group mb-3">
                <input type="text" class="form-control" name="size[]" value="{{$size}}">
              </div>
              @endif
              @endforeach
            </div>

            <div class="col-md-6 mt-4" id="color-box">
              <p>Add Color</p>
              @foreach(json_decode($product->color) as $color)
              @if($loop->first)
              <div class="input-group mb-3">
                <div class="input-group-prepend" id="remove-color">
                  <span class="input-group-text bg-danger">X</span>
                </div>
                <input type="text" class="form-control" name="color[]" value="{{$color}}">
                <div class="input-group-append" id="add-color">
                  <span class="input-group-text bg-success">+</span>
                </div>
              </div>
              @else
              <div class="input-group mb-3">
                <input type="text" class="form-control" value="{{$color}}" name="color[]">
              </div>
              @endif
              @endforeach
            </div>

            <div class="col-md-6 text-left">
              <button type="submit" class="btn btn-primary mt-4">Update</button>
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