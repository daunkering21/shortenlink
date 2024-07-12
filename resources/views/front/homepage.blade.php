@extends('layouts.main')
@section('container')
<div class="container-fluid min-vh-100">
    <div class="container my-5">
        <div class="p-5 text-center bg-body-tertiary rounded-4 ldlp01">
            <img class="bi mt-4 mb-3" width="100" height="100" src="/../assets/logo/lovidea_purple.png" alt="kosong">
            <h1 class="text-body-emphasis"><span class="text-purple bold">Shorten the links, simplify your life!</span></h1>
            <p class="col-lg-8 mx-auto fs-6 text-muted">
                "Tired of long URLs? Let us work our magic and make them short and sweet, just for you!"
            </p>
            <div class="d-inline-flex gap-2 mb-5">
                
                <form action="/short" method="POST">
                    @csrf
                    <div class="d-inline-flex gap-2">
                        <input class="form-control form-control-lg text-center" type="text" id="url" name="url" placeholder='" your links here... "'>
                        <button type="submit" class="btn btn-warning"><span class="text-purple bold">SNAP!!</span></button>
                    </div>
                </form>
            </div>
        </div>
    </div>


<div class="container">
    <div class="row m-5 gap-5">
        <div class="col d-flex justify-content-center align-items-center">
            <div class="card" style="width: 18rem;">
                <img src="../assets/img/services.png" class="card-img-top" alt="empty..">
                <div class="card-body">
                    <h5 class="card-title">Our Services</h5>
                    <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Vel, repellendus.</p>
                    <a href="#" class="btn btn-purple">Took a View</a>
                </div>
            </div>
        </div>
        <div class="col d-flex justify-content-center align-items-center">
            <div class="card" style="width: 18rem;">
                <img src="../assets/img/about_us.png" class="card-img-top" alt="empty..">
                <div class="card-body">
                    <h5 class="card-title">About Us</h5>
                    <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aspernatur perspiciatis sint eaque..</p>
                    <a href="#" class="btn btn-purple">About Us</a>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- 
<div id="carouselExampleIndicators" class="carousel slide shadow">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="../assets/img/lp01.jpg" class="d-block w-100" alt="empty..">
        </div>
        <div class="carousel-item">
            <img src="../assets/img/model1.jpg" class="d-block w-100" alt="empty..">
        </div>
        <div class="carousel-item">
            <img src="../assets/img/model2.jpg" class="d-block w-100" alt="empty..">
        </div>
        <div class="carousel-item">
            <img src="../assets/img/model3.jpg" class="d-block w-100" alt="empty..">
        </div>
        
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div> --}}
</div>
@endsection