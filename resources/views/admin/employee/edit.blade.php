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
      <li class="active"><a href="{{route('admin.employee.show')}}">Employees</a></li>
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
            <h3 class="box-title">Edit Employees</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <form  role="form" method="POST" action="{{route('admin.employee.update',$employee->id)}}" enctype="multipart/form-data">
              {{ csrf_field() }}
              
              <div class="row">
                <div class="col-lg-6 form-group">
                  <label>Name</label>
                  <input type="text" class="form-control" name="name" placeholder="Enter Name" required="required" value="{{$employee->name}}">
                </div>
                <div class="col-lg-6 form-group">
                  <label>Email</label>
                  <input type="email" class="form-control" name="email" placeholder="Enter email" required="required" value="{{$employee->email}}">
                </div>
              </div>
              <div class="row">
                <div class="col-lg-6 form-group">
                  <label>Position</label>
                  <input type="text" class="form-control" name="position" placeholder="Enter Position" required="required" value="{{$employee->position}}">
                </div>
                <div class="col-lg-6 form-group">
                  <label>Year Of Service</label>
                  <input type="text" class="form-control" name="year_of_service" placeholder="Enter email" required="required" value="{{$employee->year_of_service}}">
                </div>
              </div>
              <div class="row">
                <div class="col-lg-6 form-group">
                  <label>Performance</label>
                  <input type="text" class="form-control" name="performance" placeholder="Enter Performance" required="required" value="{{$employee->performance}}">
                </div>
                <div class="col-lg-6 form-group">
                  <label>Others</label>
                  <input type="text" class="form-control" name="others" placeholder="" required="required" value="{{$employee->others}}">
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