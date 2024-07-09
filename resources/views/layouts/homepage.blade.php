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