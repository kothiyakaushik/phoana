<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>User Profile Detail</title>
    <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="{{asset('/public/backend/bootstrap/css/bootstrap.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('/public/backend/dist/css/font-awesome-4.6.3/css/font-awesome.min.css')}}">
    
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{asset('/public/backend/dist/css/ionicons-2.0.1/css/ionicons.min.css')}}">
    <!-- Ionicons -->
    
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('/public/backend/dist/css/AdminLTE.min.css')}}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{asset('/public/backend/dist/css/skins/_all-skins.min.css')}}">
    
    <!-- bootstrap Star rating css-->
    <link rel="stylesheet" href="{{asset('/public/backend/bootstrap/css/star-rating.min.css')}}">

    <link rel="stylesheet" href="{{asset('/public/backend/custom/css/style.css')}}">
</head>
<body class="hold-transition skin-blue sidebar-mini">
  <!-- Content Wrapper. Contains page content -->
  <div class="wrapper" style="background: none">
    <!-- Content Header (Page header) -->
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-body">
                <div data-example-id="togglable-tabs" role="tabpanel" class="">
                  <ul role="tablist" class="nav nav-tabs bar_tabs" id="myTab">
                    <li class="active" role="presentation"><a aria-expanded="true" data-toggle="tab" role="tab" id="home-tab" href="#tab_content1">PROFILE</a>
                    </li>

                    @if(!empty($user->hasCompany))
                      <li class="" role="presentation"><a aria-expanded="false" data-toggle="tab" id="profile-tab" role="tab" href="#tab_content2">COMPANY</a>
                      </li>
                    @endif                            
                  </ul>

                  <div class="tab-content" id="myTabContent">
                    <div aria-labelledby="home-tab" id="tab_content1" class="tab-pane fade active in" role="tabpanel">
                      <div class="row">
                        <div class="box-body col-md-6 col-sm-6 col-xs-12">
                          <div class="form-group col-md-12 col-sm-12 col-xs-12">
                            <label for="firstname">First Name</label>
                            <input type="text" placeholder="First name" id="firstname"  readonly="readonly" value="{{$user->firstname}}" class="form-control valid" disabled="disabled">
                          </div>
                          <div class="form-group col-md-12 col-sm-12 col-xs-12">
                              <label for="lastname">Last Name</label>
                              <input type="text" placeholder="Last name" id="lastname"  readonly="readonly" value="{{$user->lastname}}" class="form-control" disabled="disabled">
                          </div>
                          <div class="form-group col-md-12 col-sm-12 col-xs-12">
                            <label for="email">Email</label>
                            <input type="text" value="{{$user->users->email}}" placeholder="Email" id="email" readonly="readonly" class="form-control" disabled="disabled">
                          </div>
                          <div class="form-group col-md-12 col-sm-12 col-xs-12">
                            <label for="phone_no">Phone number</label>
                            <input type="text" placeholder="Phone number" id="phone_no" readonly="readonly" value="{{$user->phone}}" class="form-control" disabled="disabled">
                          </div>
                          <div class="form-group col-md-12 col-sm-12 col-xs-12">
                            <label for="address">Address</label>
                            <input type="text" placeholder="address" id="address" readonly="readonly" value="{{$user->address}}" class="form-control" disabled="disabled">
                          </div>
                          <div class="form-group col-md-12 col-sm-12 col-xs-12">
                            <label for="zipcode">Zipcode</label>
                            <input type="text" placeholder="zipcode" id="zipcode" readonly="readonly" value="{{$user->zipcode}}" class="form-control" disabled="disabled">
                          </div>
                          <div class="form-group col-md-12 col-sm-12 col-xs-12">
                            <label for="city">City</label>
                            <input type="text" placeholder="city" id="city" readonly="readonly" value="{{$user->city}}" class="form-control" disabled="disabled">
                          </div>
                          <div class="form-group col-md-12 col-sm-12 col-xs-12">
                            <label for="country">Country</label>
                            <input type="text" placeholder="country" id="country" readonly="readonly" value="{{$user->country}}" class="form-control" disabled="disabled">
                          </div>
                        </div>

                        <div class="box-body col-md-6 col-sm-6 col-xs-12">
                          <div class="form-group col-md-12 col-sm-12 col-xs-12">
                            <label for="country">Profile image</label>
                            <span class="mailbox-attachment-icon has-img"><img src="{{$user->profile_image}}" alt="Attachment"></span>
                          </div>
                          <div class="form-group col-md-12 col-sm-12 col-xs-12">
                            <label for="country">User Ratings</label>
                            <input id="input-3" name="input-3" value="{{$user->average_ratings}}" class="rating rating-loading" data-show-clear="false" data-show-caption="true" readonly="readonly">
                          </div>
                        </div>
                      </div>
                    </div>
                    
                    @if(!empty($user->hasCompany))
                    <div aria-labelledby="profile-tab" id="tab_content2" class="tab-pane fade" role="tabpanel">
                      <div class="row">
                        <div class="box-body col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group col-md-12 col-sm-12 col-xs-12">
                              <label for="">Company Name</label>
                              <input type="text" value="{{$user->hasCompany->company_name}}" id="company_name" readonly="readonly" class="form-control" disabled="disabled">
                            </div>
                            <div class="form-group col-md-12 col-sm-12 col-xs-12">
                              <label for="">Licence no</label>
                              <input type="text" id="licence_no" value="{{$user->hasCompany->licence_no}}" readonly="readonly" class="form-control" disabled="disabled">
                            </div>
                            <div class="form-group col-md-12 col-sm-12 col-xs-12">
                              <label for="">Certificate name</label>
                              <input type="text" id="certificate_name" value="{{$user->hasCompany->certificate_name}}" readonly="readonly" class="form-control" disabled="disabled">
                            </div>
                            <div class="form-group col-md-12 col-sm-12 col-xs-12">
                              <label for="">Timein Business</label>
                              <input type="text" id="certificate_name" value="{{$user->hasCompany->timein_business}}" readonly="readonly" class="form-control" disabled="disabled">
                            </div>
                        </div>
                        <div class="box-body col-md-6 col-sm-6 col-xs-12">
                          <div class="form-group col-md-12 col-sm-12 col-xs-12">
                            <label for="">Company profile image</label>
                            <span class="mailbox-attachment-icon has-img"><img src="{{$user->hasCompany->profile_image}}" alt="No image"></span>
                          </div>
                        </div>
                        <div class="box-body col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group col-md-12 col-sm-12 col-xs-12">
                              <label for="">Description</label>
                              <input type="text" id="certificate_name" value="{{$user->hasCompany->description}}" readonly="readonly" class="form-control" disabled="disabled">
                            </div>

                            @if(!empty($user->hasCompany->attachments))
                            <div class="form-group col-md-12 col-sm-12 col-xs-12">
                              <label for="">Attachments</label>
                               <div class="box-footer">
                                  <ul class="mailbox-attachments clearfix">
                                  @foreach($user->hasCompany->attachments as $key => $attachment)
                                    @if($attachment->type == 'jpg' || $attachment->type == 'png')
                                      <li>
                                      <span class="mailbox-attachment-icon has-img"><img src="{{$attachment->filename}}" alt="Attachment"></span>
                                      <div class="mailbox-attachment-info">
                                        <a href="#" class="mailbox-attachment-name"><i class="fa fa-camera"></i> {{$attachment->name_only}}</a>
                                            <!-- <span class="mailbox-attachment-size">
                                              2.67 MB
                                              <a href="#" class="btn btn-default btn-xs pull-right"><i class="fa fa-cloud-download"></i></a>
                                            </span> -->
                                      </div>
                                    </li>
                                    @elseif($attachment->type == 'pdf')
                                      <li>
                                      <span class="mailbox-attachment-icon"><i class="fa fa-file-pdf-o"></i></span>
                                      <div class="mailbox-attachment-info">
                                        <a href="#" class="mailbox-attachment-name"><i class="fa fa-paperclip"></i> {{$attachment->name_only}}</a>
                                      </div>
                                    </li>
                                    @elseif($attachment->type == 'doc' || $attachment->type == 'docx')
                                      <li>
                                      <span class="mailbox-attachment-icon"><i class="fa fa-file-word-o"></i></span>
                                      <div class="mailbox-attachment-info">
                                        <a href="#" class="mailbox-attachment-name"><i class="fa fa-paperclip"></i> {{$attachment->name_only}}</a>
                                      </div>
                                    </li>
                                    @endif
                                  @endforeach
                                </div>
                            </div>
                            @endif
                        </div>
                      </div>
                    </div>
                    @endif
                  </div>
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
</body>
<footer>
  <script src="{{asset('/public/backend/plugins/jQuery/jquery-2.2.3.min.js')}}"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="{{asset('/public/backend/plugins/jQuery/jquery-ui-1.11.4.min.js')}}"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button);
  </script>
  <!-- Bootstrap 3.3.6 -->
  <script src="{{asset('/public/backend/bootstrap/js/bootstrap.min.js')}}"></script>

  <!-- AdminLTE App -->
  <script src="{{asset('/public/backend/dist/js/app.min.js')}}"></script>

  <!-- Bootstrap star rating js -->
  <script src="{{asset('/public/backend/bootstrap/js/star-rating.min.js')}}"></script>

  <script type="text/javascript">
    $(document).on('ready', function(){
        $('#input-3').rating({displayOnly: true, step: 0.5});
    });
  </script>
</footer>
</html>
