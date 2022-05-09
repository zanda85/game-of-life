<?php

#Game of Life
#Simone Zanda

include "./Controllers/ControllerLife.php";
include "./Views/ViewLife.php";


$controller = new ControllerLife();

## Vista gd
#symbol 0 = rectangle
#symbol 1 = rectanglefilled
#symbol 2 = circle
#symbol 3 = circlefilled 


$symbol='circle';
$view = new ViewGD($controller,$symbol);



#Vista Console
#$view = new ViewConsole($controller);

?>
