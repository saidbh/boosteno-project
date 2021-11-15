@extends('layouts.master')
@section('content')
<section class="sign-in-page bg-white">
  <div class="container-fluid p-0">
    <div class="row no-gutters">
      <div class="col-sm-6 align-self-center">
        <div class="sign-in-from">
          @if (Session::has('error'))
          <div class="alert alert-danger m-0">{{ Session::get('error') }}</div>
          @endif
          @if (Session::has('success'))
          <div class="alert alert-success m-0">{{ Session::get('success') }}</div>
          @endif
          <h1 class="mb-0">Sign Up</h1>
          <p>Enter your email address and password to access admin panel.</p>
          {!!Form::open(['route'=>'registration','method'=>'post'])!!}
          <div class="row">
            <div class="form-group col-md-6">
              <label for="firstname">Prénom</label>
              <input type="text" name="firstname" value="{{old('firstname')}}" data-error="" class="form-control mb-0" id="firstname" placeholder="Prénom">
            </div>
            <div class="form-group col-md-6">
              <label for="lastname">Nom</label>
              <input type="text" name="lastname" value="{{old('lastname')}}" class="form-control mb-0" id="lastname" placeholder="Nom">
            </div>
            <div class="form-group col-md-6">
              <label for="email">Email address</label>
              <input type="text" name="email" value="{{old('email')}}" class="form-control mb-0" id="email" placeholder="Email address">
            </div>
            <div class="form-group col-md-6">
              <label for="phone">Numéro</label>
              <input type="text" name="phone" value="{{old('phone')}}" class="form-control mb-0" id="phone" placeholder="Numéro">
            </div>
            <div class="form-group col-md-6">
              <label for="password">Mot de passe</label>
              <input type="password" name="password" class="form-control mb-0" id="password" placeholder="Mot de passe">
            </div>
            <div class="form-group col-md-6">
              <label for="confirmpass">Confirmer mot de passe</label>
              <input type="password" name="confPassword" class="form-control mb-0" id="confirmpass" placeholder="Confirmer mot de passe">
            </div>
          </div>
          <div class="d-inline-block w-100">
            <div class="custom-control custom-checkbox d-inline-block mt-2 pt-1">
              <input type="checkbox" name="termsconditions" class="custom-control-input" id="customCheck1">
              <label class="custom-control-label" for="customCheck1">I accept <a href="#">Terms and Conditions</a></label>
            </div>
            <button type="submit" id="formSubmitter" class="btn btn-primary float-right">Sign Up</button>
          </div>
          <div class="sign-info">
            <span class="dark-color d-inline-block line-height-2">Already Have Account ? <a href="{{route('login')}}">Log In</a></span>
            <ul class="iq-social-media">
              <li><a href="#"><i class="ri-facebook-box-line"></i></a></li>
              <li><a href="#"><i class="ri-twitter-line"></i></a></li>
              <li><a href="#"><i class="ri-instagram-line"></i></a></li>
            </ul>
          </div>
          {!!Form::close()!!}
        </div>
      </div>
      <div class="col-sm-6 bg-primary text-center">
        <div class="sign-in-detail text-white" style="background: url(assets/images/login/2.jpg) no-repeat 0 0; background-size: cover;">
          <a class="sign-in-logo mb-5" href="#"><img src={{asset("assets/images/logo-white.png")}} class="img-fluid" alt="logo"></a>
          <div class="owl-carousel" data-autoplay="true" data-loop="true" data-nav="false" data-dots="true" data-items="1" data-items-laptop="1" data-items-tab="1" data-items-mobile="1" data-items-mobile-sm="1" data-margin="0">
            <div class="item">
              <img src={{asset("assets/images/login/1.png")}} class="img-fluid mb-4" alt="logo">
              <h4 class="mb-1 text-white">Manage your orders</h4>
              <p>It is a long established fact that a reader will be distracted by the readable content.</p>
            </div>
            <div class="item">
              <img src={{asset("assets/images/login/1.png")}} class="img-fluid mb-4" alt="logo">
              <h4 class="mb-1 text-white">Manage your orders</h4>
              <p>It is a long established fact that a reader will be distracted by the readable content.</p>
            </div>
            <div class="item">
              <img src={{asset("assets/images/login/1.png")}} class="img-fluid mb-4" alt="logo">
              <h4 class="mb-1 text-white">Manage your orders</h4>
              <p>It is a long established fact that a reader will be distracted by the readable content.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
