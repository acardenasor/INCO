
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
                                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                    <h3 class="register-heading">Apply as a Enterprise</h3>
                                    <form action="{{route('register-company')}}" method="POST">
                                        @csrf
                                        <div class="row register-form">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" placeholder="Company Name *" value="" name="name" required/>
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" minlength="7" maxlength="9"  class="form-control" placeholder="NIT *" value="" name="nit" required />
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" placeholder="Web Domain " value="" name="web_domain"/>
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" class="form-control"  placeholder="Address" value="" name="address"/>
                                                </div>
                                                <div class="form-group">
                                                    <textarea type="text" class="form-control"  placeholder="Description" value="" name="description"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <select  class="col-12 form-control" style="margin-bottom: 20px"
                                                                    onchange="document.getElementById('displayValue').value=this.options[this.selectedIndex].text; document.getElementById('idValue').value=this.options[this.selectedIndex].value;">
                                                                <option value="" disabled selected hidden>category*</option>
                                                                <option value="1" >one</option>
                                                                <option value="2" >two</option>
                                                                <option value="3">three</option>
                                                                <option value="4">four</option>
                                                                <option value="5">five</option>
                                                </select>
                                                <div class="form-group">
                                                    <input type="email" class="form-control" placeholder="Your Email *" value="" name="email" required/>
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" minlength="8" maxlength="10"  class="form-control" placeholder="Your Phone *" value="" name="contact_number" required/>
                                                </div>
                                                <input type="submit" class="btnRegister"  value="Register"/>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
@endsection