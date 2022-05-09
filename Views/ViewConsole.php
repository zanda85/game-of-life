<?php

include_once("./Views/ViewLife.php");

class ViewConsole extends DefaultView{

#View Console

public function output_main()
{
    # Vista console
    
    for ($i = 0; $i <= $this->controller->r - 1; ++$i) {
        for ($j = 0; $j <= $this->controller->c - 1; ++$j) {
            echo $this->controller->matrix_cells[$i][$j];
        }
        echo "\n";
    }
}



}
?>