@extends('layouts.header')
@section('content')
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
        Report
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
                </div>
              </div>
              <!-- /.box-header -->
              <div class="box-body" style="overflow: scroll;padding-left: 10px; padding-right: 10px;">
                <table id="example" class="display" style="width:100%">
                  <thead>


                    <tr>

                      <th>

                          الاسم

                      </th>

                      <th>

                          اسم المستخدم

                      </th>

                       <th>

                          تعديل

                      </th>
                      </thead>
                     <tbody>
                    </tr>
                    @foreach($reports as $account)
                    <tr>

                      <td>{{$account->itemTitle}}</td>
                      <td>{{$account->username}}</td>
                    <td>
                        <div class="tools">
                          <a href="{{route('admin.reports.delete',$account->id)}}" deleteformid="form-3680" class="confirmAction">
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
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>-->
