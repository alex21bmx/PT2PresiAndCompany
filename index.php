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
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
</head>
<body>
    <header>
      <?php require_once("extra/header.php"); ?>
    </header>
    <div id="content">
        <div id="fotoBenvinguda">
        <figure class="snip1477">
            <div class="title">
                <div>
                <h2>WELCOME TO TRAVEL</h2>
                <h4>INSPedralbes</h4>
                </div>
            </div>
            <figcaption>
                <p>Esto es una puta mierda de presentacion asquerosa impuesta</p>
            </figcaption>
            <a href="#"></a>
        </div>
        <div id="experiencies">
            <?php
                if(isset($_COOKIE["username"])){
                    echo "Logged";
                }else{
                    require_once("experiencies.php");
                }
            ?>
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

    $(".hover").mouseleave(
        function () {
            $(this).removeClass("hover");
    });
</script>
</html>