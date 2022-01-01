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
      <li class="active"><a href="{{route('admin.services.show')}}">Services</a></li>
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
            <h3 class="box-title">Add Service</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <form  role="form" method="POST" action="{{route('admin.services.store')}}" enctype="multipart/form-data">
              {{ csrf_field() }}
              
              <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" name="name" placeholder="Enter Name" required="required">
              </div>
              
              <div class="form-group">
                <label>Slug</label>
                <input type="text" class="form-control" name="slug" placeholder="Enter slug" required="required">
              </div>
              <div class="form-group">
                <label>Heading </label>
                <input type="text" class="form-control" name="heading" placeholder="Enter heading" required="required">
              </div>
              
              <div class="form-group">
                <label>Description</label>
                <textarea class="form-control" rows="3" name="description" placeholder="" ></textarea>
              </div>
              <div class="form-group">
                <label>Description Two</label>
                <textarea class="form-control" rows="3" name="service_details" placeholder="" ></textarea>
              </div>
             

               
              <div class="col-lg-6 form-group">
                
                <label>Banner Title</label>
                <input type="text" class="form-control" name="banner_heading" placeholder="Enter Name" required="required">
                
              </div>
              <div class="col-lg-6 form-group">
                
                <label>Banner Description</label>
                <input type="text" class="form-control" name="banner_description" placeholder="Enter Name" required="required">
                
              </div>
              <div class=" col-lg-6 form-group">
                <label class="btn btn-default btn-file">
                  Banner Image<input  id="image" name="banner_image" type="file"
                  style="display: none;"
                  accept="image/*">
                </label>
              </div>
              <div class=" col-lg-6 form-group">
                
                <label class="btn btn-default btn-file">
                  Main Image<input  id="image" name="main_image" type="file"
                  style="display: none;"
                  accept="image/*">
                </label>
              </div>
              <div class=" col-lg-6 form-group">
                <label class="btn btn-default btn-file">
                  Browse Image1<input  id="image" name="images_one" type="file"
                  style="display: none;"
                  accept="image/*">
                </label>
                
              </div>
              <div class=" col-lg-6 form-group">
                <label class="btn btn-default btn-file">
                  Browse Image2<input  id="image" name="images_two" type="file"
                  style="display: none;"
                  accept="image/*">
                </label>
                
              </div>
              <div class=" col-lg-6 form-group">
                <label class="btn btn-default btn-file">
                  Browse Image3<input  id="image" name="images_three" type="file"
                  style="display: none;"
                  accept="image/*">
                </label>
                
              </div>
              <div class=" col-lg-6 form-group">
                <label class="btn btn-default btn-file">
                  Browse Image4<input  id="image" name="images_four" type="file"
                  style="display: none;"
                  accept="image/*">
                </label>
                
              </div>
              
              
              <div class=" col-lg-12 form-group">
                <input type="submit" class="btn btn-primary">
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