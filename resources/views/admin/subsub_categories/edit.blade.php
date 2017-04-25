@extends('layouts.backend')

@section('title','Edit Sub category')

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
        Sub Category (Level-2)
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#"><i class="fa fa-bars"></i> Sub-Category (Level-3)</a></li>
        <li class="active">Edit</li>
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
              <h3 class="box-title">Edit sub category</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            {{Form::open(array('url'=>route('postAdminEditSubsubCategory',array_merge(['Category' => $Category->id ], Request::all())),'method' => 'post','role'=>'form','class'=>'form-horizontal'))}}
              <div class="box-body">
                <!-- Error Part-->
                <div class="box-body">
                  @include('admin.myerrorSection')
                </div>
                <div class="form-group">
                  {{ Form::label('parent_id', 'Select Category *',array('class'=>'col-sm-3 control-label')) }}
                  <div class="col-sm-6">
                    {{ Form::select('parent_id', $mainCategory, $Category->getParentCategoryId($Category->parent_id), array('class' => 'form-control category_box select2', 'data-ref-id'=>'sub_parent_id','required'=>'required', 'placeholder' => 'Select Category')) }}
                  </div>
                </div>
                <div class="form-group" id="div_subcategory_box">
                  {{ Form::label('sub_parent_id', 'Select Sub Category *',array('class'=>'col-sm-3 control-label')) }}
                  <div class="col-sm-6">
                    {{ Form::select('sub_parent_id', $subCategory, $Category->parent_id, array('class' => 'form-control sub_category_box select2', 'required'=>'required', 'placeholder' => 'Select Sub Category')) }}
                  </div>
                </div>
                <div class="form-group">
                  {{ Form::label('category_name', 'Category Name *',array('class'=>'col-sm-3 control-label')) }}
                  <div class="col-sm-6">
                    {{ Form::text('category_name',$Category->category_name,array('placeholder' => 'Category Name','class'=>'form-control','required'=>'required')) }}
                  </div>
                </div>
                <div class="form-group">
                  {{ Form::label('active', 'Status',array('class'=>'col-sm-3 control-label')) }}
                  <div class="col-sm-6">
                    {{ Form::radio('active', 1, ($Category->active == 1) ? true : false,array('class'=>'')) }} Active
                    {{ Form::radio('active', 0, ($Category->active == 0) ? true : false,array('class'=>'')) }} Inactive
                  </div>
                </div>
              <!-- /.box-body -->
              <div class="box-footer col-md-12">
                {{Form::submit('Update',array('class'=>'btn btn-info col-md-offset-3'))}}
                <a href="{{route('getAdminListSubsubCategories')}}" class="btn btn-default col-md-offset-1">Cancel</a>
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
      $(".select2").select2();
  </script>
@endpush