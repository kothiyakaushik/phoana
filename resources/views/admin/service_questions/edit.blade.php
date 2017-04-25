@extends('layouts.backend')

@section('title','Edit Service Question')

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
        Service Question
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#"><i class="fa fa-bars"></i> Service Question</a></li>
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
              <h3 class="box-title">Edit Question</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            {{Form::open(array('url'=>route('postAdminEditServiceQuestion',array_merge(['ServiceQuestion' => $ServiceQuestion->id ], Request::all())),'method' => 'post','role'=>'form','class'=>'form-horizontal'))}}
              <div class="box-body">
                <!-- Error Part-->
                <div class="box-body">
                  @include('admin.myerrorSection')
                </div>

                <div class="form-group">
                  {{ Form::label('service_id', 'Select Service *',array('class'=>'col-sm-3 control-label')) }}
                  <div class="col-sm-6">
                    {{ Form::select('service_id', $allServices, $ServiceQuestion->service_id, array('class' => 'form-control select2', 'required'=>'required','placeholder' => '--Search services--')) }}
                  </div>
                </div>
                <div class="form-group">
                  {{ Form::label('question_set_id', 'Question Set Name *',array('class'=>'col-sm-3 control-label')) }}
                  <div class="col-sm-6">
                    {{ Form::select('question_set_id', $questionSetLists, $ServiceQuestion->question_set_id, array('class' => 'form-control select2', 'required'=>'required','placeholder' => '--Search Question Set Name--')) }}
                  </div>
                </div>
                <div class="form-group">
                  {{ Form::label('type', 'Select Type *',array('class'=>'col-sm-3 control-label')) }}
                  <div class="col-sm-6">
                    {{ Form::select('type', $questionType, $ServiceQuestion->type, array('class' => 'form-control', 'required'=>'required', 'placeholder' => 'Select Type')) }}
                  </div>
                </div>
                <div class="form-group">
                  {{ Form::label('question', 'Question *',array('class'=>'col-sm-3 control-label')) }}
                  <div class="col-sm-6">
                    {{ Form::text('question',$ServiceQuestion->question,array('placeholder' => 'Question','class'=>'form-control','required'=>'required')) }}
                  </div>
                </div>
                <div class="form-group">
                  {{ Form::label('allow_multiple', 'Allow Multiple',array('class'=>'col-sm-3 control-label')) }}
                  <div class="col-sm-6">
                    {{ Form::radio('allow_multiple', 1, ($ServiceQuestion->allow_multiple == 1) ? true : false,array('class'=>'')) }} True
                    {{ Form::radio('allow_multiple', 0, ($ServiceQuestion->allow_multiple == 0) ? true : false,array('class'=>'')) }} False
                  </div>
                </div>
                <div class="form-group">
                  {{ Form::label('active', 'Status',array('class'=>'col-sm-3 control-label')) }}
                  <div class="col-sm-6">
                    {{ Form::radio('active', 1, ($ServiceQuestion->active == 1) ? true : false,array('class'=>'')) }} Active
                    {{ Form::radio('active', 0, ($ServiceQuestion->active == 0) ? true : false,array('class'=>'')) }} Inactive
                  </div>
                </div>

                <div class="box-header with-border">
                  <h3 class="box-title">Add/Edit Question's option here</h3>
                </div><br>
                <div class="question_option_box">
                  @foreach($questionOptons as $key => $question)
                    <div class="form-group">
                      {{ Form::label('question_options', 'Option-'.($key+1).' *',array('class'=>'col-sm-3 control-label')) }}
                      <div class="inner_option_box">
                        <div class="col-sm-6">
                          {{Form::hidden('question_options['.$key.'][id]',$question->id)}}
                          {{ Form::text('question_options['.$key.'][option]',$question->question_option,array('placeholder' => 'Option name','class'=>'form-control','required'=>'required')) }}
                        </div>
                        @if($key != 0)
                        <div class="col-sm-1">
                          {{Form::button("Remove",array("data-option-id"=>$question->id,"class"=>"btn btn-danger ajax_remove"))}}
                        </div>
                        @endif
                      </div>
                    </div>
                  @endforeach
                  <div class="form-group add_more_button">
                    <div class="col-md-1 col-lg-offset-8">
                        {{Form::button('Add More',array('class'=>'btn btn-warning','name'=>'add_more_options','id'=>'add_more_options'))}}
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  {{ Form::label('add_custom_option', 'Add Custom option',array('class'=>'col-sm-3 control-label')) }}
                  <div class="col-sm-6">
                    {{ Form::radio('add_custom_option', 'Yes',($ServiceQuestion->custom_option_text !="") ? true : false,array('class'=>'custom_option')) }} Yes
                    {{ Form::radio('add_custom_option', 'No', ($ServiceQuestion->custom_option_text =="") ? true : false,array('class'=>'custom_option')) }} No
                  </div>
                </div>
                <div class="form-group custom_option_text" style="display: {{($ServiceQuestion->custom_option_text !="") ? 'block' : 'none'}}">
                {{ Form::label('custom_option_text', 'Placeholder Text *',array('class'=>'col-sm-3 control-label')) }}
                  <div class="col-sm-6">
                    {{ Form::text('custom_option_text', $ServiceQuestion->custom_option_text, array('placeholder' => 'Enter placeholder text here','class'=>'form-control')) }}
                  </div>
                </div>
              <!-- /.box-body -->
              <div class="box-footer col-md-12">
                {{Form::submit('Update',array('class'=>'btn btn-info col-md-offset-3'))}}
                <a href="{{route('getAdminListServiceQuestions')}}" class="btn btn-default col-md-offset-1">Cancel</a>
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

    $("select[name='question_set_id']").select2({
      ajax: {
        url: "{{route('api-public-search-question-set')}}",
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
                            text: item.question_set_name,
                            id: item.id
                        }
                    })
                };
          },
          cache: true
      }
    });
    
    $("#add_more_options").on("click", function(){
        var tot_options = $(".question_option_box > div.form-group").length;
        if(tot_options < 21)
        {
          var html = '<div class="form-group"><label for="question_options" class="col-sm-3 control-label">Option-'+tot_options+' *</label><div class="inner_option_box"><div class="col-sm-6">{{ Form::text("question_options[][option]",old("question_options"),array("placeholder" => "Option name","class"=>"form-control","required"=>"required")) }}</div><div class="col-sm-1">{{Form::button("Remove",array("class"=>"btn btn-danger remove"))}}</div></div></div>';
          $(".question_option_box .form-group:last").before(html);
        }else{
          alert('Can not add more than 20 options');
        }
    });

    $('.question_option_box').on('click','.remove',function() {
        $(this).parent().parent().parent().remove();
    });
   
    $('.question_option_box').on('click','.ajax_remove',function() {
        var optionId = $(this).data("option-id");
        var Mythis = $(this);
        $.ajax({
            url: "{{route('getAdminDeleteQuestionOption')}}",
            data:{ 'optionId' : optionId },
            success:function(data){
              if(data == 1)
              {
                  Mythis.parent().parent().parent().remove();
              }
            }
        });
    });

    $(".custom_option").trigger('change');
    $("input[name='add_custom_option']").change(function ()
    {
        var selectedVal = $(this).val();
        if(selectedVal == 'Yes')
        {
            $(".custom_option_text").show();
            $('#custom_option_text').prop('required','required');
        }else{
            $(".custom_option_text").hide();
            $('#custom_option_text').removeAttr('required');
            $('#custom_option_text').val('');
        }
    });

    $("#custom_option_text").on('blur',function(){
        var currentVal = $(this).val();
        if(!currentVal)
        {
            $(this).prop('required','required');
        }
    });

  </script>
@endpush