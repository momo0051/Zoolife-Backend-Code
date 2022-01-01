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
            <!-- general form elements disabled -->
            <div class="box box-warning">
              <div class="box-header with-border">
                <h3 class="box-title">Footer Managment Content</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <form  role="form" method="POST" action="{{route('admin.footer.store')}}" enctype="multipart/form-data">
                  {{ csrf_field() }}
                  
                  <!-- textarea -->
                  <div class="form-group">
                    <label>Main Content</label>
                    <textarea id="editor1" class="form-control" rows="3" name="detail_one">{{$footerCMS->left_cms_content}} </textarea>
                  </div>
                  <div class="form-group">
                    <label>Contacts Details</label>
                    <textarea id="editor2" class="form-control" rows="3" name="detail_two">{{$footerCMS->right_cms_content}} </textarea>
                  </div>
                  
                  <div class="form-group  text-center">
                    <input type="submit" class="btn btn-primary" >
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
    
    
    <script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>