@extends('layouts.frontend')

@section('title', "login")

@section('content_writer')
    <div id="content"> <!-- Content -->
        
        <div class="page-title">
            <div class="container">
                <div class="page-title-inner">
                    <h3>Login</h3>
                    <div class="breadcumb"> <a href="">Home</a><span> / </span><span>Login</span></div>
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
                        <h3>Login Form</h3>
                        
                        {{ Form::open(array('route' => 'logindata', 'method' => 'POST')) }}
                          
                            <div class="form-group">
                                {{ Form::label('email', 'Email*') }}
                                {{ Form::email('email', '', array('id' => 'email', 'class'=>'form-control')) }}
                            </div>

                            <div class="form-group">
                                {{ Form::label('password', 'Password*') }}
                                {{ Form::password('password', '', array('id' => 'password', 'class'=>'form-control')) }}
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