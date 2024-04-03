<?php
  /* Read input from STDIN. Print your output to STDOUT*/
  //$fp = fopen('php://stdin', 'r');
  //Write code here
  $contents = file_get_contents("php://stdin");

  function getEstHours($value, $m) {
    if(!$value) return false;
    $arr = explode(' ', $value);
    $d = $arr[0];
    $s = $arr[1];
    $delay = $arr[2];
    if($m == 'p') {
      if($d < 1) return false;
      if($s < 1) return false;
      if($delay < 0) return false;
    } else if($m == 'n') {
      if($d > pow(10,4)) return false;
      if($s > pow(10,4)) return false;
      if($delay > 100) return false;
    }
    if($d >= $s) return (($d/$s)+$delay);
    return false;
  }

  $arrContents = explode("\n", $contents);
  $loop = array_shift($arrContents);
  $arr = array_chunk($arrContents, 2);
  $res = [];
  foreach($arr as $k => $v) {
    $paul = getEstHours($v[0], 'p');
    $nina = getEstHours($v[1], 'n');
    if($paul && $nina) {
      if($paul == $nina) {
        $res[] = 'BOTH';
        $res[] = $paul;
      } else if($paul < $nina) {
        $res[] = 'PAUL';
        $res[] = $paul;
      } else if($paul > $nina) {
        $res[] = 'NINA';
        $res[] = $nina;
      }
    }
  }

  $result = ($res) ? implode("\n",$res) : '';
  $out = fopen('php://stdout', 'w'); //output handler
  fputs($out, $result); //writing output operation
  fclose($out); //closing handler
?>
