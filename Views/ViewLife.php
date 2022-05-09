<?php





class Defaultbg
{
    #classe di default per creare l'immagine 

    public $img; // image
    public $dim; // width symbol 


    public function __construct(int $x, int $y, int $dim_r){

        $this->create_img($x,$y,$dim_r);
    }

    public function create_img(int $x, int $y, int $dim_r)
    {
        #create image 
        $this->dim = $dim_r; // width
        $this->img = imageCreate($x * $dim_r, $y * $dim_r);
        $this->back = imagecolorallocate($this->img, 255, 255, 255); //background color
        $this->rect_color = imagecolorallocate($this->img, 200, 1, 1); //symbol color
        $this->name_img = "life"; // image name file 
    }

    public function saveImage()
    {
        imagejpeg($this->img, "./media/img/" . $this->name_img . ".jpg");
    }
}


class rectangle extends Defaultbg{

    #class symbol rectangle
    public function draw_symbol(int $x1, int $y1, $color){
        $x1 = $x1 * $this->dim;
        $y1 = $y1 * $this->dim;

        
        imageRectangle($this->img, $x1, $y1, $x1 + $this->dim, $y1 + $this->dim, $color);
        

    }


}

class rectanglefilled extends Defaultbg{

    #class symbol rectanglefilled
    public function draw_symbol(int $x1, int $y1, $color){
        $x1 = $x1 * $this->dim;
        $y1 = $y1 * $this->dim;

        imagefilledrectangle($this->img, $x1, $y1, $x1 + $this->dim, $y1 + $this->dim, $color);
       

    }


}

class circle extends Defaultbg{

    #class symbol circle
    public function draw_symbol(int $x1, int $y1, $color){
        $x1 = ($x1 * $this->dim)+$this->dim/2;
        $y1 = ($y1 * $this->dim)+$this->dim/2;

        imageellipse($this->img, $x1, $y1,$this->dim/2, $this->dim/2, $color);
        
    }


}

class circlefilled extends Defaultbg{

    #class symbol circlefilled
    public function draw_symbol(int $x1, int $y1, $color){
        $x1 = ($x1 * $this->dim)+$this->dim/2;
        $y1 = ($y1 * $this->dim)+$this->dim/2;

        imagefilledellipse($this->img, $x1, $y1,$this->dim/2, $this->dim/2, $color);
       
    }


}




class View{

    #class default View

    protected $controller;

    public function __construct($controller){
        $this->controller = $controller;

        $this->output_main();
    }

    public function output_main(){

    }
    
}




class ViewGD extends View
{

    #class gd library 
    public function __construct($controller,$symbol)
    {
        $this->controller = $controller;

        #
        #View gd
        $this->output_main_symbol($symbol);

       

    }

    public function output_main_symbol(string $mode)
    {

        #vista gd
        #factory della classe
        $bgobj = new $mode(C, R, 20);
       

        // create symbols
        for ($i = 0; $i <= R - 1; ++$i) {
            for ($j = 0; $j <= C - 1; ++$j) {
                if ($this->controller->matrix_cells[$i][$j] == "*") {
                    $bgobj->draw_symbol($j, $i, $bgobj->rect_color);
                    
                }
            }
        }

        //save image in a folder
        $bgobj->saveImage();

        //display image
        echo "<img src=\"./media/img/" . $bgobj->name_img . ".jpg\">";
    }

}



class ViewConsole extends View{

    #View Console



    public function output_main()
    {
        # Vista console
        
        for ($i = 0; $i <= R - 1; ++$i) {
            for ($j = 0; $j <= C - 1; ++$j) {
                echo $this->controller->matrix_cells[$i][$j];
            }
            echo "\n";
        }
    }



}