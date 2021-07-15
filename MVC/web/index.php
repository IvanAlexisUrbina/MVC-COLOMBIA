<?php

include_once '../lib/helpers.php';
include_once '../view/partials/header.php';

include_once '../view/partials/modal.php';
include_once '../view/partials/footer.php';

echo "<body>";
    echo "<div class='container'>";
        include_once "../view/partials/navbar.php";
        	
        if(isset($_GET['modulo'])){
            resolve();
        }else{
            include_once '../view/partials/carrusel.php';
        }
    echo "</div>";

    // include_once '../view/partials/modal.php';
    // include_once '../view/partials/footer.php';
echo "</body>";
echo "</html>";

?>