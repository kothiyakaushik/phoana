@extends('layouts.backend')

@section('title','Dashboard')

@section('body-class','hold-transition skin-blue sidebar-mini')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Dashboard
            <small>Control panel</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-yellow">
                <div class="inner">
                  <h3>{{$totalCustomers}}</h3>

                  <p>Customer Registered</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
                <a href="{{route('getAdminUserListing',['view_user=1'])}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->

            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-yellow">
                <div class="inner">
                  <h3>{{$totalProviders}}</h3>

                  <p>Provider Registered</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
                <a href="{{route('getAdminUserListing',['view_user=2'])}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->

            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <h3>{{$totalOpenJobTickets}}</h3>

                  <p>Open Job Tickets</p>
                </div>
                <div class="icon">
                  <i class="ion ion-ios-briefcase"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>

            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <h3>{{$totalCompletedJobs}}</h3>

                  <p>Completed Jobs</p>
                </div>
                <div class="icon">
                  <i class="ion ion-ios-briefcase"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>

            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <h3>{{$totalServiceRequestHaveNoProvider}}</h3>
                  <p>Job requested<br>but no Providers found</p>
                </div>
                <div class="icon">
                  <i class="ion ion-ios-briefcase"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
          </div>
            <!-- ./col -->
          </div>
          <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
@endsection

<!-- http://setbootstrap.com/glyphicon/ionicons/ -->