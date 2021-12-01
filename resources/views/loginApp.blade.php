@extends('layouts.register')

@section('content')
<div class="container register">
    <div class="row">
        <div class="col-md-3 register-left">
        <img src="{{ asset('assets/Logo_blanco.png') }}" alt="INCO logo"/>
            <h1>INCO</h1>
        </div>
        <div class="col-md-9 register-right">
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active"  role="tabpanel" aria-labelledby="home-tab">
                    <h3 class="register-heading">Login</h3>
                        <div class="row register-form P-validation">
                            <div class="col-12">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="User Name *" value="" name="name_user" required/>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" placeholder="Password *" value="" name="password" required/>
                                </div>
                                <div class="btn-group-vertical btn-group-lg">  
                                    <a href="/resetPass">I forgot my password</a>
                                    <a href="/registro">Create an account</a>
                                </div>
                                <input type="submit" class="btnRegister" onclick="validation()" value="login"/> 
                                <p id="demo" class="P-validation"></p>                          
                            </div>

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
                txt = "Password or Email incorrect"
            }
            document.getElementById("demo").innerHTML = txt;
        }
        </script>
@endsection
