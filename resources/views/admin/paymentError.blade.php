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
            
            {{$message}}
            
          </div>
          
        </div>
        
      </section>
      <!-- /.content -->
    </div>
    @endsection