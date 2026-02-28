<?php
$css = "inicio";
require_once("templates/header.php");
?>

<div class="carousel">
    <div class="carousel-track">
        <div class="slide">
            <img src="static/img/placeholder1.jpg" alt="">
            <div class="overlay"></div>
        </div>
        <div class="slide">
            <img src="static/img/placeholder2.jpg" alt="">
            <div class="overlay"></div>
        </div>
        <div class="slide">
            <img src="static/img/placeholder3.png" alt="">
            <div class="overlay"></div>
        </div>
    </div>

    <div class="carousel-text">
        <h1>Bienvenido a Tartas Yoveia</h1>
        <p>Este texto no se mueve con las slides</p>
    </div>

    <button class="btn prev"><i class="fa-solid fa-circle-chevron-left"></i></button>
    <button class="btn next"><i class="fa-solid fa-circle-chevron-right"></i></button>
</div>

<script src="carousel.js"></script>

<div class="page-content">

    <h1 class="titulos"><i class="fa-solid fa-cake-candles"></i> LAS MAS VENDIDAS <i class="fa-solid fa-cake-candles"></i></h1>

    <div class="masVendidas-lista">

        <div class="masVendidasCaja">
            <div id="descripcionTecnica">
                <p><strong>Nombre de tarta</strong></p>
                <p>Descripcion brebe sobre la tarta <br>a poder ser de varias lineas</p>
                <p>Icono ya sea gluten free o sin azucar</p>
                <p><strong>Precio en €</strong></p>
            </div>
            <img class="card-img" src="static/img/placeholder3.png" alt="">
        </div>

        <div class="masVendidasCaja">
            <div id="descripcionTecnica">
                <p><strong>Nombre de tarta</strong></p>
                <p>Descripcion brebe sobre la tarta <br>a poder ser de varias lineas</p>
                <p>Icono ya sea gluten free o sin azucar</p>
                <p><strong>Precio en €</strong></p>
            </div>
            <img class="card-img" src="static/img/placeholder3.png" alt="">
        </div>

        <div class="masVendidasCaja">
            <div id="descripcionTecnica">
                <p><strong>Nombre de tarta</strong></p>
                <p>Descripcion brebe sobre la tarta <br>a poder ser de varias lineas</p>
                <p>Icono ya sea gluten free o sin azucar</p>
                <p><strong>Precio en €</strong></p>
            </div>
            <img class="card-img" src="static/img/placeholder3.png" alt="">
        </div>

        <div class="masVendidasCaja">
            <div id="descripcionTecnica">
                <p><strong>Nombre de tarta</strong></p>
                <p>Descripcion brebe sobre la tarta <br>a poder ser de varias lineas</p>
                <p>Icono ya sea gluten free o sin azucar</p>
                <p><strong>Precio en €</strong></p>
            </div>
            <img class="card-img" src="static/img/placeholder3.png" alt="">
        </div>

    </div>

    <hr>

    <div class="menuMapa">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3133.4543936775194!2d-0.8149081884413183!3d38.24576617175315!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd63b98ed91a4f47%3A0xe0cf464da95e95fa!2sTartas%20Yoveia!5e0!3m2!1ses!2ses!4v1769585244629!5m2!1ses!2ses"
            allowfullscreen=""
            loading="lazy"
            referrerpolicy="no-referrer-when-downgrade">
        </iframe>
        <div class="textoMapa">
            <h2><i class="fa-solid fa-location-dot" style="color: #ff6fbe;"></i> DONDE ENCONTRARNOS <i class="fa-solid fa-location-dot" style="color: #ff6fbe"></i></h2>
            <p>Mariano Benlliure, 3</p>
            <p>Crevillent</p>
        </div>
    </div>

</div>

<?php
require_once("templates/footer.php");
?>
