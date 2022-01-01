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
            <form  role="form" method="POST" action="{{route('admin.ads.store')}}" enctype="multipart/form-data">
              {{ csrf_field() }}
              <div class="row">
                <div class="col-lg-6 form-group">
                  <label>Title</label>
                  <input type="text" class="form-control" name="itemTitle" placeholder="Enter title" required="required">
                </div>
                <div class="col-lg-6 form-group">
                  <label>City</label>
                  <select class="form-control" name="city">
                    <option>Select</option>
                    <option value="الرياض" > الرياض       </option>
                    <option value="الشرقية" >  الشرقية  </option>
                    <option value="جدة" > جدة </option>
                    <option value="مكة" >  مكة  </option>
                    <option value="ينبع" >ي نبع  </option>
                    <option value="حفر الباطن">  حفر الباطن  </option>
                    <option value="المدينة"> المدينة </option>
                    <option value="الطائف" > الطائف </option>
                    <option value="تبوك" > تبوك  </option>
                    <option value="القصيم" >  القصيم< </option>
                    <option value="" > حائل< </option>
                    <option value="ابها" >  ابها </option>
                    <option value="الباحة" >  الباحة </option>
                    <option value="جيزان" >  جيزان</option>
                    <option value="نجران" > نجران  </option>
                    <option value="الجوف" > الجوف  </option>
                    <option value="عرعر" >  عرعر </option>
                    <option value="الكويت" >  الكويت </option>
                    <option value="الأمارات" > الأمارات  </option>
                    <option value="البحرين"  > البحرين   </option>
                  </select>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-6 form-group">
                  <label>Category</label>
                  <select class="form-control" name="category" id="category">
                    <option value="">Select</option>
                    @foreach($categories as $k=>$category)
                    <option value="{{$category->id}}">{{$category->title}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="col-lg-6 form-group" >
                  <label>SubCategory</label>
                  <select class="form-control" name="subCategory" id="subCategory">
                    <option value="">Select</option>
                   
                  </select>
                  
                </div>
              </div>
              
              
              <div class="row">
                 <div class="col-lg-6 form-group">
                  <label>Description</label>
                  <textarea class="form-control" name="itemDesc"></textarea>
                </div>
                <div class=" col-lg-6 form-group">
                  <label>Image (Press CLT to upload Multiple Images)</label>
                  <div class="input-group input-group-sm">
                    <input type="file" class="form-control" name="images[]" multiple >
                    <span class="input-group-btn">
                      <!-- <button type="button" class="btn btn-info btn-flat" id="addCF">Add Image</button> -->
                    </span>
                  </div>
                </div>
               
                
              </div>
              <div class="row"  id="customFields"></div>
              
              
              <div class="row">
                <div class="col-lg-12 ">
                  <label ><h4>How to communicate with seller</h4> </label>
                </div>
                <div class="col-lg-12">
                  <label>Phone</label>
                  <input type="checkbox" name="showPhoneNumber" value="1">
                </div>
                <div class="col-lg-12">
                  <label>Message</label>
                  <input type="checkbox" name="showMessage" value="1">
                </div>
                <div class="col-lg-12">
                  <label>Comments</label>
                  <input type="checkbox" name="showComments" value="1">
                </div>
                <div class="col-lg-12">
                  <label>ShowPhoneNo</label>
                  <input type="checkbox" name="phoneViewsCount" value="1">
                </div>
              </div>
              
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