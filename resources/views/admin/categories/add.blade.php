@extends('layouts.backend')

@section('title','Add new category')

@section('body-class','hold-transition skin-blue sidebar-mini')

@section('content')
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Category
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#"><i class="fa fa-bars"></i> Category</a></li>
        <li class="active">Add New</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- right column -->
        <div class="col-md-10 col-md-offset-1">
          <!-- Horizontal Form -->
          <hr>
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Add new category</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            {{Form::open(array('url'=>route('postAdminAddnewCategory'),'method' => 'post','role'=>'form','class'=>'form-horizontal','files'=>true))}}
              <div class="box-body">
                <!-- Error Part-->
                <div class="box-body">
                  @include('admin.myerrorSection')
                </div>
                
                <div class="form-group">
                  {{ Form::label('category_name', 'Category Name',array('class'=>'col-sm-2 control-label')) }}
                  <div class="col-sm-6">
                    {{ Form::text('category_name',old('category_name'),array('placeholder' => 'Category Name','class'=>'form-control','required'=>'required')) }}
                  </div>
                </div>
                <div class="form-group">
                  {{ Form::label('category_image', 'Category Image',array('class'=>'col-sm-2 control-label')) }}
                  <div class="col-sm-6">
                    {{ Form::file('category_image',['class'=>'form-control','style'=>'height:auto !important']) }}
                    <span class="text-red help-block"><b>(Allowed type :</b> jpeg, jpg, png)</span>
                  </div>
                </div>
                <div class="form-group">
                  {{ Form::label('active', 'Status',array('class'=>'col-sm-2 control-label')) }}
                  <div class="col-sm-6">
                    {{ Form::radio('active', 1, true,array('class'=>'')) }} Active
                    {{ Form::radio('active', 0, false,array('class'=>'')) }} Inactive
                  </div>
                </div>
              <!-- /.box-body -->
              <div class="box-footer col-md-12">
                {{Form::submit('Add New',array('class'=>'btn btn-info col-md-offset-3'))}}
                <a href="{{route('getAdminListCategories')}}" class="btn btn-default col-md-offset-1">Cancel</a>
              </div>
              <!-- /.box-footer -->
            {{Form::close()}}
          </div>
          <!-- /.box -->
        </div>
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
@endsection