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
                        <td colspan="6" class="text-center">No record(s) found.</td>
                      </tr>
                    @endif

                    @if(count($allUsers) > 0)
                    <tfoot>
                      <tr>
                        <td colspan=6 class="text-center">

                          {{$allUsers->appends(['search'=>Request::get('search'),'sortBy'=>Request::get('sortBy'),'sortOrder'=>Request::get('sortOrder')])->render()}}
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
        <div class="modal-body">
           
            <!-- <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Default Input</label>
              <div class="col-md-9 col-sm-9 col-xs-12">
                <input type="text" placeholder="Default Input" class="form-control">
              </div>
            </div> -->


            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  
                  <div class="x_content">
                    <div data-example-id="togglable-tabs" role="tabpanel" class="">
                      <ul role="tablist" class="nav nav-tabs bar_tabs" id="myTab">
                        <li class="active" role="presentation"><a aria-expanded="true" data-toggle="tab" role="tab" id="home-tab" href="#tab_content1">USER</a>
                        </li>
                        <li class="" role="presentation"><a aria-expanded="false" data-toggle="tab" id="profile-tab" role="tab" href="#tab_content2">COMPANY</a>
                        </li>
                        <li class="" role="presentation"><a aria-expanded="false" data-toggle="tab" id="profile-tab2" role="tab" href="#tab_content3">PAYMENT</a>
                        </li>
                      </ul>
                      <div class="tab-content" id="myTabContent">
                        <div aria-labelledby="home-tab" id="tab_content1" class="tab-pane fade active in" role="tabpanel">
                          <div class="row">
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                  <label for="firstname">First Name</label>
                                  
                                  <input type="text" placeholder="First name" id="firstname"  readonly="readonly" class="form-control valid">
                                </div>
                              </div>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                  <label for="lastname">Last Name</label>
                                  
                                  <input type="text" placeholder="Last name" id="lastname"  readonly="readonly" class="form-control">
                                </div>
                              </div>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                  <label for="email">Email</label>

                                  <input type="text" placeholder="Email" id="email" readonly="readonly" class="form-control">

                                </div>
                              </div>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                  <label for="phone">Mobile number</label>
                                  
                                  <input type="text" placeholder="Mobile number" id="mobileno" readonly="readonly" class="form-control">
                                </div>
                              </div>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                  <label for="fax">Phone number</label>
                                  <input type="text" placeholder="Phone number" id="fax" readonly="readonly" class="form-control">
                                </div>
                              </div>
                          </div>
                        </div>
                        <div aria-labelledby="profile-tab" id="tab_content2" class="tab-pane fade" role="tabpanel">
                          <div class="row">
                    
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                  <label for="">abn</label>
                                  <input type="text" id="abn_no" readonly="readonly" class="form-control">
                                </div>
                              </div>

                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                  <label for="">company name</label>
                                  <input type="text" id="company_name" readonly="readonly" class="form-control">
                                </div>
                              </div>
                    
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                  <label for="">contact person</label>
                                  <input type="text" id="contact_person" readonly="readonly" class="form-control">
                                </div>
                              </div>
                   
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                  <label for="">company slogan</label>
                                  <input type="text" id="company_slogan" readonly="readonly" class="form-control">
                                </div>
                              </div>
                    
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                  <label for="">Street Address</label>
                                  <input type="text" id="street_address" readonly="readonly" class="form-control">
                                </div>
                              </div>
                              
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                  <label for="">Country</label>
                                  <input type="text" id="country_id" readonly="readonly" class="form-control">
                                </div>
                              </div>

                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                  <label for="">Suburb</label>
                                  <input type="text" id="suburb" readonly="readonly" class="form-control">
                                </div>
                              </div>

                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                  <label for="">Post code</label>
                                  
                                  <input type="text" id="post_code" readonly="readonly" class="form-control">
                                </div>
                              </div>

                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                  <label for="">Company eMail id </label>
                                  <input type="text" id="company_email" readonly="readonly" class="form-control">
                                </div>
                              </div>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                  <label for="">Quote validity</label>
                                  <input type="text" id="quote_valid_day" readonly="readonly" class="form-control">
                                </div>
                              </div>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                  <label for="">Payment due days</label>
                                  <input type="text" id="invoice_valid_day" readonly="readonly" class="form-control">
                                </div>
                              </div>
                          </div>
                        </div>

                        <div aria-labelledby="profile-tab" id="tab_content3" class="tab-pane fade" role="tabpanel">
                          <div class="row">
                  
                            <div class="profile-deatl">
                                <h2><i aria-hidden="true" class="fa fa-circle"></i>Direct Deposit</h2>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <div class="form-group">
                                <label for="">Account Name</label>
                                <input type="text" placeholder="Account Name" id="dd_account_name" readonly="readonly" class="form-control">
                              </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <div class="form-group">
                                <label for="">BSB</label>
                                <input type="text" placeholder="BSB no" id="dd_bsb" readonly="readonly" class="form-control">
                              </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <div class="form-group">
                                <label for="">Account No</label>
                                <input type="text" placeholder="Account No" id="dd_account_no" readonly="readonly" class="form-control">
                              </div>
                            </div>

                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                  <label for="">Reference no</label>
                                  <input type="text" placeholder="Reference no" id="dd_reference_no" readonly="readonly" class="form-control">
                                </div>
                            </div>
                            <div class="profile-deatl">
                                  <h2><i aria-hidden="true" class="fa fa-circle"></i>Cheque</h2>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <div class="form-group">
                                <label for="">company name</label>
                                <input type="text" placeholder="company name" id="bc_company_name" readonly="readonly" class="form-control">
                              </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <div class="form-group">
                                <label for="">company address</label>
                                <input type="text" placeholder="company address" id="bc_company_address" readonly="readonly" class="form-control">
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                  </div>
                </div>
              </div>

            <div class="clear"></div>
          
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
    // $(function () {
    //   $('#example1').DataTable({
    //     "paging": true,
    //     "lengthChange": true,
    //     "searching": true,
    //     "ordering": true,
    //     "info": true,
    //     "autoWidth": true
    //   });
    // });

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

    $(document).ready(function(){
      
      $('.userdetail').on('click',function(event){
        
        alert("SDF");return;
        var userid = $(this).children('div').attr('id');
        $.ajax({
                url: "{{route('userProfileDetails')}}",
                data:{
                  'userid':userid,
                  '_token' : "{{csrf_token()}}"
                },
                method: "POST",
                success:function(data){
                    
                    //$("#userdetail_model .model-body").html(data);
                    $("#userdetail_model").modal();
                }
            });
      });
    });
  </script>
@endpush