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
    <form  role="form" method="POST" action="{{route('admin.home.store')}}" enctype="multipart/form-data">
      {{ csrf_field() }}
      <div class="row">
        <div class="col-md-12">
          <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Layout One</h3>
            </div>
            <div class="box-body">
              <div class="form-group">
                <label>First Title </label>
                <input type="text" class="form-control" name="title_one" placeholder="Enter Title" value="{{$homePageCMS->title_one}}">
              </div>
              <div class="form-group">
                <label>First Description </label>
                <textarea class="form-control" rows="3" name="description_one" placeholder="" >{{$homePageCMS->description_one}}</textarea>
              </div>
              
              
            </div>
            <!-- Box body close -->
          </div>
          <!-- Close box box-warning -->
        </div>
        
        <div class="col-md-12">
          <div class="form-group  text-center">
            <input type="submit" class="btn btn-primary">
          </div>
        </div>
        
        
      </form>
    </section>
    <!-- /.content -->
  </div>
  @endsection