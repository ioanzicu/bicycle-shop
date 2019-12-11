<?php require_once '../private/initialize.php'; ?>

<?php include SHARED_PATH . '/public_header.php'; ?>

<?php $super_hero_image = 'main.jpg'; ?>


<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>

    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="d-block w-100" src="/bicycle-shop/public/images/slider/b1.png" alt="First slide">
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="/bicycle-shop/public/images/slider/b2.png" alt="Second slide">
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="/bicycle-shop/public/images/slider/b3.png" alt="Third slide">
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="/bicycle-shop/public/images/slider/b4.png" alt="Third slide">
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="/bicycle-shop/public/images/slider/b5.png" alt="Third slide">
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>

<?php include SHARED_PATH . '/public_footer.php'; ?>