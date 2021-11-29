@extends('layouts.register')

@section('content')
<div class="container register">
    <div class="row">
        <div class="col-md-3 register-left">
        <img src="{{ asset('assets/Logo_blanco.png') }}" alt="INCO logo"/>
            <h1>INCO</h1>
            <input type="submit" name="" value="Back"/><br/>
        </div>
        <div class="col-md-9 register-right">
            <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                <li class="nav-item">
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active"  role="tabpanel" aria-labelledby="home-tab">
                    <h3 class="register-heading">Reset Password</h3>
                        <div class="row register-form">
                            <div class="col-md-3">
                            </div>
                            <div class="col-md-6 ">
                                <h6>please insert your Email<h6>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Email *" value="" name="email" required/>                                    
                                    <button type="button" class="btnRegister">Submit</button>
                                    <div class="row register-form">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div> 
@endsection
