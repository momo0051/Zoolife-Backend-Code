@extends('layouts.header')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1 id='pageTitle'>Update Profile</h1>
            <!-- You can dynamically generate breadcrumbs here -->
            <ol class="breadcrumb">
                <li><a href=""><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Update Profile</li>
            </ol>
        </section>
        <!-- Main content -->
        <section class="content">
            
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form role="form" method="POST" action="{{route('admin.profile.update', $admin->id)}}"
                              enctype="multipart/form-data">
                            {{ csrf_field() }}                           

                            <div class="box-body">
                                <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                           value="{{$admin->name}}" placeholder="Enter admin name" required>
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                    {{ $errors->first('name') }}
                                </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <img id="crop_image_source_display" src="{{ asset('/uploads/users/' . $admin->avatar) }}"
                                         class="avatar" width="300px" height="300px" alt="avatar">
                                    @if ($errors->has('image'))
                                        <span class="help-block">
                                    <strong style="color: #a94442;">
                                        {{ $errors->first('image') }}</strong>
                                </span>
                                    @else
                                        <h6 id="file_name">Profile image</h6>
                                    @endif
                                    <label class="btn btn-default btn-file">
                                        Browse <input id="crop_image_source" name="image" type="file"
                                                      style="display: none;"
                                                      onchange="readURL(this, 'file_name', 'image');"
                                                      accept="image/gif, image/jpeg, image/png">
                                    </label>

                                </div>

                                <div class="form-group"
                                     style="border-top: 1px solid red; border-bottom: 1px solid red; margin: 50px 0px 30px 0px; padding: 10px 0px 10px 0px;">
                                    <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                                        <label for="email">Email
                                            <smal>(For Login)</smal>
                                        </label>
                                        <input type="email" class="form-control" id="email" name="email"
                                               value="{{$admin->email}}"
                                               placeholder="Enter email (For Login) " readonly>
                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                    {{ $errors->first('email') }}
                                </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control" id="p1" name="p1"
                                               value="" placeholder="">
                                    </div>
                                    <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                                        <label for="password">Re-type Password</label>
                                        <input type="password" class="form-control" id="p2" name="p2"
                                               value="" placeholder="">
                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                    Password and Re-type password must be same.
                                </span>
                                        @endif
                                    </div>
                                </div>

                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary" >Update</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.box -->
                </div>
                <!--/.col (left) -->
            </div>
        </section>
    </div>
@endsection