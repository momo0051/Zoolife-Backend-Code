@extends('layouts.header')
@section('content')
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
        Gallery
        <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active"><a href="{{route('admin.gallery.show')}}">Products</a></li>
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
                <h3 class="box-title">Add Gallery</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <form  role="form" method="POST" action="{{route('admin.gallery.store')}}" enctype="multipart/form-data">
                  {{ csrf_field() }}
                  
                  <div class="form-group">
                    <label>Title</label>
                    <input type="text" class="form-control" name="title" placeholder="Enter title" required="required">
                  </div>
                 
                  
                  <div class="form-group">
                      <label class="btn btn-default btn-file">
                      Browse <input  id="main_image" name="main_image" type="file"
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
                                    <input type="checkbox" name="status" value="1">Active (For Home Page)
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