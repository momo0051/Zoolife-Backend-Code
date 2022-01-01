@extends('layouts.header')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Ads
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"><a href="{{route('admin.ads.show')}}">Ads</a></li>
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
                        <h3 class="box-title">Add Ads</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form role="form" method="POST" action="{{route('admin.category.store')}}"
                            enctype="multipart/form-data">

                            {{ csrf_field() }}

                            <div class="row">
                                <div class="col-lg-6 form-group">
                                    <label>Arabic Title</label>
                                    <input type="text" class="form-control" name="title" placeholder="Enter title"
                                        required="required">
                                </div>
                                <div class="col-lg-6 form-group">
                                    <label>Egnlish Title</label>
                                    <input type="text" class="form-control" name="english_title" placeholder="Enter title"
                                        required="required">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 form-group">
                                    <label>Sub Category</label>
                                    <select class="form-control" name="sub_id">
                                        <option value="0">Parent</option>
                                        @foreach($category as $ad)
                                        <option value="{{$ad->id}}">{{$ad->title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class=" col-lg-6 form-group">
                                    <label>Image (Press CLT to upload Multiple Images)</label>
                                    <div class="input-group input-group-sm">
                                        <input type="file" class="form-control" name="image">
                                        <span class="input-group-btn">
                                            <!-- <button type="button" class="btn btn-info btn-flat" id="addCF">Add Image</button> -->
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="row" id="customFields"></div>
                            <div class="form-group  text-center">
                                <input type="submit" class="btn btn-primary" value="Add">
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
