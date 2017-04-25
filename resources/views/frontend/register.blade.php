@extends('layouts.frontend')

@section('title', "Dashboard")

@section('content_writer')
    <div id="content"> <!-- Content -->
              <div class="page-title">
                  <div class="container">
                      <div class="page-title-inner">
                          <h3>Register</h3>
                          <div class="breadcumb"> <a href="">Home</a><span> / </span><span>Register</span></div>
                          <div class="clearfix"></div>
                      </div>
                  </div>
              </div>
              
              <div class="about-page">
                  <div class="container">
                      <div class="row">
                          
                          <div class="col-md-1">
                          </div>
                          <div class="col-md-6 ct-form">
                              <h3>Register Form</h3>
                              
                              {{ Form::open(array('route' => 'registerdata', 'method' => 'POST')) }}
                                  
                                  <div class="form-group">
                                    {{ Form::label('first_name', 'First Name*') }}
                                    {{ Form::text('first_name', '', array('id' => 'first_name', 'class'=>'form-control')) }}
                                  </div>

                                  <div class="form-group">
                                      {{ Form::label('last_name', 'Last Name*') }}
                                      {{ Form::text('last_name', '', array('id' => 'last_name', 'class'=>'form-control')) }}
                                  </div>

                                  <div class="form-group">
                                      {{ Form::label('email', 'Email*') }}
                                      {{ Form::email('email', '', array('id' => 'email', 'class'=>'form-control')) }}
                                  </div>

                                  <div class="form-group">
                                      {{ Form::label('password', 'Password*') }}
                                      {{ Form::password('password', '', array('id' => 'password', 'class'=>'form-control')) }}
                                  </div>

                                  <div class="form-group">
                                      {{ Form::label('gender', 'Gender*') }}
                                      
                                      {{ Form::radio('gender', '0') }} 
                                      {{ Form::label('male', 'Male') }}
                                      
                                      {{ Form::radio('gender', '1') }}
                                      {{ Form::label('female', 'Female') }}
                                      
                                  </div>

                                  <div class="form-group">
                                      {{ Form::label('hobbie_id', 'Hobbies*') }}
                                      
                                      {{ Form::checkbox('hobbie_id', '1') }} 
                                      {{ Form::label('cricket', 'Cricket') }}
                                      
                                      {{ Form::checkbox('hobbie_id', '2') }} 
                                      {{ Form::label('reading', 'Reading') }}
                                      
                                      {{ Form::checkbox('hobbie_id', '3') }} 
                                      {{ Form::label('singinging', 'Singinging') }}
                                  </div>

                                  <!-- <button type="submit" class="btn btn-blue">Submit</button> -->

                                  {{ Form::submit('Click Me!', array('class'=> 'btn btn-blue')) }}


                              {{ Form::close() }}

                          </div>
                          <div class="col-md-5">
                          </div>
                      </div>
                      
                      
                  </div>
              </div>

          </div> <!-- Content -->
@endsection