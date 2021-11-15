<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Influencer</title>

    <!--stylshhet ref bootstrap-->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!--Css Style-->
    <!--We need to fix how to connect media file between css and php and also with js files-->
    <style> 
        body{
            background: -webkit-linear-gradient(left, #3931af, #00c6ff);
        }
        .register{
            background: -webkit-linear-gradient(left, #3931af, #00c6ff);
            margin-top: 1%;
            margin-bottom: 1%;
            padding: 2%;
        }
        .register-left{
            text-align: center;
            color: #fff;
            margin-top: 4%;
        }
        .register-left input{
            border: none;
            border-radius: 1.5rem;
            padding: 2%;
            width: 60%;
            background: #f8f9fa;
            font-weight: bold;
            color: #383d41;
            margin-top: 30%;
            margin-bottom: 3%;
            cursor: pointer;
        }
        .register-right{
            background: #f8f9fa;
            border-top-left-radius: 10% 50%;
            border-bottom-left-radius: 10% 50%;
        }
        .register-left img{
            margin-top: 15%;
            margin-bottom: 5%;
            width: 25%;
            -webkit-animation: mover 2s infinite  alternate;
            animation: mover 1s infinite  alternate;
        }
        @-webkit-keyframes mover {
            0% { transform: translateY(0); }
            100% { transform: translateY(-20px); }
        }
        @keyframes mover {
            0% { transform: translateY(0); }
            100% { transform: translateY(-20px); }
        }
        .register-left p{
            font-weight: lighter;
            padding: 12%;
            margin-top: -9%;
        }
        .register .register-form{
            padding: 10%;
            margin-top: 10%;
        }
        .btnRegister{
            float: right;
            margin-top: 10%;
            border: none;
            border-radius: 1.5rem;
            padding: 2%;
            background: #0062cc;
            color: #fff;
            font-weight: 600;
            width: 50%;
            cursor: pointer;
        }
        .register .nav-tabs{
            margin-top: 3%;
            border: none;
            background: #0062cc;
            border-radius: 1.5rem;
            width: 20%;
            float: right;
        }
        .register .nav-tabs .nav-link{
            padding: 2%;
            height: 34px;
            font-weight: 600;
            color: #fff;
            border-top-right-radius: 1.5rem;
            border-bottom-right-radius: 1.5rem;
        }
        .register .nav-tabs .nav-link:hover{
            border: none;
        }
        .register .nav-tabs .nav-link.active{
            width: inherit;
            color: #0062cc;
            border: 2px solid #0062cc;
            border-top-left-radius: 1.5rem;
            border-bottom-left-radius: 1.5rem;
        }
        .register-heading{
            text-align: center;
            margin-top: 8%;
            margin-bottom: -15%;
            color: #495057;
        }
    </style>

    <!--Vue script-->
    <script src="./js/vue.js"></script>
    <!--

    -->

</head>
    <body>
    <!------ Include the above in your HEAD tag ---------->
        <div class="container register">
                        <div class="row">
                            <div class="col-md-3 register-left">
                                <img src="resources/logo/Logo_blanco.png" alt=""/>
                                <h3>INCO</h3>
                                <p>Influencer Colaboration</p>
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
                                        <h3 class="register-heading">Apply as a Influencer</h3>
                                        <div class="row register-form">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input type="text" class="form-control"  placeholder="Red Social*" value="" />
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" class="form-control"  placeholder="Seguidores*" value="" />
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" placeholder="Usuario*" value="" />
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" placeholder="Cédula*" value="" />
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" placeholder="URL Perfil" value="" />
                                                </div>
                                                <div class="form-group">
                                                    <textarea type="text" class="form-control"  placeholder="Description" value=""></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" placeholder="categoria*" value="" />
                                                </div>
                                                <div class="form-group">
                                                    <input type="email" class="form-control" placeholder="Correo*" value="" />
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" minlength="10" maxlength="10" name="txtEmpPhone" class="form-control" placeholder="Celular*" value="" />
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