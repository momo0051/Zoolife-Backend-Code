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
                  <a href="{{route('admin.article.create')}}" class="btn btn-primary btn-sm pull-right">Add
                   Article</a>
                </div>
              </div>
              <!-- /.box-header -->
              <div class="box-body" style="overflow: scroll;padding-left: 10px; padding-right: 10px;">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      
                      <th>
                       
                          Image
                        
                      </th>
                      
                      <th>
                       
                          Title
                       
                      </th>
                        <th>
                        
                          date
                       
                      </th>
                      
                       <th>
                        
                          Action
                       
                      </th>
                     
                      
                    </tr>
                  </thead>
                  <tbody>
                    
                  
                    @foreach($articles as $article)
                    <tr>
                      
                      <td>
                        @if(!empty($article->image))
                     
                        @foreach(explode(',',$article->image) as $k=> $image)
                        @if($k == 0)
                          <img src="{{ asset('/uploads/article/' . $image) }}"  class="avatar" width="100px" height="100px" alt="avatar">
                           @endif
                        @endforeach

                      @endif
                        
                      </td>
                      <td>{{$article->title}}</td>
                      <td>{{$article->date}}</td>
                      
                    <td>
                        <div class="tools">
                          <a href="{{route('admin.article.edit',$article->id)}}"><i class="fa fa-edit"></i></a>
                          <a onclick="return confirm('Are you sure?')" href="{{route('admin.article.delete',$article->id)}}" deleteformid="form-3680" class="confirmAction">
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