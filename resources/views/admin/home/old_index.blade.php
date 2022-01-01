@extends('layouts.header')
@section('content')
<div class="content-wrapper">
      <section class="content-header">
        <h1>
        Home Page
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
            <div class="box box-warning">
              <div class="box-header with-border">
                <h3 class="box-title">Home Page</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <form  role="form" method="POST" action="{{route('admin.home.store')}}" enctype="multipart/form-data">
                  {{ csrf_field() }}
                  <!-- text input -->
                  <div class="form-group">
                    <label>Title</label>
                    <input type="text" class="form-control" name="title" placeholder="Enter Title" value="{{$homePageCMS->title}}">
                  </div>

                  <div class="form-group">
                    <label>Description</label>
                    <textarea class="form-control" rows="3" name="description" placeholder="" >{{$homePageCMS->description}}</textarea>
                  </div>
                  <!-- textarea -->

                  <div class="form-group">                    
                    <img id="crop_image_source_display" src="{{ asset('/uploads/home_page_cms/' . $homePageCMS->image_one) }}"
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

                  <hr></hr>              

                  <div class="form-group">
                    <label>Banner Title </label>
                    <input type="text" class="form-control" name="banner_title" placeholder="Enter Title" value="{{$homePageCMS->banner_title}}">
                  </div>

                  <div class="form-group">
                    <label>Banner Description</label>
                    <textarea class="form-control" rows="3" name="banner_description" placeholder="" >{{$homePageCMS->banner_description}}</textarea>
                  </div>
                  
                  <div class="form-group">                    
                    <img id="crop_image_source_display" src="{{ asset('/uploads/home_page_cms/' . $homePageCMS->banner_image) }}"
                    class="avatar" width="300" height="100" alt="avatar">
                    @if ($errors->has('crop_image_source'))
                    <span class="help-block">
                      <strong style="color: #a94442;">{{ str_replace('crop image source','banner',$errors->first('crop_image_source')) }}</strong>
                    </span>
                    @else
                    <h6 id="file_name">Banner Image</h6>
                    @endif
                    <label class="btn btn-default btn-file">
                      Browse <input id="crop_image_source" name="banner_image" type="file"
                      style="display: none;"
                      accept="image/*">
                    </label>                    
                  </div>

                    <hr></hr> 
                  
                   <!-- text input -->
                  <div class="form-group">
                    <label>Title Two</label>
                    <input type="text" class="form-control" name="title_two" placeholder="Enter Title" value="{{$homePageCMS->title_two}}">
                  </div>

                  <div class="form-group">
                    <label>Description</label>
                    <textarea class="form-control" rows="3" name="description_two" placeholder="" >{{$homePageCMS->description_two}}</textarea>
                  </div>
                  <!-- textarea -->

                  <div class="form-group">
                    
                    <img id="crop_image_source_display" src="{{ asset('/uploads/home_page_cms/' . $homePageCMS->image_two) }}"
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

                 <hr></hr> 
                  

                  <div class="form-group">
                    <label>Banner Title Two</label>
                    <input type="text" class="form-control" name="banner_title_two" placeholder="Enter Title" value="{{$homePageCMS->banner_title_two}}">
                  </div>

                  <div class="form-group">
                    <label>Banner Description Two</label>
                    <textarea class="form-control" rows="3" name="banner_description_two" placeholder="" >{{$homePageCMS->banner_description_two}}</textarea>
                  </div>
                

                <div class="form-group">                    
                    <img id="crop_image_source_display" src="{{ asset('/uploads/home_page_cms/' . $homePageCMS->banner_image_two) }}"
                    class="avatar" width="300" height="100" alt="avatar">
                    @if ($errors->has('crop_image_source'))
                    <span class="help-block">
                      <strong style="color: #a94442;">{{ str_replace('crop image source','banner',$errors->first('crop_image_source')) }}</strong>
                    </span>
                    @else
                    <h6 id="file_name">Banner Image Two</h6>
                    @endif
                    <label class="btn btn-default btn-file">
                      Browse <input id="crop_image_source" name="banner_image_two" type="file"
                      style="display: none;"
                      accept="image/*">
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