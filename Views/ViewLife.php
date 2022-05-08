<?php





class bg
{

    private $img; // image
    private $dim; // width symbol 


    public function create_img(int $x, int $y, int $dim_r)
    {
        #create image 
        $this->dim = $dim_r; // width
        $this->img = imageCreate($x * $dim_r, $y * $dim_r);
        $this->back = imagecolorallocate($this->img, 255, 255, 255); //background color
        $this->rect_color = imagecolorallocate($this->img, 200, 1, 1); //symbol color
        $this->name_img = "life"; // image name file 
    }

    public function draw_rectangle(int $x1, int $y1, $color,int $fill=0)
    {
        $x1 = $x1 * $this->dim;
        $y1 = $y1 * $this->dim;

        #set $fill =1 to have filled rectangle 
        if($fill){
            imagefilledrectangle($this->img, $x1, $y1, $x1 + $this->dim, $y1 + $this->dim, $color);
        }else{
            imageRectangle($this->img, $x1, $y1, $x1 + $this->dim, $y1 + $this->dim, $color);
        } 
    }


    public function draw_ellipse(int $x1, int $y1, $color,int $fill=0)
    {
        $x1 = ($x1 * $this->dim)+$this->dim/2;
        $y1 = ($y1 * $this->dim)+$this->dim/2;

        #set $fill =1 to have filled rectangle 
        if($fill){
            imagefilledellipse($this->img, $x1, $y1,$this->dim/2, $this->dim/2, $color);
        }else{
            imageellipse($this->img, $x1, $y1,$this->dim/2, $this->dim/2, $color);
        }
    }


    public function saveImage()
    {
        imagejpeg($this->img, "./media/img/" . $this->name_img . ".jpg");
    }
}




class View
{

    
    private $controller;

    public function __construct($controller,$symbol)
    {
        $this->controller = $controller;

        #
        #View gd
        $this->outputbg($symbol);

        #View console
        #$view->output();

    }

    public function outputbg(int $mode)
    {

        #vista gd
        $bgobj = new bg();
        //create image
        $bgobj->create_img(C, R, 20);

        // create symbols
        for ($i = 0; $i <= R - 1; ++$i) {
            for ($j = 0; $j <= C - 1; ++$j) {
                if ($this->controller->matrix_cells[$i][$j] == "*") {
                    switch ($mode) {
                        case '0':
                            #mode 0 = rectangle
                            $bgobj->draw_rectangle($j, $i, $bgobj->rect_color,0);
                            break;
                        case '1':
                            #mode 0 = rectangle
                            $bgobj->draw_rectangle($j, $i, $bgobj->rect_color,1);
                            break;
                        case '2':
                            #mode 0 = rectangle
                            $bgobj->draw_ellipse($j, $i, $bgobj->rect_color,0);
                            break;
                        case '3':
                            #mode 0 = rectangle
                            $bgobj->draw_ellipse($j, $i, $bgobj->rect_color,1);
                            break;
                        
                        default:
                            # code...
                            $bgobj->draw_ellipse($j, $i, $bgobj->rect_color,1);
                            break;
                    }
                    
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
