<?php

#Game of Life
#Simone Zanda




include "./Controllers/ControllerLife.php";
include "./Views/ViewLife.php";
$controller = new ControllerLife();
$view = new View($controller);

#View gd
echo $view->outputbg();

#View console, decomentare per vedere l'output in debug console 
#echo $view->output();

//after view set pattern file
$controller->set_pattern();

?>
