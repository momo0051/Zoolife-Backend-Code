@extends('layouts.header')
@section('content')
<div class="content-wrapper">
      <section class="content-header">
        <h1>
        Payments
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
                <h3 class="box-title">Payments Testing</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <form  role="form" method="POST" action="{{route('admin.payment.charge')}}" enctype="multipart/form-data">
                  {{ csrf_field() }}
                  <!-- text input -->
                  <div class="form-group">
                    <label>Amount</label>
                    <input type="text" class="form-control" name="amount" placeholder="Enter Amount" >
                  </div>
                  
                  <div class="form-group  text-center">
                    <input type="submit" class="btn btn-primary" name="submit" value="Pay Now">
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