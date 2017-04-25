@extends('layouts.backend')

@section('title','Services')

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
        Customer Inquires
        <small>13 new messages</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Inquires</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- /.col -->
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">Inbox</h3>
              <!-- <div class="box-tools pull-right">
                <div class="has-feedback">
                </div>
              </div> -->
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">

              @if(Session::has('message') || $errors->any())
                  <!-- Display Session Message  -->
                    @include('admin.myerrorSection')
              @endif

              <div class="mailbox-controls">
                <div class="input-group col-md-3 pull-right">
                  <!-- 'deleted' => 'Delete', -->
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
                </div>

                {{Form::open(array('url' => route('postAdminListInquires'), 'method' => 'post','class'=>''))}}  

                <div class="input-group col-md-3">
                  {{Form::select('bulkaction', array('deleted' => 'Delete'),null, ['placeholder' => '--Select Action--','class'=>'form-control','id'=>'bulkaction'])}}
                  <span class="input-group-btn">
                    <button type="submit" name="submit" id="bulkSubmit" value="Apply" class="btn btn-default">Apply</button>
                  </span>
                </div>
              </div>

              <div class="clearfix"></div>
              <div class="mailbox-controls">
                <!-- Check all button -->
                <div class="btn-group">
                  Show <select id="recordsPerPage" data-target="inquiries-listing">
                    @foreach($recordsPerPage as $perPage)
                      @if($perPage==0)
                        <option value="0">All</option>
                      @else
                        <option value="{{$perPage}}" {{(session()->get("inquiries-listing") == $perPage) ? 'selected' : ''}}>{{$perPage}}</option>
                      @endif
                    @endforeach
                  </select> entries
                </div>
                <div class="pull-right">
                  @if($isRequestSearch)
                    <a href="{{route('getAdminListInquires')}}" class="pull-right btn btn-danger btn-xs">Reset Search </a>
                  @endif
                </div>
                <!-- /.pull-right -->
              </div>

              <div class="table-responsive mailbox-messages">
                <table class="table table-bordered table-hover table-striped">
                  <thead>
                      <tr>
                        <th class="text-center">{{Form::checkbox('colcheckbox', '',null, ['class'=>'selectall'])}}</th>
                        <th>Name <a href="{{route('getAdminListInquires', $sort_columns['name']['params'])}}"><i class="fa fa-angle-{{$sort_columns['name']['angle']}}"></i></a></th>
                        <th>Subject</th>
                        <th>Date</th>
                      </tr>
                    </thead>
                  <tbody>
                    @if(count($allInquires)!=0)
                      @foreach($allInquires as $inquiry)
                        <tr>
                          <td class="text-center">{{Form::checkbox('selectedIds[]', $inquiry->id,null, ['class'=>'userRow','id'=>'selectedIds'])}}</td>
                          <td class="mailbox-name"><a href="read-mail.html">{{$inquiry->name}}</a></td>
                          <td class="mailbox-subject"><b>{{$inquiry->subject}}</b> -  Trying to find a solution to this problem...</td>
                          <!-- <td class="mailbox-attachment"></td> -->
                          <td class="mailbox-date">{{$inquiry->created_at}}</td>
                        </tr>
                      @endforeach
                    @else
                      <tr>
                        <td colspan="4" class="text-center">No record(s) found.</td>
                      </tr>
                    @endif
                    @if(count($allInquires) > 0)
                      <tfoot>
                        <tr>
                          <td colspan="4" class="text-center">
                            {{$allInquires->appends(['search'=>Request::get('search'),'sortBy'=>Request::get('sortBy'),'sortOrder'=>Request::get('sortOrder')])->render()}}
                          </td>
                        </tr>
                      </tfoot>
                    @endif
                  </tbody>
                </table>
                <!-- /.table -->
              </div>

              {{Form::close()}}
              <!-- /.mail-box-messages -->
            </div>
            <!-- /.box-body -->
            
          </div>
          <!-- /. box -->
        </div>
        <!-- /.col -->
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