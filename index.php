<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REALLY?</title>
    <link rel="stylesheet" href="css/estils.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
    <link rel="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
</head>
<body>
    <header>
      <?php require_once("extra/header.php"); ?>
    </header>
    <div id="content">
        <div id="fotoBenvinguda">
            <h1 id="textIndex"></h1>
        </div>
        <div id="experiencies">
            <div>
                <!--<h2>THE MOST WONDERFUL FUNCKING TRAVELS<h2>-->
                <div class="slider owl-carousel">
                    <div class="item">
                        <img id="fotoPost" src="./src/foto1.jpg" alt="">
                        <div class="slider-caption">
                            <h4>Sahara</h4>
                            <p>Alex - Fucking Vic</p>
                        </div>
                    </div>
                    <div class="item">
                        <img id="fotoPost" src="./src/foto2.jfif" alt="">
                        <div class="slider-caption">
                            <h4>Sahara</h4>
                            <p>Sergio - The Caramelo</p>
                        </div>
                    </div>
                    <div class="item">
                        <img id="fotoPost" src="./src/foto3.jpg" alt=""> 
                        <div class="slider-caption">
                            <h4>Sahara</h4>
                            <p>Arnau - Bdn Cuchillos</p>
                        </div>
                    </div>
                    <div class="item">
                        <img id="fotoPost" src="./src/foto1.jfif" alt="">
                        <div class="slider-caption">
                            <h4>Sahara</h4>
                            <p>Alvaro - Br</p>
                        </div>
                    </div>
                </div>
            <?php require_once("experiencies.php"); ?>
        </div>
    </div>
    <footer>
      <?php require_once("extra/footer.php"); ?>
    </footer>
</body>
<!-- JQUERY link -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!--OWL CAROUSEL JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

<script>
    $(document).ready(function(){
        $(".slider").owlCarousel({
            center: true,
            autoWidth: true,
            loop: true,
            nav: true,
            navSpeed: 1500,
            autoplay: true,
            autoplaySpeed: 1500,
            autoplayTimeout: 3000
        });

        $(".owl-prev").html('<i class="fa fa-chevron-left"></i>');
        $(".owl-next").html('<i class="fa fa-chevron-right"></i>');
    });
</script>
</html>