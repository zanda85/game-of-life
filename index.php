<?php

#Game of Life
#Simone Zanda

include "./Controllers/ControllerLife.php";
include "./Views/ViewLife.php";


$controller = new ControllerLife();
$view = new View($controller);

?>
