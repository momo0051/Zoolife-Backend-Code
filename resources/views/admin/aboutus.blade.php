@extends('layouts.header')
@section('content')
<div class="content-wrapper">
  <section class="content-header">
    <h1>
    About Us
    <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Dashboard</li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    @include('layouts.includes.adminlte.alerts')
    <div class="row">
      <div class="col-md-12">
        <!-- general form elements disabled -->
        <div class="box box-warning">
          <div class="box-header with-border">
            <h3 class="box-title">About Us</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <form  role="form" method="POST" action="{{route('admin.aboutus.create')}}" enctype="multipart/form-data">
              {{ csrf_field() }}
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Title</label>
                    <input type="text" class="form-control" name="title" placeholder="Enter Title" value="{{$aboutUsCMS->title}}">
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Description</label>
                    <textarea id="editor3s" class="form-control textarea" rows="3" name="description" placeholder="" >{{$aboutUsCMS->description}}</textarea>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    
                    <img id="crop_image_source_display" src="{{ asset('/uploads/aboutus_cms/' . $aboutUsCMS->image) }}"
                    class="avatar" width="300" height="100" alt="avatar">
                    @if ($errors->has('crop_image_source'))
                    <span class="help-block">
                      <strong style="color: #a94442;">{{ str_replace('crop image source','banner',$errors->first('crop_image_source')) }}</strong>
                    </span>
                    @else
                    <h6 id="file_name">Image</h6>
                    @endif
                    <label class="btn btn-default btn-file">
                      Browse <input id="crop_image_source" name="image" type="file"
                      style="display: none;"
                      accept="image/*">
                    </label>
                    
                  </div>
                </div>
              </div>
              <!-- textarea -->
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Details One</label>
                    <textarea class="form-control" rows="3" name="detail_one"> {{$aboutUsCMS->details_one}}</textarea>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-6">
                  <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control" name="name_one" placeholder="Enter Name" value="{{$aboutUsCMS->name_one}}">
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <label>Designation One</label>
                    <input type="text" class="form-control" name="designation_one" placeholder="Enter Designation" value="{{$aboutUsCMS->designation_one}}">
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <img id="crop_image_source_display" src="{{ asset('/uploads/aboutus_cms/' . $aboutUsCMS->image_one) }}"
                    class="avatar" width="300" height="100" alt="avatar">
                    @if ($errors->has('crop_image_source'))
                    <span class="help-block">
                      <strong style="color: #a94442;">{{ str_replace('crop image source','banner',$errors->first('crop_image_source')) }}</strong>
                    </span>
                    @else
                    <h6 id="file_name">Image One</h6>
                    @endif
                    <label class="btn btn-default btn-file">
                      Browse <input id="crop_image_source" name="image_one" type="file"
                      style="display: none;"
                      accept="image/*">
                    </label>
                    
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-6">
                  <div class="form-group">
                    <label>Name Two</label>
                    <input type="text" class="form-control" name="name_two" placeholder="Enter Name" value="{{$aboutUsCMS->name_two}}">
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <label>Designation Two</label>
                    <input type="text" class="form-control" name="designation_two" placeholder="Enter Designation" value="{{$aboutUsCMS->designation_two}}">
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    
                    <img id="crop_image_source_display" src="{{ asset('/uploads/aboutus_cms/' . $aboutUsCMS->image_two) }}"
                    class="avatar" width="300" height="100" alt="avatar">
                    @if ($errors->has('crop_image_source'))
                    <span class="help-block">
                      <strong style="color: #a94442;">{{ str_replace('crop image source','banner',$errors->first('crop_image_source')) }}</strong>
                    </span>
                    @else
                    <h6 id="file_name">Image Two</h6>
                    @endif
                    <label class="btn btn-default btn-file">
                      Browse <input id="crop_image_source" name="image_two" type="file"
                      style="display: none;"
                      accept="image/*">
                    </label>
                    
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-6">
                  <div class="form-group">
                    <label>Name Three</label>
                    <input type="text" class="form-control" name="name_three" placeholder="Enter Name" value="{{$aboutUsCMS->name_three}}">
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <label>Designation Three</label>
                    <input type="text" class="form-control" name="designation_three" placeholder="Enter Designation" value="{{$aboutUsCMS->designation_three}}">
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    
                    <img id="crop_image_source_display" src="{{ asset('/uploads/aboutus_cms/' . $aboutUsCMS->image_three) }}"
                    class="avatar" width="300" height="100" alt="avatar">
                    @if ($errors->has('crop_image_source'))
                    <span class="help-block">
                      <strong style="color: #a94442;">{{ str_replace('crop image source','banner',$errors->first('crop_image_source')) }}</strong>
                    </span>
                    @else
                    <h6 id="file_name">Image Three</h6>
                    @endif
                    <label class="btn btn-default btn-file">
                      Browse <input id="crop_image_source" name="image_three" type="file"
                      style="display: none;"
                      accept="image/*">
                    </label>
                    
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-12">
                  <div class="form-group  text-center">
              <input type="submit" class="btn btn-primary">
            </div>
              </div>
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