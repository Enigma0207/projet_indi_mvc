<?php
require_once "./views/inc/header.php";
?>

<div class="container">
    <div>
        <div class="mypositionRelative position-relative">
            <div id="myCarousel1" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src=" ./views/assets/img/panneau1t.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="./views/assets/img/panneau2.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="./views/assets/img/c3.jpg" class="d-block w-100" alt="...">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div>
        <h2>Comprendre les panneaux</h2>
        <p>Tout ce qui est en rapport aavec les obligation <br> les interdictions <br> les obligations </p>
        <hr>
        <h2>Agglomération et or agglomération</h2>
        <p>Comprendre les règles de priorité, les marcages au sol et autres</p>
        <hr>
        <h2>AutoRoute</h2>
        <p>Règle de depassement par la gauche <br> insersion sur autoRoute <br> voie de sortie </p>
        <hr>
    </div>
</div>
<?php include_once "./views/inc/footer.php"; ?>