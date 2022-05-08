<?php





class bg
{



    private $img;
    private $dim;


    public function create_img(int $x, int $y, int $dim_r)
    {
        $this->dim = $dim_r;
        $this->img = imageCreate($x * $dim_r, $y * $dim_r);
        $this->back = imagecolorallocate($this->img, 255, 255, 255);
        $this->rect_color = imagecolorallocate($this->img, 200, 1, 1);
        $this->name_img = "life";
    }

    public function draw_rectangle(int $x1, int $y1, $color)
    {
        $x1 = $x1 * $this->dim;
        $y1 = $y1 * $this->dim;
        imageRectangle($this->img, $x1, $y1, $x1 + $this->dim, $y1 + $this->dim, $color);
    }

    public function saveImage()
    {
        imagejpeg($this->img, "./media/img/" . $this->name_img . ".jpg");
    }
}




class View
{

    
    private $controller;

    public function __construct($controller)
    {
        $this->controller = $controller;
    }

    public function outputbg()
    {

        #vista gd

        $bgobj = new bg();
        //create image
        $bgobj->create_img(C, R, 20);


        // create reactangle
        for ($i = 0; $i <= R - 1; ++$i) {
            for ($j = 0; $j <= C - 1; ++$j) {
                if ($this->controller->matrix_cells[$i][$j] == "*") {
                    $bgobj->draw_rectangle($j, $i, $bgobj->rect_color);
                }
            }
        }

        //save image in a folder
        $bgobj->saveImage();

        //display image
        echo "<img src=\"./media/img/" . $bgobj->name_img . ".jpg\">";
    }


    public function output()
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
