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
          <h1 class="mb-0">Sign in</h1>
          <p>Enter your email address and password to access admin panel.</p>
          {!!Form::open(['route'=>'login','method'=>'post'])!!}
          <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" name="email" value="{{ old('email') }}" class="form-control mb-0" id="exampleInputEmail1" placeholder="Enter email">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <a href="{{route('recover')}}" class="float-right">Forgot password?</a>
            <input type="password" name="password" class="form-control mb-0" id="exampleInputPassword1" placeholder="Password">
          </div>
          <div class="d-inline-block w-100">
            <div class="custom-control custom-checkbox d-inline-block mt-2 pt-1">
              <input type="checkbox" class="custom-control-input" id="customCheck1">
              <label class="custom-control-label" for="customCheck1">Remember Me</label>
            </div>
            <button type="submit" class="btn btn-primary float-right">Sign in</button>
          </div>
          <div class="sign-info">
            <span class="dark-color d-inline-block line-height-2">Don't have an account? <a href={{route('registration')}}>Sign up</a></span>
            <ul class="iq-social-media">
              <li><a href="#"><i class="ri-facebook-box-line"></i></a></li>
              <li><a href="#"><i class="ri-twitter-line"></i></a></li>
              <li><a href="#"><i class="ri-instagram-line"></i></a></li>
            </ul>
          </div>
          {!!Form::close()!!}
        </div>
      </div>
      <div class="col-sm-6 text-center">
        <div class="sign-in-detail bg-primary text-white" style="background: url(assets/images/login/2.jpg) no-repeat 0 0; background-size: cover;">
          <a class="sign-in-logo mb-5" href="#"><img src={{asset("assets/images/logo-white.png")}} class="img-fluid" alt="logo"></a>
          <div class="owl-carousel d-none" data-autoplay="true" data-loop="true" data-nav="false" data-dots="true" data-items="1" data-items-laptop="1" data-items-tab="1" data-items-mobile="1" data-items-mobile-sm="1" data-margin="0">
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
