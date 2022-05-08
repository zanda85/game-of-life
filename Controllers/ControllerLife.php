<?php


define('path_file_pattern', './data/initial_struct.csv');



class ControllerLife
{

  // control of life 

  public $matrix_cells = [];

  function __construct()
  {
    //get pattern matrix
    $this->get_pattern();

    //generate new lifw
    $this->newGeneration();
  }


  public function get_pattern()
  {
    //map csv to array
    $this->matrix_cells = array_map('str_getcsv', file(path_file_pattern));
    $maxR = sizeof($this->matrix_cells); //number of rows in the pattern
    $maxC = sizeof($this->matrix_cells[0]); //number of columns in the pattern
    define('R', $maxR);
    define('C', $maxC);
    
  }

  public function set_pattern()
  {
    // Open a file in write mode ('w')
    $fp = fopen(path_file_pattern, 'w');

    // Loop through file pointer and a line
    foreach ($this->matrix_cells as $fields) {
      fputcsv($fp, $fields);
    }

    fclose($fp);
  }


  public function newGeneration()
  {

    // Nuova Generazione
    $newMatrix = [];

    foreach ($this->matrix_cells as $widthId => $width) {
      $newMatrix[$widthId] = [];
      foreach ($width as $heightId => $height) {
        $count = $this->countAdjacentCells($widthId, $heightId);
        if ($height == "*") {
          // The cell is alive.
          if ($count < 2 || $count > 3) {
            // Any live cell with less than two or more than three neighbours dies.
            $height = ".";
          } else {
            // Any live cell with exactly two or three neighbours lives.
            $height = "*";
          }
        } else {
          if ($count == 3) {
            // Any dead cell with three neighbours lives.
            $height = "*";
          }
        }

        $newMatrix[$widthId][$heightId] = $height;
      }
    }
    $this->matrix_cells = $newMatrix;
    unset($newMatrix); //

  }

  public function countAdjacentCells($x, $y)
  {
    $coordinatesArray = [
      [-1, -1], [-1, 0], [-1, 1],
      [0, -1], [0, 1],
      [1, -1], [1, 0], [1, 1]
    ];

    $count = 0;

    foreach ($coordinatesArray as $coordinate) {
      if (
        isset($this->matrix_cells[$x + $coordinate[0]][$y + $coordinate[1]])
        && $this->matrix_cells[$x + $coordinate[0]][$y + $coordinate[1]] == "*"
      ) {
        $count++;
      }
    }
    return $count;
  }
}
