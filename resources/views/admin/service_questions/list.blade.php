@extends('layouts.backend')

@section('title','Service Questions')

@section('body-class','hold-transition skin-blue sidebar-mini')

@push('header')
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('/public/backend/plugins/datatables/dataTables.bootstrap.css')}}">
@endpush

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Service Questions
      @if(Request::has('service_title'))
          <small> <h4> > Service - {{Request::get('service_title')}}</h4></small>
      @endif
    </h1>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header with-border">
              @if(Request::has('service_id'))
                <a href="{{route('getAdminListServices',Request::except('service_id','service_title'))}}" class="col-md-2 btn btn-warning pull-left"> << Back to all Services</a>
              @endif
              <div class="pull-right">
                <a href="{{route('getAdminAddnewServiceQuestion',Request::all())}}" class="btn btn-primary pull-right">Add New</a>
              </div>
            </div>
          <div class="box-body">
            @if(Session::has('message') || $errors->any())
                <!-- Display Session Message  -->
                  @include('admin.myerrorSection')
            @endif
            <div class="form-group">
              {{Form::open(array('method' => 'get','class'=>'','id'=>"myform",'name'=>"myform"))}}  
            
                <div class="form-group pull-right">
                  <div class="input-group">
                    <input type="text" class="form-control" name="search" id="search" value="{{Request::get('search')}}" />
                    <span class="input-group-btn">
                      <button type="submit" class="btn btn-default">Search</button>
                    </span>
                  </div>
                </div>
              {{Form::close()}}    
          
              {{Form::open(array('url' => route('postAdminListServiceQuestions'), 'method' => 'post','class'=>'row'))}}  
                <div class="form-row">
                  <div class="form-group col-md-3">
                    <div class="input-group">
                      
                      {{Form::select('bulkaction', array('deleted' => 'Delete'),null, ['placeholder' => '--Select Action--','class'=>'form-control','id'=>'bulkaction'])}}
                      <span class="input-group-btn">
                        <button type="submit" name="submit" id="bulkSubmit" value="Apply" class="btn btn-default">Apply</button>
                      </span>
                    </div>
                  </div>
                </div>

                <div class="col-md-12">
                  Show <select id="recordsPerPage" data-target="question-option-listing">
                    @foreach($recordsPerPage as $perPage)
                      @if($perPage==0)
                        <option value="0">All</option>
                      @else
                        <option value="{{$perPage}}" {{(session()->get("question-option-listing") == $perPage) ? 'selected' : ''}}>{{$perPage}}</option>
                      @endif
                    @endforeach
                  </select> entries

                  @if($isRequestSearch)
                    <a href="{{route('getAdminListServiceQuestions')}}" class="pull-right btn btn-danger btn-sm">Reset Search </a>
                  @endif

                  <br/><br/>
                  <table class="table table-bordered table-striped table-hover">
                    <thead>
                      <tr>
                        <th class="text-center">{{Form::checkbox('colcheckbox', '',null, ['class'=>'selectall'])}}</th>
                        <th>Service Name</th>
                        <th>Question Set Name <a href="{{route('getAdminListServiceQuestions', $sort_columns['question_set_id']['params'])}}"><i class="fa fa-angle-{{$sort_columns['question_set_id']['angle']}}"></i></a></th>
                        <th>Type<a href="{{route('getAdminListServiceQuestions', $sort_columns['type']['params'])}}"><i class="fa fa-angle-{{$sort_columns['type']['angle']}}"></i></a></th>
                        <th>Allow Multiple<a href="{{route('getAdminListServiceQuestions', $sort_columns['allow_multiple']['params'])}}"><i class="fa fa-angle-{{$sort_columns['allow_multiple']['angle']}}"></i></a></th>
                        <th>Question</th>
                        <th>Active/Inactive <a href="{{route('getAdminListServiceQuestions', $sort_columns['active']['params'])}}"><i class="fa fa-angle-{{$sort_columns['active']['angle']}}"></i></a></th>
                        <th>Action</th>
                      </tr>
                    </thead>

                    <tbody>

                    @if(count($serviceQuestions)!=0)
                      @foreach($serviceQuestions as $serviceQuestion)
                        <tr>
                          <td class="text-center">{{Form::checkbox('selectedIds[]', $serviceQuestion->id,null, ['class'=>'userRow','id'=>'selectedIds'])}}</td>
                          <td>{{$serviceQuestion->service->service_title}}</td>
                          <td>
                            <a  href="{{route('getAdminEditServiceQuestion',array_merge( ['Service'=> $serviceQuestion->id ], Request::all()) )}}">
                              {{$serviceQuestion->questionSet->question_set_name}}
                            </a>
                          </td>
                          <td>{{$questionType[$serviceQuestion->type]}}</td>
                          <td>
                            @if($serviceQuestion->allow_multiple == "1")
                              True
                            @else
                              False
                            @endif
                          </td>
                          <td>{{$serviceQuestion->question}}</td>
                          <td>
                            @if($serviceQuestion->active == 1)
                              <button type="button" class="btn btn-secondary bg-green btn-xs btn-status"
                                  data-toggle="tooltip" data-placement="top" title="Click to Inactivate"
                                    data-status="1" data-row_id="{{$serviceQuestion->id}}" data-table_name="service_questions">
                              Active
                            </button>
                            @else
                              <button type="button" class="btn btn-secondary bg-red btn-xs btn-status" 
                                      data-toggle="tooltip" data-placement="top" title="Click to Activate"
                                        data-status="0" data-row_id="{{$serviceQuestion->id}}" data-table_name="service_questions">
                                Inactive
                              </button>
                            @endif
                          </td>
                          <td>
                            <a href="{{route('getAdminEditServiceQuestion',array_merge( ['ServiceQuestion'=> $serviceQuestion->id ], Request::all()) )}}" class="btn-success btn-sm">Edit</a>
                            <a onclick="return confirmDelete(event);" href="{{route('getAdminDeleteServiceQuestion',array_merge( ['ServiceQuestion'=> $serviceQuestion->id], Request::all()) )}}" class=" btn-danger btn-sm">Delete</a>
                          </td>

                        </tr>
                      @endforeach
                    @else
                      <tr>
                        <td colspan="8" class="text-center">No record(s) found.</td>
                      </tr>
                    @endif

                    @if(count($serviceQuestions) > 0)
                    <tfoot>
                      <tr>
                        <td colspan=8 class="text-center">

                          {{$serviceQuestions->appends(['search'=>Request::get('search'),'sortBy'=>Request::get('sortBy'),'sortOrder'=>Request::get('sortOrder')])->render()}}
                        </td>
                      </tr>
                    </tfoot>
                      
                    @endif
                    </tbody>
                  </table>
                </div>
              {{Form::close()}}
            </div>
          <!-- /.box-body -->
          </div>
        <!-- /.box -->
        </div>
      <!-- /.col -->
      </div>
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
@endsection

@push('footer')
  <script src="{{asset('/public/backend/plugins/datatables/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('/public/backend/plugins/datatables/dataTables.bootstrap.min.js')}}"></script>
@endpush