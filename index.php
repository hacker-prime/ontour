<?php 

require_once "book.php";

// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     // Something posted
  
//     if (isset($_POST['airport_form'])) {
//       echo "The airport form was selected";
//     } elseif(isset($_POST['tour_form'])) {
//       echo "The tour form was selected";
//     }
//   }

// if (isset($_POST['airport_form'])) {
//     echo "The airport form was selected!";
// } elseif (isset($_POST['tour_form'])) {
//     echo "The tour form was selected!";
// }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="title" content="On Tour Vacations - Jamaica’s Leading Tour and Transportation provider">
    <meta name="description"
        content="On Tour offers transportation and destination support services , reservations and exciting excursions: Blue Mountain, Bob Marley, Jeep & Sea adventures, Horse Back riding , Dunn’s River Falls, Black River Safari, Historical & Cultural tours and music events. Our large fleet of vehicles range from Cars and Small Buses to large coaches, all fully air-conditioned.">
    <title>On Tour Vacations ☀️🚌⛱️</title>
    <link rel="stylesheet" href="assets/css/index.css" />
    <link rel="stylesheet" href="assets/css/form.css" />
    <link rel="stylesheet" href="assets/css/image_slider.css" />
    <!-- <link rel="stylesheet" href="assets/css/loadingscreen.css" /> -->
    <link rel="icon" href="assets/images/logo.jpeg">
</head>

<body style="height:100%" ontouchstart="touchStart(event)" ontouchmove="touchMove(event)" ontouchend="touchEnd()">

    <?php 

        // require_once "loadingscreen.php";
        require_once "signin/handlers/config.php"; 

        require_once "navigation.php";

    ?>

    <section class="airport" id="airport">

        <?php 
    
        require_once('airport_form.php');

        require_once('image_slider.php');

    ?>

    </section>

    <section class="tourstransfer" id="tourstransfer">

        <?php 
    
        require_once('tours_form.php');

        require_once('image_slider_2.php');

    ?>

    </section>

    <section id="alltours">

        <?php 
    
        require_once('alltours.php');

    ?>

    </section>

    <section id="contact" style="height:0vh;">

        <?php 
        
            require_once('footer/footer.html');

        ?>

    </section>

    <!-- <script src="assets/javascript/loadingscreen.js"></script> -->
    <script src="assets/javascript/index.js"></script>
    <script src="assets/javascript/form.js"></script>
    <script src="assets/javascript/image_slider.js"></script>
    <!--===== SCROLL REVEAL =====-->
    <script src="https://unpkg.com/scrollreveal"></script>
    <!--===== SCROLL REVEAL =====-->


    <script>
    function showFullText(button, text) {
        // var fullText = element.dataset.text;
        // alert(fullText);
        // console.log(text);
        var cardText = button.previousElementSibling;
        var ellipsis = cardText.nextElementSibling;

        // var cardText = document.getElementById("card_text");
        cardText.innerHTML = text;

        // var ellipsis = document.getElementById("card_text_ellipsis");
        var readMoreButton = document.getElementById("read_more_button");
        ellipsis.style.display = "none";
        // readMoreButton.style.display = "none";
    }
    </script>


</body>

</html>