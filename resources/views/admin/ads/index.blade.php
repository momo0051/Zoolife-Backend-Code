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
                            <div class="box-tools row">
                                <div class="col-md-9">
                                    <form action="{{ route('save.perpage') }}" method="post">
                                        @csrf
                                        <input type="num" name="pagination" min="0" placeholder="posts per page"
                                            value="{{ $per_page }}">
                                        <button type="submit">Save</button>
                                    </form>
                                </div>
                                <div class="col-md-3">
                                    <a href="{{ route('admin.ads.create') }}" class="btn btn-primary btn-sm pull-right">Add
                                        Ads</a>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body" style="overflow: scroll;padding-left: 10px; padding-right: 10px;">
                            <table id="example" class="display" style="width:100%">
                                <thead>


                                    <tr>



                                        <th>

                                            Image

                                        </th>

                                        <th>

                                            Title

                                        </th>

                                        <th>

                                            City

                                        </th>
                                        <th>

                                            Description

                                        </th>

                                        <th>

                                            Action

                                        </th>


                                    </tr>
                                </thead>

                                <tbody>

                                    @foreach ($ads as $ad)
                                        <!--{{ $ad }}-->


                                        <tr>


                                            <td>
                                                <img width="100px" height="100px" src="{{ $ad->imgUrl }}">
                                                @if ($ad->priority != '' and $ad->priority != '0')
                                                    <span class="badge badge-info" style="color: #fff;

        background-color: #e4d010;
        position: absolute; left: 8px;">Primium</span>
                                                @endif
                                            </td>
                                            <td>{{ $ad->itemTitle }}</td>
                                            <td>{{ $ad->city }}</td>
                                            <td>{{ $ad->itemDesc }}</td>


                                            <td>
                                                <div class="tools">
                                                    <a href="{{ route('admin.ads.edit', $ad->id) }}"><i
                                                            class="fa fa-edit"></i></a>
                                                    <a onclick="return confirm('Are you sure?')"
                                                        href="{{ route('admin.ads.delete', $ad->id) }}"
                                                        deleteformid="form-3680" class="confirmAction">
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
