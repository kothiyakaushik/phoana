@extends('layouts.backend')

@section('title','Add new sub-category')

@section('body-class','hold-transition skin-blue sidebar-mini')

@push('header')
  <link rel="stylesheet" href="{{asset('/public/backend/plugins/select2/select2.min.css')}}">
@endpush

@section('content')
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Sub Category (Level-1)
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#"><i class="fa fa-bars"></i> Sub-Category</a></li>
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
              <h3 class="box-title">Add new sub category</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            {{Form::open(array('url'=>route('postAdminAddnewSubCategory'),'method' => 'post','role'=>'form','class'=>'form-horizontal'))}}
              <div class="box-body">
                <!-- Error Part-->
                <div class="box-body">
                  @include('admin.myerrorSection')
                </div>
                <div class="form-group">
                  {{ Form::label('parent_id', 'Select Category *',array('class'=>'col-sm-3 control-label')) }}
                  <div class="col-sm-6">
                    {{ Form::select('parent_id', $parentCategory, null, array('class' => 'form-control select2', 'required'=>'required', 'placeholder' => 'Select Category')) }}
                  </div>
                </div>
                <div class="form-group">
                  {{ Form::label('category_name', 'Sub Category Name *',array('class'=>'col-sm-3 control-label')) }}
                  <div class="col-sm-6">
                    {{ Form::text('category_name',old('category_name'),array('placeholder' => 'Category Name','class'=>'form-control','required'=>'required')) }}
                  </div>
                </div>
                <div class="form-group">
                  {{ Form::label('active', 'Status',array('class'=>'col-sm-3 control-label')) }}
                  <div class="col-sm-6">
                    {{ Form::radio('active', 1, true,array('class'=>'')) }} Active
                    {{ Form::radio('active', 0, false,array('class'=>'')) }} Inactive
                  </div>
                </div>
              <!-- /.box-body -->
              <div class="box-footer col-md-12">
                {{Form::submit('Add New',array('class'=>'btn btn-info col-md-offset-3'))}}
                <a href="{{route('getAdminListSubCategories')}}" class="btn btn-default col-md-offset-1">Cancel</a>
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

@push('footer')
  <script src="{{asset('/public/backend/plugins/select2/select2.full.min.js')}}"></script>
  <script type="text/javascript">
    $(function () {
      $(".select2").select2();
    });
  </script>
@endpush