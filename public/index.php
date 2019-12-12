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
    <div class="carousel-inner carousel slide" data-ride="carousel">
        <div class="carousel-item active" data-interval="5000">
            <img class="d-block w-100" src="/bicycle-shop/public/images/slider/b1.png" alt="First slide">
            <div class="carousel-caption d-none d-md-block">
                <h1>Good Quality for Reasonable Price</h1>
                <p>Our bicycles are well maintained and are ready for biking.</p>
            </div>
        </div>
        <div class="carousel-item" data-interval="5000">
            <img class="d-block w-100" src="/bicycle-shop/public/images/slider/b2.png" alt="Second slide">
            <div class="carousel-caption d-none d-md-block">
                <h1>Big collection of bicycles</h1>
                <p>We have different types of bicycles for different kinds of activity and gender.</p>
            </div>
        </div>
        <div class="carousel-item" data-interval="5000">
            <img class="d-block w-100" src="/bicycle-shop/public/images/slider/b3.png" alt="Third slide">
            <div class="carousel-caption d-none d-md-block">
                <h1>Well Equipped</h1>
                <p>Each bicycle is equipped for a day or night cycling.</p>
            </div>
        </div>
        <div class="carousel-item" data-interval="5000">
            <img class="d-block w-100" src="/bicycle-shop/public/images/slider/b4.png" alt="Third slide">
            <div class="carousel-caption d-none d-md-block">
                <h1>Full Ecological Solution</h1>
                <p>Make the right choice for an ecological solution for transportation.</p>
            </div>
        </div>
        <div class="carousel-item" data-interval="5000">
            <img class="d-block w-100" src="/bicycle-shop/public/images/slider/b5.png" alt="Third slide">
            <div class="carousel-caption d-none d-md-block">
                <h1>Different styles</h1>
                <p> You can choose a bicycle that is fitting for your mood and preference for color.</p>
            </div>
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