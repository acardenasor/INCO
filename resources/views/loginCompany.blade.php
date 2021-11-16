<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!--stylshhet ref bootstrap-->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!--Css Style-->
    <link href="{{ asset('css/login.css') }}" rel="stylesheet">


</head>
    <body>
    <!------ Include the above in your HEAD tag ---------->
        <div class="container register">
                        <div class="row">
                            <div class="col-md-3 register-left">
                            <img src="{{ asset('assets/Logo_blanco.png') }}" alt="INCO logo"/>
                                <h1>INCO</h1>
                                <input type="submit" name="" value="Login"/><br/>
                            </div>
                            <div class="col-md-9 register-right">
                                <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Enterprise</a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        <h3 class="register-heading">Apply as a Enterprise</h3>
                                        <div class="row register-form">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" placeholder="Company Name *" value="" />
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" placeholder="NIT *" value="" />
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" placeholder="Web Domain " value="" />
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" class="form-control"  placeholder="Address" value="" />
                                                </div>
                                                <div class="form-group">
                                                    <textarea type="text" class="form-control"  placeholder="Description" value=""></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" placeholder="categories *" value="" />
                                                </div>
                                                <div class="form-group">
                                                    <input type="email" class="form-control" placeholder="Your Email *" value="" />
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" minlength="10" maxlength="10" name="txtEmpPhone" class="form-control" placeholder="Your Phone *" value="" />
                                                </div>
                                                <div class="form-group">
                                                    <input type="text"  name="txtEmpPhone" class="form-control" placeholder="dropzone *" value="" />
                                                </div>
                                                <div class="form-group">
                                                    <input type="text"  name="txtEmpPhone" class="form-control" placeholder="dropzone *" value="" />
                                                </div>
                                                <input type="submit" class="btnRegister"  value="Register"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
    </body>
</html>