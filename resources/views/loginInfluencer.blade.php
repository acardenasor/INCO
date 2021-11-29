
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
                                                        <input type="text" class="form-control" placeholder="categoria*" value="" />
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" placeholder="Afinidades" value="" />
                                                    </div>
                                                    <div class="form-group">
                                                        <textarea type="text" class="form-control"  placeholder="Description" value=""></textarea>
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