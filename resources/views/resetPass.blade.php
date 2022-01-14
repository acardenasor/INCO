@extends('layouts.register')

@section('content')
    <div class="container register">
        <div class="row">
            <div class="col-md-3 register-left">
                <img src="{{ asset('assets/Logo_blanco.png') }}" alt="INCO logo"/>
                <h1>INCO</h1>
                <a href="/">
                    <input type="submit" name="" value="Back"/><br/></a>
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
                                <form action="{{route('Email')}}" method="POST">
                                    @csrf
                                    <h6>please insert your Email<h6>
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="Email *" value="" name="email" required/>
                                                <input type="submit" class="btnRegister" onclick="validation()"value="Login"/>
                                                <p id="demo" class="P-validation"></p>
                                                <div class="row register-form">
                                                </div>
                                            </div>
                                            <p id="demo" class="P-validation"></p>
                                </form>
                            </div>
                            <div class="col-md-3">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            function validation() {
                let conf = false;
                var txt;
                if (conf) {
                    txt = "";
                }  else {
                    txt = "please check your email and try sing in again"
                }
                document.getElementById("demo").innerHTML = txt;
            }
        </script>
@endsection
