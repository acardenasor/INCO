
@extends('layouts.register')

@section('content')
        <div class="container register">
                        <div class="row">
                            <div class="col-md-3 register-left">
                                <img src="{{ asset('assets/Logo_blanco.png') }}" alt="INCO logo"/>
                                <h1>INCO</h1>
                                <input type="submit" name="" value="Login"/><br/>
                            </div>
                            <div class="col-md-9 register-right">
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" role="tabpanel" aria-labelledby="home-tab">
                                        <h3 class="register-heading">Apply as a Influencer</h3>
                                        <form action="{{route('register-company')}}" method="POST">
                                            @csrf
                                            <div class="row register-form">
                                                <div class="col-12">                
                                                    <div class="form-group">
                                                        <select  class="col-12 form-control"
                                                                onchange="document.getElementById('displayValue').value=this.options[this.selectedIndex].text; document.getElementById('idValue').value=this.options[this.selectedIndex].value;"
                                                                required>
                                                            <option value="" disabled selected hidden>category*</option>
                                                            <option value="1" >Fashion bloggers</option>
                                                            <option value="2" >Foodies</option>
                                                            <option value="3">gamers and technology gurus</option>
                                                            <option value="4">Celebrities and artists</option>
                                                            <option value="5">Fitness and healthy life</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <textarea type="text" class="form-control"  placeholder="Description" value=""></textarea>
                                                    </div>  
                                                    <h3 style="margin-bottom: 20px">Social media</h3> 
                                                    <toggle></toggle>                                          
                                                </div>              
                                                <input type="submit" class="btnRegister"  value="Register"/>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
@endsection