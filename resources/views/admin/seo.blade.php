@extends('layouts.admin')

@section('content')
<div class="card border-light bg-light px-3 mb-4">
  <div class="d-flex justify-content-between align-items-center">
    <h2>SEO Setting</h2>
  </div>
  
</div>

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">

      <div class="card px-3 py-3 mb-4">
        <h6 class="mb-3">Change SEO Setting</h6>
        <form action="/admin/seo/edit" method="post">
          @csrf 
          <div class="row">
            <div class="form-group col-md-12">
              <label for="seo_tag">Google SEO Tag</label>
              <input type="text" name="seo_tag" id="seo_tag" value="{{$setting->seo_tag}}" class="form-control">
            </div>

            <div class="form-group col-md-6">
              <label for="home_desc">Home Page Meta Description</label>
              <textarea name="home_desc" id="home_desc" rows="3" class="form-control">{{$setting->home_desc}}</textarea>
            </div>

            <div class="form-group col-md-6">
              <label for="home_tags">Home Page Meta Tags</label>
              <textarea name="home_tags" id="home_tags" rows="3" class="form-control" placeholder="Seperate with comma eg: tag1, tag2, tag3">{{$setting->home_tags}}</textarea>
            </div>

            <div class="form-group col-md-6">
              <label for="camp_desc">Campaign Page Meta Description</label>
              <textarea name="camp_desc" id="camp_desc" rows="3" class="form-control">{{$setting->camp_desc}}</textarea>
            </div>

            <div class="form-group col-md-6">
              <label for="camp_tags">Campaign Page Meta Tags</label>
              <textarea name="camp_tags" id="camp_tags" rows="3" class="form-control" placeholder="Seperate with comma eg: tag1, tag2, tag3">{{$setting->camp_tags}}</textarea>
            </div>

            <div class="form-group col-md-6">
              <label for="offer_desc">Discount Page Meta Description</label>
              <textarea name="offer_desc" id="offer_desc" rows="3" class="form-control">{{$setting->offer_desc}}</textarea>
            </div>

            <div class="form-group col-md-6">
              <label for="offer_tags">Discount Page Meta Tags</label>
              <textarea name="offer_tags" id="offer_tags" rows="3" class="form-control" placeholder="Seperate with comma eg: tag1, tag2, tag3">{{$setting->offer_tags}}</textarea>
            </div>

            <div class="form-group col-md-6">
              <label for="brand_desc">Brand Page Meta Description</label>
              <textarea name="brand_desc" id="brand_desc" rows="3" class="form-control">{{$setting->brand_desc}}</textarea>
            </div>

            <div class="form-group col-md-6">
              <label for="brand_tags">Brand Page Meta Tags</label>
              <textarea name="brand_tags" id="brand_tags" rows="3" class="form-control" placeholder="Seperate with comma eg: tag1, tag2, tag3">{{$setting->brand_tags}}</textarea>
            </div>

            <div class="form-group col-md-6">
              <label for="cat_desc">Category Page Meta Description</label>
              <textarea name="cat_desc" id="cat_desc" rows="3" class="form-control">{{$setting->cat_desc}}</textarea>
            </div>

            <div class="form-group col-md-6">
              <label for="cat_tags">Category Page Meta Tags</label>
              <textarea name="cat_tags" id="cat_tags" rows="3" class="form-control" placeholder="Seperate with comma eg: tag1, tag2, tag3">{{$setting->cat_tags}}</textarea>
            </div>

            <div class="form-group col-md-6">
              <label for="seller_desc">Seller Page Meta Description</label>
              <textarea name="seller_desc" id="seller_desc" rows="3" class="form-control">{{$setting->seller_desc}}</textarea>
            </div>

            <div class="form-group col-md-6">
              <label for="seller_tags">Seller Page Meta Tags</label>
              <textarea name="seller_tags" id="seller_tags" rows="3" class="form-control" placeholder="Seperate with comma eg: tag1, tag2, tag3">{{$setting->seller_tags}}</textarea>
            </div>

            <div class="form-group col-md-6">
              <label for="track_desc">Track Order Page Meta Description</label>
              <textarea name="track_desc" id="track_desc" rows="3" class="form-control">{{$setting->track_desc}}</textarea>
            </div>

            <div class="form-group col-md-6">
              <label for="track_tags">Track Order Page Meta Tags</label>
              <textarea name="track_tags" id="track_tags" rows="3" class="form-control" placeholder="Seperate with comma eg: tag1, tag2, tag3">{{$setting->track_tags}}</textarea>
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