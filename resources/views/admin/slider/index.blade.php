@extends('layouts.header')
@section('content')
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
        Home Page Sliders
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
          <div class="col-lg-12">
            <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title" style="padding-top: 5px;"></h3>
                <div class="box-tools" >
                 <!--  @if($deactivateSliders == 0)
                  <a href="{{route('admin.slider.activate')}}" class="btn btn-success btn-sm pull-left">ACTIVATE SLIDER
                  </a>
                  @else
                  <a href="{{route('admin.slider.deactivate')}}" class="btn btn-warning btn-sm pull-left">DEACTIVATE  SLIDER
                  </a>
                  @endif -->
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="{{route('admin.slider.create')}}" class="btn btn-primary btn-sm pull-right">Add
                   New</a>
                </div>
              </div>
              <!-- /.box-header -->
              <div class="box-body" style="overflow: scroll;padding-left: 10px; padding-right: 10px;">
                <table id="example1" class="table table-bordered table-striped">
                  <tbody>


                    <tr>
                      
                      <th>
                       
                          Title
                        
                      </th>
                      
                      <th>
                       
                          Image
                       
                      </th>
                        <th>
                        
                          Description
                       
                      </th>
                      <th>
                        
                          Status
                       
                      </th>
                       <th>
                        
                          Action
                       
                      </th>
                     
                      
                    </tr>
                  
                    @foreach($sliders as $slider)
                    <tr>
                      
                      <td>{{$slider->title}}</td>
                      <td><img width="100px" height="100px" src="{{ asset('/uploads/slider/' . $slider->image) }}"></td>
                       <td>{{$slider->description}}</td>
                       <td>                        
                        <small class="label {{($slider->status == '0')?'bg-red':'bg-green'}}">
                          {{($slider->status == 0)?'Unactive':'Active'}}
                         </small>
                        </td>
                    <td>
                        <div class="tools">
                          <a href="{{route('admin.slider.edit',$slider->id)}}"><i class="fa fa-edit"></i></a>
                          <a onclick="return confirm('Are you sure?')" href="{{route('admin.slider.delete',$slider->id)}}" deleteformid="form-3680" class="confirmAction">
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