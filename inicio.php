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
                <p><strong>Tarta Personalizada</strong></p>
                <p>Elige el sabor y decoracion que quieras para <br>una ocasión especial, con extra de amor dedicación, <br>puede tener tanto obleas como figuras de <br>fondant como toppers personalizados</p>
                <p><strong>30 ~ 50 €</strong></p>
            </div>
            <img class="card-img" src="static/img/Personalizada_Chef.jpeg" alt="">
        </div>

        <div class="masVendidasCaja">
            <div id="descripcionTecnica">
                <p><strong>Tarta de Almendra</strong></p>
                <p>La conocida tarta con bizcocho de almendra, <br>recubierta con yema tostada y merengue caramelizado</p>
                <p><strong>16 €</strong></p>
            </div>
            <img class="card-img" src="static/img/Tarta_Almendra.jpeg" alt="">
        </div>

        <div class="masVendidasCaja">
            <div id="descripcionTecnica">
                <p><strong>Tarta Sacher</strong></p>
                <p>Deliciosa tarta con cobertura de chocolate y <br>mermelada de albaricoque en el centro, receta <br>del norte de europa con un sabor unico</p>
                <p><strong>16 €</strong></p>
            </div>
            <img class="card-img" src="static/img/Tarta_Sacher.jpeg" alt="">
        </div>

        <div class="masVendidasCaja">
            <div id="descripcionTecnica">
                <p><strong>Tarta de la Abuela</strong></p>
                <p>La tarta que conoces de toda la vida, con base <br>de galleta tostada, magdalenas y chocolate</p>
                <p><strong>16 €</strong></p>
            </div>
            <img class="card-img" src="static/img/Tarta_de_la_Abuela.jpeg" alt="">
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
