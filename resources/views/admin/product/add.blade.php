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
                <h3 class="box-title">Add Products</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <form  role="form" method="POST" action="{{route('admin.product.store')}}" enctype="multipart/form-data">
                  {{ csrf_field() }}
                  
                  <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control" name="name" placeholder="Enter Name" required="required">
                  </div>
                 
                  
                  <div class="form-group">
                     <img id="crop_image_source_display" src="#" alt="" width="100px" height="100px;" />
                      <label class="btn btn-default btn-file">
                      Browse <input  id="image" name="image" type="file"
                      style="display: none;"
                      accept="image/*">

                    </label>
                    
                  </div>

                  <div class="form-group">
                    <label>Description</label>
                    <textarea class="form-control" rows="3" name="description" required="required"></textarea>
                  </div>
                  
                  <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="status" value="1">Active
                                </label>
                            </div>
                  <div class="form-group  text-center">
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