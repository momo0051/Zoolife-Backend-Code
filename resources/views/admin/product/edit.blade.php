@extends('layouts.header')
@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
    Products
    <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active"><a href="{{route('admin.product.show')}}">Products</a></li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-md-12">
        
        
        
        <!-- general form elements disabled -->
        <div class="box box-warning">
          <div class="box-header with-border">
            <h3 class="box-title">Edit Products</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <form  role="form" method="POST" action="{{route('admin.product.update',$product->id)}}" enctype="multipart/form-data">
              {{ csrf_field() }}
              
              <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" required="required" name="name" placeholder="Enter Name" value="{{$product->name}}">
              </div>
              
              
              <div class="form-group">
                <img id="crop_image_source_display" src="{{ asset('/uploads/products/' . $product->image) }}"
                class="avatar" width="300" height="100" alt="avatar">
                @if ($errors->has('crop_image_source'))
                <span class="help-block">
                  <strong style="color: #a94442;">{{ str_replace('crop image source','banner',$errors->first('crop_image_source')) }}</strong>
                </span>
                @else
                <h6 id="file_name">Image Two</h6>
                @endif
                
                <label class="btn btn-default btn-file">
                  Browse <input id="image" name="image" type="file"
                  style="display: none;" accept="image/*">
                </label>
                
              </div>
              <div class="form-group">
                <label>Description</label>
                <textarea class="form-control" rows="3" name="description" required="required">{{$product->description}}</textarea>
              </div>

               <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="status" value="1" {{($product->status == 1)?'checked=""':''}}>
                                        Active
                                    </label>
                                </div>
              
              
              <div class="form-group  text-center">
                <input type="submit" class="btn btn-primary"></input>
              </div>
            </form>
          </div>
          <!-- /.box-body -->
        </div>
        
      </div>
      
    </div>
    
  </section>
  <!-- /.content -->
</div>
@endsection