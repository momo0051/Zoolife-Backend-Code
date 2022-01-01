<?php
$route = Route::current();
$currentRouteName = \Route::currentRouteName();
$action = Route::currentRouteAction();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>ZooLife | Dashboard</title>    
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{ asset("adminlte/bower_components/bootstrap/dist/css/bootstrap.min.css") }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset("adminlte/bower_components/font-awesome/css/font-awesome.min.css") }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset("adminlte/bower_components/Ionicons/css/ionicons.min.css") }}">
    @if(in_array($currentRouteName, ['admin.slider.show']))
    <link rel="stylesheet" href="{{ asset('adminlte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
     @endif
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset("adminlte/dist/css/AdminLTE.min.css") }}">
    
    <!-- AdminLTE Skins. Choose a skin from the css/skins
    folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{ asset("adminlte/dist/css/skins/_all-skins.min.css") }}">
    @if(in_array($currentRouteName, ['homePage']))
    <!-- Morris chart -->
    <link rel="stylesheet" href="{{ asset("adminlte/bower_components/morris.js/morris.css") }}">
    
    <!-- jvectormap -->
    <link rel="stylesheet" href="{{ asset("adminlte/bower_components/jvectormap/jquery-jvectormap.css") }}">
    @endif
    <!-- Date Picker -->
    <link rel="stylesheet" href="{{ asset("adminlte/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css") }}">
    @if(in_array($currentRouteName, ['admin.article.create']))
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset("adminlte/bower_components/bootstrap-daterangepicker/daterangepicker.css") }}">
     @endif
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="{{ asset("adminlte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css") }}">
    
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

    <script>
  var SITE_URL = '{{route("homePage")}}';
  var _token = '{{ csrf_token() }}';

    
</script>
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
      <header class="main-header">
        <!-- Logo -->
        <a href="{{route('homePage')}}" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b></b> ZooLife</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>ZooLife</b></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
             
            <!-- User Account: style can be found in dropdown.less -->
            <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                
                <span class="hidden-xs">{{Auth::user()->name}}</span>
              </a>
              <ul class="dropdown-menu">
                <!-- User image -->
                <li class="user-header">
                  <img src="{{ asset('/uploads/users/' . Auth::user()->avatar) }}" class="img-circle" alt="User Image">
                  <p>
                   {{Auth::user()->name}}
                    <small>Member since {{date_format(Auth::user()->created_at,"M, Y")}}</small>
                  </p>
                </li>
                <!-- Menu Body -->
                <li class="user-body">
                  <div class="row">
                    <div class="col-xs-4 text-center">
                      <a href="#"></a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="#"></a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="#"></a>
                    </div>
                  </div>
                  <!-- /.row -->
                </li>
                <!-- Menu Footer-->
                <li class="user-footer">
                  <div class="pull-left">
                    <a href="{{route('admin.profile.showprofile')}}" class="btn btn-default btn-flat">Profile</a>
                  </div>
                  <div class="pull-right">
                   <a href="{{ route('logout') }}" class="btn btn-default btn-flat"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">Sign out</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                      style="display: none;">
                    {{ csrf_field() }}
                    </form>
                  </div>
                </li>
              </ul>
            </li>
            
          </ul>
        </div>
      </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
          <div class="pull-left image">
           <!-- <img src="{{ asset('/uploads/users/' . Auth::user()->avatar) }}" class="img-circle" alt="User Image">-->
          </div>
          <div class="pull-left info">
            <p>{{Auth::user()->name}}</p>           
            @if(Auth::user()->name)
             @php
             $online = 'text-success';
            @endphp

            @else
             @php
             $online = 'text-warning';
            @endphp
            @endif
           
            <a href="#"><i class="fa fa-circle {{$online}} "></i> Online</a>
          </div>
        </div>
        
        
        <ul class="sidebar-menu" data-widget="tree">
          <li class="header">MAIN NAVIGATION</li>
          <!-- <li class="treeview">
            <a href="#">
              <i class="fa fa-laptop"></i>
              <span>HOME CMS</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
             
              
              <li><a href="{{route('admin.home.show')}}"><i class="fa fa-circle-o text-green"></i>Home Page Content</a></li>
              <li><a href="{{route('admin.videos.show')}}"><i class="fa fa-circle-o text-green"></i>Videos</a></li>
              <li><a href="{{route('admin.footer.show')}}"><i class="fa fa-circle-o text-yellow"></i>Footer Content</a></li>
            </ul>
          </li> -->          
          <!-- <li><a href="{{route('admin.aboutus')}}"><i class="fa fa-laptop"></i> <span>About Us</span></a></li> -->
          <!-- <li><a href="{{route('admin.gallery')}}"><i class="fa fa-fw fa-image"></i> <span>Gallery</span></a></li>
          <li><a href="{{route('admin.services')}}"><i class="fa fa-fw fa-bars"></i> <span>Service</span></a></li> -->
          <!-- <li><a href="{{route('admin.contact')}}"><i class="fa fa-fw fa-bars"></i> <span>Contact Us</span></a></li> -->
          <li><a href="{{route('admin.ads.show')}}"><i class="fa fa-fw fa-bars"></i> <span>الاعلانات</span></a></li>
          <li><a href="{{route('admin.categories.show')}}"><i class="fa fa-fw fa-bars"></i> <span>الفئات</span></a></li>
          <li><a href="{{route('admin.ads.reports')}}"><i class="fa fa-fw fa-bars"></i> <span>البلاغات</span></a></li>
          <li><a href="{{route('admin.slider.show')}}"><i class="fa fa-fw fa-bars"></i> <span>الصور</span></a></li>
          <li><a href="{{route('admin.account.show')}}"><i class="fa fa-fw fa-bars"></i> <span>حسابات المستخدمين</span></a></li>
          <li><a href="{{route('admin.article.show')}}"><i class="fa fa-fw fa-bars"></i> <span>اكتشف</span></a></li>
          
          <li>
            <a href="#" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();"><i class="fa fa-fw fa-user"></i> <span>تسجيل خروج</span></a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                      style="display: none;">
                    {{ csrf_field() }}
                    </form>
          </li>
        </ul>
      </section>
      <!-- /.sidebar -->
    </aside>
    <!-- Content Wrapper. Contains page content -->
     <main class="py-4">
       @yield('content')
   </main>
   <!-- /.content-wrapper -->
    <footer class="main-footer">
      <div class="pull-right hidden-xs">
        <b>Version</b> 2.4.0
      </div>
      <strong>Copyright &copy; {{date('Y')}} <a href="{{url('/admin/home')}}">SOLAR SALES TEAM</a>.</strong> All rights
      reserved.
    </footer>
    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Create the tabs -->
      <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
        <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
        <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
      </ul>
      <!-- Tab panes -->
      <div class="tab-content">
        <!-- Home tab content -->
        <div class="tab-pane" id="control-sidebar-home-tab">
          <h3 class="control-sidebar-heading">Recent Activity</h3>
          <ul class="control-sidebar-menu">
            <li>
              <a href="javascript:void(0)">
                <i class="menu-icon fa fa-birthday-cake bg-red"></i>
                <div class="menu-info">
                  <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>
                  <p>Will be 23 on April 24th</p>
                </div>
              </a>
            </li>
            <li>
              <a href="javascript:void(0)">
                <i class="menu-icon fa fa-user bg-yellow"></i>
                <div class="menu-info">
                  <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>
                  <p>New phone +1(800)555-1234</p>
                </div>
              </a>
            </li>
            <li>
              <a href="javascript:void(0)">
                <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>
                <div class="menu-info">
                  <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>
                  <p>nora@example.com</p>
                </div>
              </a>
            </li>
            <li>
              <a href="javascript:void(0)">
                <i class="menu-icon fa fa-file-code-o bg-green"></i>
                <div class="menu-info">
                  <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>
                  <p>Execution time 5 seconds</p>
                </div>
              </a>
            </li>
          </ul>
          <!-- /.control-sidebar-menu -->
          <h3 class="control-sidebar-heading">Tasks Progress</h3>
          <ul class="control-sidebar-menu">
            <li>
              <a href="javascript:void(0)">
                <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="label label-danger pull-right">70%</span>
                </h4>
                <div class="progress progress-xxs">
                  <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                </div>
              </a>
            </li>
            <li>
              <a href="javascript:void(0)">
                <h4 class="control-sidebar-subheading">
                Update Resume
                <span class="label label-success pull-right">95%</span>
                </h4>
                <div class="progress progress-xxs">
                  <div class="progress-bar progress-bar-success" style="width: 95%"></div>
                </div>
              </a>
            </li>
            <li>
              <a href="javascript:void(0)">
                <h4 class="control-sidebar-subheading">
                Laravel Integration
                <span class="label label-warning pull-right">50%</span>
                </h4>
                <div class="progress progress-xxs">
                  <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
                </div>
              </a>
            </li>
            <li>
              <a href="javascript:void(0)">
                <h4 class="control-sidebar-subheading">
                Back End Framework
                <span class="label label-primary pull-right">68%</span>
                </h4>
                <div class="progress progress-xxs">
                  <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
                </div>
              </a>
            </li>
          </ul>
          <!-- /.control-sidebar-menu -->
        </div>
        <!-- /.tab-pane -->
        <!-- Stats tab content -->
        <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
        <!-- /.tab-pane -->
        <!-- Settings tab content -->
        <div class="tab-pane" id="control-sidebar-settings-tab">
          <form method="post">
            <h3 class="control-sidebar-heading">General Settings</h3>
            <div class="form-group">
              <label class="control-sidebar-subheading">
                Report panel usage
                <input type="checkbox" class="pull-right" checked>
              </label>
              <p>
                Some information about this general settings option
              </p>
            </div>
            <!-- /.form-group -->
            <div class="form-group">
              <label class="control-sidebar-subheading">
                Allow mail redirect
                <input type="checkbox" class="pull-right" checked>
              </label>
              <p>
                Other sets of options are available
              </p>
            </div>
            <!-- /.form-group -->
            <div class="form-group">
              <label class="control-sidebar-subheading">
                Expose author name in posts
                <input type="checkbox" class="pull-right" checked>
              </label>
              <p>
                Allow the user to show his name in blog posts
              </p>
            </div>
            <!-- /.form-group -->
            <h3 class="control-sidebar-heading">Chat Settings</h3>
            <div class="form-group">
              <label class="control-sidebar-subheading">
                Show me as online
                <input type="checkbox" class="pull-right" checked>
              </label>
            </div>
            <!-- /.form-group -->
            <div class="form-group">
              <label class="control-sidebar-subheading">
                Turn off notifications
                <input type="checkbox" class="pull-right">
              </label>
            </div>
            <!-- /.form-group -->
            <div class="form-group">
              <label class="control-sidebar-subheading">
                Delete chat history
                <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
              </label>
            </div>
            <!-- /.form-group -->
          </form>
        </div>
        <!-- /.tab-pane -->
      </div>
    </aside>
    <!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
    immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
  </div>
  <!-- ./wrapper -->
  <!-- jQuery 3 -->
  <script src="{{ asset ("adminlte/bower_components/jquery/dist/jquery.min.js") }}"></script>
  <!-- jQuery UI 1.11.4 -->
  
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
  /*$.widget.bridge('uibutton', $.ui.button);*/
  </script>
  <!-- Bootstrap 3.3.7 -->
  <script src="{{ asset ("adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js") }}"></script>
  @if(in_array($currentRouteName, ['admin.slider.show']))
   <!-- DataTables -->
<script src="{{ asset ("adminlte/bower_components/datatables.net/js/jquery.dataTables.min.js") }}"></script>
<script src="{{ asset ("adminlte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js") }}"></script>
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
@endif
  @if(in_array($currentRouteName, ['homePage']))
  <!-- Morris.js charts -->
  <script src="{{ asset ("adminlte/bower_components/raphael/raphael.min.js") }}"></script>
  <script src="{{ asset ("adminlte/bower_components/morris.js/morris.min.js") }}"></script>
  <!-- Sparkline -->
  <script src="{{ asset ("adminlte/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js") }}"></script>
  <!-- jvectormap -->
  <script src="{{ asset ("adminlte/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js") }}"></script>
  <script src="{{ asset ("adminlte/plugins/jvectormap/jquery-jvectormap-world-mill-en.js") }}"></script>
  <!-- jQuery Knob Chart -->
  <script src="{{ asset ("adminlte/bower_components/jquery-knob/dist/jquery.knob.min.js") }}"></script>
  <!-- daterangepicker -->
  <script src="{{ asset ("adminlte/bower_components/moment/min/moment.min.js") }}"></script>
  @endif
  @if(in_array($currentRouteName, ['admin.article.create']))
  <script src="{{ asset ("adminlte/bower_components/bootstrap-daterangepicker/daterangepicker.js") }}"></script>
  <!-- datepicker -->
  <script src="{{ asset ("adminlte/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js") }}"></script>

  <script type="text/javascript">
    //Date picker
    $('.datepicker').datepicker({
      autoclose: true,
       format: 'yyyy-mm-dd' 
    })
  </script>
@endif
  @if(in_array($currentRouteName, ['admin.aboutus']))
<!-- CK Editor -->
   <script src="{{ asset ("adminlte/bower_components/ckeditor/ckeditor.js") }}"></script>
  <!-- Bootstrap WYSIHTML5 -->
  <script src="{{ asset ("adminlte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js") }}"></script>

  <script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor3')
    CKEDITOR.replace('editor4')
    //bootstrap WYSIHTML5 - text editor
    $('.textarea').wysihtml5()
  })
</script>

  @endif
  @if(in_array($currentRouteName, ['admin.footer.show','admin.aboutus']))
  <!-- CK Editor -->
   <script src="{{ asset ("adminlte/bower_components/ckeditor/ckeditor.js") }}"></script>
  <!-- Bootstrap WYSIHTML5 -->
  <script src="{{ asset ("adminlte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js") }}"></script>

  <script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor1')
    CKEDITOR.replace('editor2')
    
    //bootstrap WYSIHTML5 - text editor
    $('.textarea').wysihtml5()
  })
</script>
  @endif
  <!-- Slimscroll -->
  <script src="{{ asset ("adminlte/bower_components/jquery-slimscroll/jquery.slimscroll.min.js") }}"></script>
  <!-- FastClick -->
  <script src="{{ asset ("adminlte/bower_components/fastclick/lib/fastclick.js") }}"></script>
  <!-- AdminLTE App -->
  <script src="{{ asset ("adminlte/dist/js/adminlte.min.js") }}"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="{{ asset ("adminlte/dist/js/pages/dashboard.js") }}"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="{{ asset ("adminlte/dist/js/demo.js") }}"></script>
    <!--<script  src="https://code.jquery.com/jquery-3.5.1.js"></script>-->
  <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript">
$(document).ready(function() {
    $('#example').DataTable();
} );
  </script>
  
  
  
  
 @if(in_array($currentRouteName, ['admin.home.show','admin.profile.showprofile','admin.ads.create','admin.ads.edit','admin.article.create','admin.article.edit','admin.slider.create','admin.slider.edit']))
  <script type="text/javascript">

      function readIMG(input) { 
        if (input.files && input.files[0]) {
            var reader = new FileReader();            
            reader.onload = function (e) {             
                $('#crop_image_source_display').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#crop_image_source").change(function(){
        readIMG(this);
    });
    
    $("#category").change(function(){
       var id =$(this).val();
       $.ajax({
         url: "{{ route('admin.ads.getSubcats') }}", 
        data:{ "_token": "{{ csrf_token() }}","id":id},
        type: "post",
        success: function(data){
         
           
            var html ='';
            $.each(data, function(k, v) {
             html = html+'<option value='+v.id+'>'+v.title+'</option>';
          });
           $('#subCategory').html(html);
        }
   
    });
    });
    
  </script>
   @endif

</body>
</html>