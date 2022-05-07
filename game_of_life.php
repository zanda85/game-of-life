<?php

include "./Controllers/ControllerLife.php";
include "./Views/ViewLife.php";
$controller = new ControllerLife();
$view = new View($controller);

//View bg
echo $view->outputbg();

//View console
//echo $view->output();

//after view set pattern file
$controller->set_pattern();

?>