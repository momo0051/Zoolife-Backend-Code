@extends('layouts.header')
@section('content')
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
        Home Page Videos
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
                <div class="box-tools">
                  <a href="{{route('admin.videos.create')}}" class="btn btn-primary btn-sm pull-right">Add
                   Video</a>
                </div>
              </div>
              <!-- /.box-header -->
              <div class="box-body" style="overflow: scroll;padding-left: 10px; padding-right: 10px;">
                <table class="table table-bordered table-striped table-hover">
                  <tbody>


                    <tr>
                      
                      <th>
                       
                          No.
                        
                      </th>
                      
                    
                        <th>
                        
                          Title
                       
                      </th>
                      <th>
                        
                          Status
                       
                      </th>
                       <th>
                        
                          Action
                       
                      </th>
                     
                      
                    </tr>
                   <?php  $counter = 1; ?>
                    @foreach($videos as $video)
                    <tr>
                      <td>{{$counter}}</td>
                      <td>{{$video->title}}</td>                      
                       <td>                        
                        <small class="label {{($video->status == '0')?'bg-red':'bg-green'}}">
                          {{($video->status == 0)?'Unactive':'Active'}}
                         </small>
                        </td>
                    <td>
                        <div class="tools">
                          <a href="{{route('admin.videos.edit',$video->id)}}"><i class="fa fa-edit"></i></a>
                          <a href="{{route('admin.videos.delete',$video->id)}}" deleteformid="form-3680" class="confirmAction">
                            <i class="fa fa-trash-o"></i>
                          </a>
                          
                        </div>
                      </td>
                     
                    </tr>
                        <?php  $counter ++; ?>
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