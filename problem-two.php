<?php
  /* Read input from STDIN. Print your output to STDOUT*/
  $fp = fopen('php://stdin', 'r');
  //Write code here


// Read input
$N = intval(trim(fgets(STDIN)));
$weights = array_map('intval', explode(' ', trim(fgets(STDIN))));

// Count occurrences of each weight
$weightCount = array_count_values($weights);

$maxTeams = 0;

// Iterate through possible total weights
for ($s = 2; $s <= 2 * $N; $s++) {
    $teams = 0;
    for ($i = 1; $i < $s / 2; $i++) {
        if (isset($weightCount[$i]) && isset($weightCount[$s - $i])) {
            if ($i == $s - $i) {
                $teams += floor($weightCount[$i] / 2);
            } else {
                $teams += min($weightCount[$i], $weightCount[$s - $i]);
            }
        }
    }
    $maxTeams = max($maxTeams, $teams);
}

$out = fopen('php://stdout', 'w'); //output handler
fputs($out, $maxTeams); //writing output operation
fclose($out); //closing handler
?>
