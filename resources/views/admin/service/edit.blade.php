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
            
             <div class="box-header with-border">
                <h3 class="box-title" style="padding-top: 5px;"></h3>
                <div class="box-tools">
                  <a href="{{route('admin.services.product.create',$service->id)}}" class="btn btn-primary btn-sm pull-right">Add
                   Related Products</a>
                    <a href="{{route('admin.services.product.show')}}" class="btn btn-primary btn-sm pull-right">View Products</a>
                </div>
              </div>
            
            <!-- general form elements disabled -->
            <div class="box box-warning">
              <div class="box-header with-border">
                <h3 class="box-title">Edit Service</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <form  role="form" method="POST" action="{{route('admin.services.update',$service->id)}}" enctype="multipart/form-data">
                  {{ csrf_field() }}
                  
                  <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control" name="name" placeholder="Enter Name" required="required" value="{{$service->name}}">
                  </div>

                  <div class="form-group">
                    <label>Slug</label>
                    <input type="text" class="form-control" name="slug" placeholder="Enter slug" required="required" value="{{$service->slug}}">
                  </div>

                   <div class="form-group">
                    <label>Heading </label>
                    <input type="text" class="form-control" name="heading" placeholder="Enter heading" required="required" value="{{$service->heading}}">
                  </div>
                 

                  <div class="form-group">
                    <label>Description</label>
                    <textarea class="form-control" rows="3" name="description" placeholder="" >{{$service->description}}</textarea>
                  </div>

                   <div class="form-group">
                    <label>Description Two</label>
                    <textarea class="form-control" rows="3" name="service_details" placeholder="" >{{$service->service_details}}</textarea>
                  </div>

                    <div class="col-lg-6">
                    <div class="form-group">
                    <label>Banner Title</label>
                    <input type="text" class="form-control" value="{{$service->banner_heading}}" name="banner_heading" placeholder="Enter Name" required="required">
                  </div>
                  </div>

                  <div class="col-lg-6">
                    <div class="form-group">
                    <label>Banner Description</label>
                    <input type="text" class="form-control" value="{{$service->banner_description}}" name="banner_description" placeholder="Enter Name" required="required">
                  </div>
                  </div>

                  <div class=" col-lg-6 form-group">
                     <img id="banner_image" src="{{ asset('/uploads/services/' . $service->banner_image) }}"
                    class="avatar" width="300" height="100" alt="avatar">
                    @if ($errors->has('banner_image'))
                    <span class="help-block">
                      <strong style="color: #a94442;">{{ str_replace('crop image source','banner',$errors->first('banner_image')) }}</strong>
                    </span>
                    @else
                    <h6 id="file_name">Banner Image</h6>
                    @endif
                    <label class="btn btn-default btn-file">
                      Browse <input id="banner_image" name="banner_image" type="file"
                      style="display: none;"
                      accept="image/*">
                    </label>
                    
                  </div>

                   <div class=" col-lg-6 form-group">
                     <img id="main_image" src="{{ asset('/uploads/services/' . $service->main_image) }}"
                    class="avatar" width="300" height="100" alt="avatar">
                    @if ($errors->has('main_image'))
                    <span class="help-block">
                      <strong style="color: #a94442;">{{ str_replace('crop image source','banner',$errors->first('main_image')) }}</strong>
                    </span>
                    @else
                    <h6 id="file_name">Main Image</h6>
                    @endif
                    <label class="btn btn-default btn-file">
                      Browse <input id="main_image" name="main_image" type="file"
                      style="display: none;"
                      accept="image/*">
                    </label>
                    
                  </div>

                  

                  <div class=" col-lg-6 form-group">
                  <img id="images_one" src="{{ asset('/uploads/services/' . $service->images_one) }}"
                    class="avatar" width="300" height="100" alt="avatar">
                    @if ($errors->has('images_one'))
                    <span class="help-block">
                      <strong style="color: #a94442;">{{ str_replace('crop image source','banner',$errors->first('images_one')) }}</strong>
                    </span>
                    @else
                    <h6 id="file_name"> Image One</h6>
                    @endif
                    <label class="btn btn-default btn-file">
                      Browse <input id="images_one" name="images_one" type="file"
                      style="display: none;"
                      accept="image/*">
                    </label>
                    
                  </div>

                  <div class=" col-lg-6 form-group">
                

                    <img id="images_two" src="{{ asset('/uploads/services/' . $service->images_two) }}"
                    class="avatar" width="300" height="100" alt="avatar">
                    @if ($errors->has('images_two'))
                    <span class="help-block">
                      <strong style="color: #a94442;">{{ str_replace('crop image source','banner',$errors->first('images_two')) }}</strong>
                    </span>
                    @else
                    <h6 id="file_name"> Image Two</h6>
                    @endif
                    <label class="btn btn-default btn-file">
                      Browse <input id="images_two" name="images_two" type="file"
                      style="display: none;"
                      accept="image/*">
                    </label>
                    
                  </div>

                  <div class=" col-lg-6 form-group">
                  

                    <img id="images_three" src="{{ asset('/uploads/services/' . $service->images_three) }}"
                    class="avatar" width="300" height="100" alt="avatar">
                    @if ($errors->has('images_three'))
                    <span class="help-block">
                      <strong style="color: #a94442;">{{ str_replace('crop image source','banner',$errors->first('images_three')) }}</strong>
                    </span>
                    @else
                    <h6 id="file_name"> Image Three</h6>
                    @endif
                    <label class="btn btn-default btn-file">
                      Browse <input id="images_three" name="images_three" type="file"
                      style="display: none;"
                      accept="image/*">
                    </label>
                    
                  </div>

                  <div class=" col-lg-6 form-group">            

                    <img id="images_four" src="{{ asset('/uploads/services/' . $service->images_four) }}"
                    class="avatar" width="300" height="100" alt="avatar">
                    @if ($errors->has('images_four'))
                    <span class="help-block">
                      <strong style="color: #a94442;">{{ str_replace('crop image source','banner',$errors->first('images_four')) }}</strong>
                    </span>
                    @else
                    <h6 id="file_name"> Image Four</h6>
                    @endif
                    <label class="btn btn-default btn-file">
                      Browse <input id="images_four" name="images_four" type="file" style="display: none;" accept="image/*">
                    </label>
                    
                  </div>
                  
                
                <div class=" col-lg-12 form-group">
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