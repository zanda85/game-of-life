<?php

#Game of Life
#Simone Zanda

include "./Controllers/ControllerLife.php";
include "./Views/ViewLife.php";


$controller = new ControllerLife();


#symbol 0 = rectangle
#symbol 1 = rectangle filled
#symbol 2 = circle
#symbol 3 = circle filled 

$symbol=2;
$view = new View($controller,$symbol);

?>
