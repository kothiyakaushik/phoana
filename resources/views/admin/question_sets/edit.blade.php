@extends('layouts.backend')

@section('title','Edit Question Set')

@section('body-class','hold-transition skin-blue sidebar-mini')

@section('content')
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Question Set
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#"><i class="fa fa-bars"></i> Qeustion Set</a></li>
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
              <h3 class="box-title">Edit question set</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            {{Form::open(array('url'=>route('postAdminEditQuestionSet',array_merge(['QuestionSet' => $QuestionSet->id ], Request::all())),'method' => 'post','role'=>'form','class'=>'form-horizontal'))}}
              <div class="box-body">
                <!-- Error Part-->
                <div class="box-body">
                  @include('admin.myerrorSection')
                </div>
                <div class="form-group">
                  {{ Form::label('question_set_name', 'Question Set Name',array('class'=>'col-sm-3 control-label')) }}
                  <div class="col-sm-6">
                    {{ Form::text('question_set_name',$QuestionSet->question_set_name,array('placeholder' => 'Add Question Set Name','class'=>'form-control','required'=>'required','autofocus')) }}
                  </div>
                </div>
                <div class="form-group">
                  {{ Form::label('active', 'Status',array('class'=>'col-sm-3 control-label')) }}
                  <div class="col-sm-6">
                    {{ Form::radio('active', 1, ($QuestionSet->active == "1") ? true : false,array('class'=>'')) }} Active
                    {{ Form::radio('active', 0, ($QuestionSet->active == "0") ? true : false,array('class'=>'')) }} Inactive
                  </div>
                </div>
              <!-- /.box-body -->
                  <div class="box-footer col-md-12">
                    {{Form::submit('Update',array('class'=>'btn btn-info col-md-offset-3'))}}
                    <a href="{{route('getAdminListQuestionSet')}}" class="btn btn-default col-md-offset-1">Cancel</a>
                  </div>
                  <!-- /.box-footer -->
              </div>
            {{Form::close()}}
          <!-- /.box -->
        </div>
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
@endsection