@extends('layouts.header')
@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
    Article
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
            <h3 class="box-title">Add Article</h3>
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
            <form  role="form" method="POST" action="{{route('admin.article.store')}}" enctype="multipart/form-data">
              {{ csrf_field() }}
              <div class="row">
                <div class="col-lg-6 form-group">
                  <label>Title</label>
                  <input type="text" class="form-control" name="title" placeholder="Enter title" >
                </div>
                <div class="col-lg-6 form-group">
                  <label>Date:</label>
                  <div class="input-group date">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" class="form-control pull-right datepicker" autocomplete="off" name="date">
                  </div>
                  <!-- /.input group -->
                </div>
              </div>
              <div class="row">
                <div class="col-lg-12 form-group">
                  <label>Description</label>
                  <textarea class="form-control" name="description"></textarea>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-6 form-group">
                   <input type="file" class="form-control" name="image[]" multiple >
                </div>
              </div>
              
              
              <div class="form-group  text-center">
                <input type="submit" class="btn btn-primary" value="Add Article">
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