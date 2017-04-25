@extends('layouts.backend')

@section('title','Edit Sub Service')

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
        Sub Service
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#"><i class="fa fa-bars"></i> Sub Service</a></li>
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
              <h3 class="box-title">Edit Sub Service</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            {{Form::open(array('url'=>route('postAdminEditSubService',array_merge(['SubService' => $SubService->id ], Request::all())),'method' => 'post','role'=>'form','class'=>'form-horizontal','files'=>true))}}
              <div class="box-body">
                <!-- Error Part-->
                <div class="box-body">
                  @include('admin.myerrorSection')
                </div>
                <div class="form-group">
                  {{ Form::label('service_id', 'Select Main Service *',array('class'=>'col-sm-3 control-label')) }}
                  <div class="col-sm-6">

                    {{ Form::select('service_id', $mainServices, $SubService->service_id, array('class' => 'form-control select2', 'required'=>'required', 'placeholder' => 'Select Service')) }}
                  </div>
                </div>
                <div class="form-group">
                  {{ Form::label('category_name', 'Service Title *',array('class'=>'col-sm-3 control-label')) }}
                  <div class="col-sm-6">
                    {{ Form::text('sub_service_title',$SubService->sub_service_title,array('placeholder' => 'Service title','class'=>'form-control','required'=>'required')) }}
                  </div>
                </div>
                <div class="form-group">
                  {{ Form::label('active', 'Status',array('class'=>'col-sm-3 control-label')) }}
                  <div class="col-sm-6">
                    {{ Form::radio('active', 1, ($SubService->active == 1) ? true : false,array('class'=>'')) }} Active
                    {{ Form::radio('active', 0, ($SubService->active == 0) ? true : false,array('class'=>'')) }} Inactive
                  </div>
                </div>
              <!-- /.box-body -->
              <div class="box-footer col-md-12">
                {{Form::submit('Update',array('class'=>'btn btn-info col-md-offset-3'))}}
                <a href="{{route('getAdminListSubServices')}}" class="btn btn-default col-md-offset-1">Cancel</a>
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
      
      $("select[name='service_id']").select2({
        ajax: {
          url: "{{route('api-public-services')}}",
            dataType: 'json',
            //delay: 250,
            data: function (params) {
                return {
                q: params.term,
                limit : 20
              };
            },
            processResults: function (data, params) {
              return {
                      results: $.map(data.data, function (item) {
                          return {
                              text: item.service_title,
                              id: item.id
                          }
                      })
                  };
            },
            cache: true
        }
    });
  </script>
@endpush