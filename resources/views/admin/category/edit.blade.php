@extends('layouts.header')
@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
    Ads
    <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active"><a href="{{route('admin.categories.show')}}">Categories</a></li>
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
            <h3 class="box-title">Edit Category</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <form  role="form" method="POST" action="{{route('admin.category.update',$cat_show[0]->id)}}" enctype="multipart/form-data">
              {{ csrf_field() }}
              <div class="row">
                <div class="col-lg-6 form-group">
                  <label>Title</label>
                  <input type="text" class="form-control" name="title" placeholder="Enter title" required="required" value="{{$cat_show[0]->title}}">
                </div>
              </div>

              <div class="row">
                <div class="col-lg-6 form-group">
                  <label>English Title</label>
                  <input type="text" class="form-control" name="english_title" placeholder="Enter egnlish title" required="required" value="{{$cat_show[0]->english_title}}">
                </div>
              </div>
              <div class="row">
                <div class="col-lg-6 form-group">
                  <label>Priority</label>
                  <input type="text" class="form-control" name="priority" placeholder="Enter Priority" required="required" value="{{$cat_show[0]->priority}}">
                </div>
              </div>
              <div class="row">

                 <div class=" col-lg-6 ">
                  <label>Image</label>
                  <div class="input-group input-group-sm">
                    <input type="file" class="form-control" name="image">
                    @if(!empty($cat_show[0]->cat_img))
                          <img width="100px" height="100px" src="{{ asset('/uploads/category/'.$cat_show[0]->cat_img) }}">
                    @endif
                    <span class="input-group-btn">
                    </span>
                  </div>
                </div>
              </div>


              <div class="form-group  text-center">
                <input type="submit" class="btn btn-primary" value="Update">
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
