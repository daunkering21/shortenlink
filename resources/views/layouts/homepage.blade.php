<div id="carouselExampleCaptions" class="carousel slide">
    <img src="../assets/img/ldlp02.jpg" class="d-block w-100 shadow mb-3" alt="kosong">
    <div class="carousel-caption d-none d-md-block ">
        <h5 class="mb-3"><span class="text-purple bold">Shorten the links, simplify your life!</span></h5>
        <form action="/" method="POST">
            @csrf
            <div class="d-inline-flex gap-2">
                <input class="form-control form-control-lg text-center" type="text" id="url" name="url" placeholder='" your links here... "'>
                <button type="submit" class="btn btn-warning"><span class="text-purple bold">SNAP!!</span></button>
            </div>
        </form>
    </div>
</div>

<div class="row m-5">
    <div class="col">
        <div class="card" style="width: 18rem;">
            <img src="../assets/img/" style="width:200px;" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card" style="width: 18rem;">
            <img src="..." style="width:200px;" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
    </div>
</div>

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
</div>