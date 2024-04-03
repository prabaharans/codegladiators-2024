<?php
// Number of test cases
$T = readline();

while ($T--) {
    // Input for Paul
    list($P, $X, $R1) = explode(' ', readline());
    
    // Input for Nina
    list($N, $Y, $R2) = explode(' ', readline());
    
    // Calculate time taken by Paul and Nina
    $timePaul = $P / $X + $R1;
    $timeNina = $N / $Y + $R2;
    
    // Compare times and output the result
    if ($timePaul < $timeNina) {
        echo "PAUL\n" . (int)$timePaul . "\n";
    } elseif ($timeNina < $timePaul) {
        echo "NINA\n" . (int)$timeNina . "\n";
    } else {
        echo "BOTH\n" . (int)$timePaul . "\n";
    }
}