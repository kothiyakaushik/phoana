@extends('layouts.backend')
@section('title','Dashboard')
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
      Users Listing
    </h1>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <!-- /.box-header -->
          <div class="row">
            <div class="col-md-12"> <!-- Display Session Message  -->
              @if(session('success_message'))
                  <div class="alert alert-success">
                      {{session('success_message')}}
                  </div>
              @endif
              @if(session('error_message'))
                  <div class="alert alert-danger">
                      {{session('error_message')}}
                  </div>
              @endif
            </div>
          </div>
          <div class="box-body">
            <div class="form-group">
              {{Form::open(array('method' => 'get','class'=>'row','id'=>"myform",'name'=>"myform"))}} 
                
                <div class="form-group col-md-3">
                  <div class="input-group">
                    {{Form::select('view_user', array('all'=>'All Users', '1' => 'Customer','2' => 'Service Provider'),$userType, ['placeholder' => 'Select User', 'class'=>'form-control', 'id'=>'view_user'])}}
                    <span class="input-group-btn">
                      <button type="submit" name="submit" value="Apply" class="btn btn-default">Apply</button>
                    </span>
                  </div>
                </div>

                <div class="form-group col-md-3 pull-right">
                  <div class="input-group">
                    <input type="text" class="form-control" name="search" id="search" value="{{Request::get('search')}}" />
                    <span class="input-group-btn">
                      <button type="submit" class="btn btn-default">Search</button>
                    </span>
                  </div>
                </div>
              {{Form::close()}}    
          
              {{Form::open(array('url' => route('postAdminUserListing'), 'method' => 'post','class'=>'row'))}}
                <div class="col-md-12">
                  Show <select id="recordsPerPage" data-target="user-listing">
                    @foreach($recordsPerPage as $perPage)
                      @if($perPage==0)
                        <option value="0">All</option>
                      @else
                        <option value="{{$perPage}}" {{(session()->get("user-listing") == $perPage) ? 'selected' : ''}}>{{$perPage}}</option>
                      @endif
                    @endforeach
                  </select> entries

                  @if($isRequestSearch)
                    <a href="{{route('getAdminUserListing')}}" class="pull-right btn btn-danger btn-sm">Reset Search </a>
                  @endif
                  <br/><br/>
                  <table class="table table-bordered table-striped table-hover">
                    <thead>
                      <tr>
                        <th class="text-center">{{Form::checkbox('users', '',null, ['class'=>'selectall'])}}</th>
                        <th>User Type <a href="{{route('getAdminUserListing', $sort_columns['user_type']['params'])}}"><i class="fa fa-angle-{{$sort_columns['user_type']['angle']}}"></i></a></th>
                        <th>Full Name <a href="{{route('getAdminUserListing', $sort_columns['firstname']['params'])}}"><i class="fa fa-angle-{{$sort_columns['firstname']['angle']}}"></i></a></th>
                        <th>Email Address <a href="{{route('getAdminUserListing', $sort_columns['email']['params'])}}"><i class="fa fa-angle-{{$sort_columns['email']['angle'] }}"></i></a></th>
                        <th>Country <a href="{{route('getAdminUserListing', $sort_columns['country']['params'] )}}"> <i class="fa fa-angle-{{$sort_columns['country']['angle']}}"></i></a></th>
                        <th>Phone <a href="{{route('getAdminUserListing', $sort_columns['phone']['params'])}}"><i class="fa fa-angle-{{$sort_columns['phone']['angle']}}"></i></a></th>
                        <th>Zipcode <a href="{{route('getAdminUserListing', $sort_columns['zipcode']['params'])}}"><i class="fa fa-angle-{{$sort_columns['zipcode']['angle']}}"></i></a></th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    @if(count($allUsers)!=0)
                      @foreach($allUsers as $user)
                        <tr>
                          <td class="text-center">{{Form::checkbox('userchkbx[]', $user->id,null, ['class'=>'userRow','id'=>'userchkbx'])}}</td>
                          <td>
                            @if($user->user_type == "1")
                              Customer
                            @else
                              Service Provider
                            @endif
                          </td>
                          <td>
                            <!-- <a  href="{{route('getAdminEditUser',array_merge( ['User'=> $user->id ], Request::all()) )}}"></a> -->
                            {{$user->firstname}}
                          </td>
                          <td>{{$user->email}}</td>
                          <td>{{$user->country}}</td>
                          <td>{{$user->phone}}</td>
                          <td>{{$user->zipcode}}</td>
                          <td class="userdetail"><div id="<?php echo $user->id; ?>"><center><i class="fa fa-eye fa-2x" aria-hidden="true"></i></center></div></td>
                        </tr>
                      @endforeach
                    @else
                      <tr>
                        <td colspan="8" class="text-center">No record(s) found.</td>
                      </tr>
                    @endif

                    @if(count($allUsers) > 0)
                    <tfoot>
                      <tr>
                        <td colspan=6 class="text-center">
                          {{$allUsers->appends(['search'=>Request::get('search'),'sortBy'=>Request::get('sortBy'),'sortOrder'=>Request::get('sortOrder'),'view_user'=>Request::get('view_user')])->render()}}
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


<!-- user details popus -->
<div id="userdetail_model" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">User Details</h4>
      </div>
      <div id="modal_body" class="modal-body">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- user details popus -->
@endsection

@push('footer')
  <script src="{{asset('/public/backend/plugins/datatables/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('/public/backend/plugins/datatables/dataTables.bootstrap.min.js')}}"></script>
  <script>
    var selectedIdsArr = [];

    $('.selectall').click(function(event) {
       var id=$(this).data('class');
        if(this.checked)
        { 
          $(".userRow").prop('checked', true);
          $(':checkbox:checked').each(function(i){
            var currentId = $(this).val();
            if($.inArray(currentId, selectedIdsArr) == -1)
              selectedIdsArr.push(currentId);
          });
        }
        else
        {
          $(".userRow").prop('checked', false);      
          $(':checkbox:checked').each(function(i){
            var currentId = $(this).val();
            selectedIdsArr.splice(selectedIdsArr.indexOf(currentId),1);
          });
        }
    });

    $(".userRow").on('click',function(){
        var clickedId = $(this).val();
        //var oldIdsArr = [];
        if($(this).is(':checked'))
        {
            if($.inArray(clickedId, selectedIdsArr) == -1)
              selectedIdsArr.push(clickedId);
        }else{
            selectedIdsArr.splice(selectedIdsArr.indexOf(clickedId),1);
        }
    });

    $(document).on('click', '.btn-ntification', function() {
        $(".ajax-notification-status").hide();
        var sendTo = $("#send_to").val();
        if(sendTo == "all"){
          selectedIdsArr = [];
          selectedIdsArr.push("all");
        }else if(sendTo == ""){
          alert('Please select notification type!');
          return;
        }
        //UserId = UserId.slice(0,-1); 
        if(selectedIdsArr.length != 0){
          $('#myModal1').modal('show'); 
        }else{
          alert('Please select a User')
        }
    });

    $(document).on('click', '#btn-content', function() {
      var content = $('#content').val();
      var UserId = selectedIdsArr;
      $(".ajax-notification-status").hide();
      $(".ajax-notification-status").removeClass("alert-success");
      $(".ajax-notification-status").removeClass("alert-danger");

      if(content!=''){
          var fd = new FormData();
          fd.append("content", content);
          fd.append("UserId", UserId);
          fd.append("_token", "{{csrf_token()}}");
          $('#btn-content').hide();
          $('#spinner').show();
          $.ajax({
              processData: false,
              contentType: false,
              type:'post',
              url:  "{{route('userSendPushNotification')}}",
              data: fd,
              success: function(data){
                  $('#btn-content').show();
                  $('#spinner').hide();
                  $(".ajax-notification-status").show();
                  $('#content').val('');
                  if(data[0]) {
                      $(".ajax-notification-status").addClass("alert-success");
                      $(".ajax-notification-status").html("Notification send successfully...");
                      $("#content").html("");
                  } else {
                      $(".ajax-notification-status").addClass("alert-danger");
                      $(".ajax-notification-status").html('There was an error while send your message, try again');
                  }
              }
          });
      }else{
          $(".ajax-notification-status").show();
          $(".ajax-notification-status").addClass("alert-danger");
          if(content==''){
            $(".ajax-notification-status").html('Please enter content..');
          }
      }
    });

    $(document).ready(function()
    { 
      $('.userdetail').on('click',function(event)
      {
        var userid = $(this).children('div').attr('id');
        $.ajax({
            url: "{{route('userProfileDetails')}}",
            data:{
              'userid':userid,
              '_token' : "{{csrf_token()}}"
            },
            method: "POST",
            success:function(data){
                
                $("#userdetail_model #modal_body").html(data);
                $("#userdetail_model").modal();

            }
        });
      });
    });
  </script>
@endpush