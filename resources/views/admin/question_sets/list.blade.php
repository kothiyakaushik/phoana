@extends('layouts.backend')

@section('title','Question Set')

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
      Question Set
    </h1>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header with-border">
            <div class="pull-right">
              <a href="{{route('getAdminAddnewQuestionSet',Request::all())}}" class="btn btn-primary pull-right">Add New</a>
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
          
              {{Form::open(array('url' => route('postAdminListQuestionSet'), 'method' => 'post','class'=>'row'))}}  
                <div class="form-row">
                  <div class="form-group col-md-3">
                    <div class="input-group">
                      <!-- 'deleted' => 'Delete', -->
                      {{Form::select('bulkaction', array('active' => 'Active','inactive' => 'Inactive'),null, ['placeholder' => '--Select Action--','class'=>'form-control','id'=>'bulkaction'])}}
                      <span class="input-group-btn">
                        <button type="submit" name="submit" id="bulkSubmit" value="Apply" class="btn btn-default">Apply</button>
                      </span>
                    </div>
                  </div>
                </div>

                <div class="col-md-12">
                  Show <select id="recordsPerPage" data-target="question-set-listing">
                    @foreach($recordsPerPage as $perPage)
                      @if($perPage==0)
                        <option value="0">All</option>
                      @else
                        <option value="{{$perPage}}" {{(session()->get("question-set-listing") == $perPage) ? 'selected' : ''}}>{{$perPage}}</option>
                      @endif
                    @endforeach
                  </select> entries

                  @if($isRequestSearch)
                    <a href="{{route('getAdminListQuestionSet')}}" class="pull-right btn btn-danger btn-sm">Reset Search </a>
                  @endif

                  <br/><br/>
                  <table class="table table-bordered table-striped table-hover">
                    <thead>
                      <tr>
                        <th class="text-center">{{Form::checkbox('colcheckbox', '',null, ['class'=>'selectall'])}}</th>
                        <th>Question Set Name <a href="{{route('getAdminListQuestionSet', $sort_columns['question_set_name']['params'])}}"><i class="fa fa-angle-{{$sort_columns['question_set_name']['angle']}}"></i></a></th>
                        <th>Active/Inactive <a href="{{route('getAdminListQuestionSet', $sort_columns['active']['params'])}}"><i class="fa fa-angle-{{$sort_columns['active']['angle']}}"></i></a></th>
                        <th>Action</th>
                      </tr>
                    </thead>

                    <tbody>

                    @if(count($allQuestionSet)!=0)
                      @foreach($allQuestionSet as $questionSet)
                        <tr>
                          <td class="text-center">{{Form::checkbox('selectedIds[]', $questionSet->id,null, ['class'=>'userRow','id'=>'selectedIds'])}}</td>
                          <td>
                            <a  href="{{route('getAdminEditQuestionSet',array_merge( ['QuestionSet'=> $questionSet->id ], Request::all()) )}}">{{$questionSet->question_set_name}}</a>
                          </td>
                          <td>
                            @if($questionSet->active == 1)
                              <button type="button" class="btn btn-secondary bg-green btn-xs btn-status"
                                  data-toggle="tooltip" data-placement="top" title="Click to Inactivate"
                                    data-status="1" data-row_id="{{$questionSet->id}}" data-table_name="question_sets">
                              Active
                            </button>
                            @else
                              <button type="button" class="btn btn-secondary bg-red btn-xs btn-status" 
                                      data-toggle="tooltip" data-placement="top" title="Click to Activate"
                                        data-status="0" data-row_id="{{$questionSet->id}}" data-table_name="question_sets">
                                Inactive
                              </button>
                            @endif
                          </td>
                          <td>
                            <a href="{{route('getAdminEditQuestionSet',array_merge( ['QuestionSet'=> $questionSet->id ], Request::all()) )}}" class="btn-success btn-sm">Edit</a>
                            <a onclick="return confirmDelete(event);" href="{{route('getAdminDeleteQuestionSet',array_merge( ['QuestionSet'=> $questionSet->id], Request::all()) )}}" class="btn-danger btn-sm">Delete</a>
                          </td>
                        </tr>
                      @endforeach
                    @else
                      <tr>
                        <td colspan="4" class="text-center">No record(s) found.</td>
                      </tr>
                    @endif

                    @if(count($allQuestionSet) > 0)
                    <tfoot>
                      <tr>
                        <td colspan=4 class="text-center">

                          {{$allQuestionSet->appends(['search'=>Request::get('search'),'sortBy'=>Request::get('sortBy'),'sortOrder'=>Request::get('sortOrder')])->render()}}
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