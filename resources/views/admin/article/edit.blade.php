@extends('layouts.header')
@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
    Articles
    <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active"><a href="{{route('admin.article.show')}}">Articles</a></li>
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
            <h3 class="box-title">Edit Articles</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            @if(count($errors) > 0)
            <div class="alert alert-danger alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
              <ul>
                @foreach($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
              </ul>
            </div>
            @endif
            <form  role="form" method="POST" action="{{route('admin.article.update',$article->id)}}" enctype="multipart/form-data">
              {{ csrf_field() }}
              
              <div class="row">
                <div class="col-lg-6 form-group">
                  <label>Title</label>
                  <input type="text" class="form-control" name="title" placeholder="Enter title"  value="{{$article->title}}">
                </div>
                <div class="col-lg-6 form-group">
                  <label>Date</label>
                  <input type="text" class="form-control datepicker" name="date" placeholder="Enter Date" value="{{$article->date}}" >
                </div>
              </div>
              <div class="row">
                <div class="col-lg-12 form-group">
                  <label>Description</label>
                  <textarea class="form-control" name="description">{{$article->description}}</textarea>
                </div>
               
              </div>
              <div class="row">
                 <div class="col-lg-6 form-group"> 
                             
                  <label>Image (Press CLT to upload Multiple Images)</label>
                  <div class="input-group input-group-sm">
                    <input type="file" class="form-control" name="image[]" multiple>

                    @if(!empty($article->image))
                    @foreach(explode(',', $article->image) as $image)
                    <img width="100px" height="100px" src="{{ asset('/uploads/article/' . $image) }}" >
                    @endforeach
                    @endif
                </div>
              </div>
              
             <div class="form-group  text-center">
                <input type="submit" class="btn btn-primary" value="Update"></input>
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