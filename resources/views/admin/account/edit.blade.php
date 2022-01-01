@extends('layouts.header')
@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
    Accounts
    <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active"><a href="{{route('admin.account.show')}}">Accounts</a></li>
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
            <h3 class="box-title">Edit Accounts</h3>
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
            <form  role="form" method="POST" action="{{route('admin.account.update',$account->id)}}" enctype="multipart/form-data">
              {{ csrf_field() }}
              
              <div class="row">
                <div class="col-lg-6 form-group">
                  <label>Username</label>
                  <input type="text" class="form-control" name="username" placeholder="Enter username" required="required" value="{{$account->username}}">
                </div>
                <div class="col-lg-6 form-group">
                  <label>Email</label>
                  <input type="text" class="form-control" name="email" placeholder="Enter Name" required="required" value="{{$account->email}}">
                </div>
              </div>

              <div class="row">
                <div class="col-lg-6 form-group">
                  <label>Contact No</label>
                  <input type="text" class="form-control" name="contact_no" placeholder="Enter contact " required="required" value="{{$account->phone}}">
                </div>
                <div class="col-lg-6 form-group">
                  <label>Password</label>
                  <input type="text" class="form-control" name="password" placeholder="Enter password if you want to change" >
                   <input type="hidden" class="form-control" name="oldpassword" placeholder="Enter password" value="{{$account->passw}}">
                </div>
              </div>
               <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="status" value="1" {{($account->status == 'Yes')?'checked=""':''}}>
                                        Active
                                    </label>
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