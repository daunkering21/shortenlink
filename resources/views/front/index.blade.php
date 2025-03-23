@extends('layout.main')
@section('container')
<div class="hero">
  <img src="{{ asset('assets/img/logo.png') }}" alt="logo" width="100px">
  <h1 class="hero-title">Shorten the links, simplify your life!</h1>
  <span class="hero-details">Tired of long URLs? Let us work our magic and make them short and sweet, just for you!</span>
  <div class="front-shorten">
    <input class="input-primary" type="text" placeholder="Shorten here">
    <button>Snap!!</button>
  </div>
</div>
<div class="card-container">
  <div class="card">
    <img src="{{ asset('assets/img/under_development.webp') }}" alt="" width="100%">
    <div class="card-content">
      <h2 class="card-title">Theme Update</h2>
      <p class="card-details">Heyhoo! We've just given our theme a fresh new look to keep things exciting, and more updates are on the way. Stay tuned for even greater things coming soon!</p>
    </div>
  </div>
  <div class="card">
    <img src="{{ asset('assets/img/services.webp') }}" alt="" width="100%">
    <div class="card-content">
      <h2 class="card-title">Features</h2>
      <p class="card-details">Here we are, more features already added. Click Here to see our newest features!</p>
    </div>
  </div>
  <div class="card">
    <img src="{{ asset('assets/img/benefits.webp') }}" alt="" width="100%">
    <div class="card-content">
      <h2 class="card-title">Benefits</h2>
      <p class="card-details">Save time, boost efficiency, and track your links effortlessly. Click to discover more benefits!
      </p>
    </div>
  </div>
  <div class="card">
    <img src="{{ asset('assets/img/about_us.webp') }}" alt="" width="100%">
    <div class="card-content">
      <h2 class="card-title">About Us</h2>
      <p class="card-details">Who are we? Discover the story behind our service and what makes us unique. Click to learn more!
      </p>
    </div>
  </div>
</div>
@endsection