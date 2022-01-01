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
          <li class="active"><a href="{{route('admin.services.show')}}">Services</a></li>
        </ol>
      </section>
      <!-- Main content -->
      <section class="content">
        @include('layouts.includes.adminlte.alerts')
        <div class="row">
          <div class="col-lg-12">
            <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title" style="padding-top: 5px;"></h3>
                <div class="box-tools">
                  
                </div>
              </div>
              <!-- /.box-header -->
              <div class="box-body" style="overflow: scroll;padding-left: 10px; padding-right: 10px;">
                <table class="table table-bordered table-striped table-hover">
                  <tbody>
                    <tr>
                      
                      <th>
                       
                          Product Name
                        
                      </th>

                       <th>
                        
                          Image 
                       
                      </th>
                     
                       <th>
                        
                          Description 
                       
                      </th>
                      <th>
                        
                          Action 
                       
                      </th>
                      
                    </tr>
                  
                    @foreach($products as $product)
                    <tr>
                      
                      <td>{{$product->name}}</td>
                      <td><img width="100px" height="100px" src="{{ asset('/uploads/services/products/' . $product->image) }}"></td>
                      <td>{{$product->description}}</td>
                    <td>
                        <div class="tools">
                          <a href="{{route('admin.services.product.edit',$product->id)}}"><i class="fa fa-edit"></i></a>
                          <a href="{{route('admin.services.product.delete',$product->id)}}" deleteformid="form-3680" class="confirmAction">
                            <i class="fa fa-trash-o"></i>
                          </a>
                          
                        </div>
                      </td>
                    </tr>

                    @endforeach
                    
                  </tbody>
                </table>
              </div>
              <!-- /.box-body -->
              
            </div>
          </div>
        </div>
        
      </section>
      <!-- /.content -->
    </div>
   @endsection