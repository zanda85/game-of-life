<?php



class Gd{

    //classe di supporto per la libreria Gd
    private $img;
    private $dim;
    

    public function create_img(int $x,int $y, int $dim_r){
        $this->dim=$dim_r;
        $this->img =imageCreate($x*$dim_r, $y*$dim_r);
        $this->back = imagecolorallocate($this->img , 255, 255, 255); // hex #FFFFFF
        $this->rect_color= imagecolorallocate($this->img,200, 1, 1);
        $this->name_img="life";
    }

    public function draw_reactangle(int $x1, int $y1, $color){
        $x1=$x1*$this->dim;
        $y1=$y1*$this->dim;
        imageRectangle($this->img, $x1, $y1, $x1+$this->dim, $y1+$this->dim, $color);
    }

    public function saveImage(){
        imagejpeg($this->img, "./media/img/".$this->name_img.".jpg");
    }

}

$bgobj= new Gd();
$bgobj->create_img(8,4,20);
$bgobj->draw_reactangle(0,0,$bgobj->rect_color);
$bgobj->draw_reactangle(1,0,$bgobj->rect_color);
$bgobj->draw_reactangle(2,0,$bgobj->rect_color);
$bgobj->draw_reactangle(2,1,$bgobj->rect_color);
$bgobj->saveImage();



$size_testo = 10;
$larghezza_testo = imagefontwidth($size_testo);
$altezza_testo = imagefontheight($size_testo);
$testo = "Creaimo un'immagine con le GD2 di PHP";
$larghezza = strlen($testo);
$larghezza_px = $larghezza_testo * $larghezza;
$img = imagecreate($larghezza_px + 10,$altezza_testo + 10);
$sfondo = imagecolorallocate($img, 0xC0, 0xC0, 0xC0);
$colore_testo = imagecolorallocate($img,0xF0,0xF0,0xF0);
imagestring($img,$size_testo,5,5,$testo,$colore_testo);
imagejpeg($img, "./media/img/img.jpg");
imagedestroy($img);
echo "<img src=\"./media/img/img.jpg\">";




?>