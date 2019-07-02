@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4 login-sec">
            <h2 class="logo"></h2>
            <form class="login-form" role="form" method="POST" action="{{ url('/login') }}">
                {{ csrf_field() }}
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email" class="control-label">Correo</label>
                    <div class="">
                        <input id="email" type="email" class="form-control" name="email" placeholder="Por Favor digite su Correo"value="{{ old('email') }}">
                        @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label for="password" class="control-label">Contraseña</label>
                    <div class="">
                        <input id="password" type="password" class="form-control" name="password" placeholder="Por favor digite su contraseña">
                        @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="form-check">    
                    <button type="submit" class="btn btn-login float-right">Ingresar</button>
                </div>
            </form>
            <div class="copy-text"><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i></a></div>
        </div>
        <div class="col-md-8 banner-sec">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner" role="listbox">
                    <div class="carousel-item active">
                        <img class="d-block img-fluid" src="{{asset('images/p4.jpg')}}"
                            alt="First slide">
                        <div class="carousel-caption d-none d-md-block">
                            <div class="banner-text">
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img class="d-block img-fluid"
                            src="{{asset('images/p5.png')}}" alt="First slide">
                        <div class="carousel-caption d-none d-md-block">
                            <div class="banner-text">
                       
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img class="d-block img-fluid"
                            src="{{asset('images/p6.jpg')}}" alt="First slide">
                        <div class="carousel-caption d-none d-md-block">
                            <div class="banner-text">
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    @endsection