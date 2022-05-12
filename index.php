<?php

#Game of Life
#Simone Zanda



include_once( "./Controllers/ControllerLife.php");
include_once("./Views/ViewGd.php");
include_once ("./Views/ViewConsole.php");


$controller = new ControllerLife();

## Vista gd
#symbol 0 = rectangle
#symbol 1 = rectanglefilled
#symbol 2 = circle
#symbol 3 = circlefilled 


$symbol='circlefilled';

$view = new ViewGD($controller,$symbol);



#Vista Console
#$view = new ViewConsole($controller);

?>
