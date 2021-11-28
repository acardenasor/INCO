
@extends('layouts.register')

@section('content')
        <div class="container register">
                        <div class="row">
                            <div class="col-md-3 register-left">
                            <img src="{{ asset('assets/Logo_blanco.png') }}" alt="INCO logo"/>
                                <input type="submit" name="" value="Login"/><br/>
                            </div>
                            <div class="col-md-9 register-right">
                                <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">User</a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active"  role="tabpanel" aria-labelledby="home-tab">
                                        <h3 class="register-heading">User register</h3>
                                        <form action="{{route('register-store')}}" method="POST">
                                            @csrf
                                            <div class="row register-form">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" placeholder="User Name *" value="" name="name_user"/>
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" placeholder="Name *" value="" name="name" />
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" placeholder="Last Name *" value="" name="last_name"/>
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="password" class="form-control" placeholder="Password *" value="" name="password"/>
                                                    </div>
                                                    {{-- <div class="form-group">
                                                        <input type="password" class="form-control"  placeholder="Confirm Password *" value="" />
                                                    </div> --}}

                                                    <div class="form-group">
                                                        <input type="text" class="form-control"  placeholder="Gender *" value="" name="gender"/>
                                                    </div>
                            
                                                </div>
                                                <div class="col-md-6">
                                                <div class="form-group">
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="email" class="form-control" placeholder="Your Email *" value="" name="email"/>
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="text"  class="form-control" placeholder="ID *" value="no se" name="CC"/>
                                                    </div>
                                                    <div class="maxl">
                                                            <label class="radio inline"> 
                                                                <input type="radio" name="role" value= 1  checked>
                                                                <span> Entrepreneur </span> 
                                                            </label>
                                                            <label class="radio inline"> 
                                                                <input type="radio" name="role" value= 2>
                                                                <span> Influencer </span> 
                                                            </label>
                                                        </div>
                                                
                                                    <input type="submit" class="btnRegister"  value="Register"/>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
@endsection