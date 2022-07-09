<?php
error_reporting(0);

// count test
$tests = (int)readline();

// get words
for ($i = 0; $i < $tests; $i++) {
    $words[] = (string)readline();
}

//main
for ($i = 0; $i < count($words); $i++) {
    $readyWord = [];
    for ($a = 0; $a < strlen($words[$i]); $a++) {
        if ($words[$i][$a] != $words[$i][$a + 1]) {
            $readyWord[] = $words[$i][$a];
        } elseif ($words[$i][$a] == $words[$i][$a + 1] && $words[$i][$a] != $words[$i][$a + 2]) {
            $readyWord[] = $words[$i][$a];
        } elseif ($words[$i][$a] == $words[$i][$a + 1] && $words[$i][$a] == $words[$i][$a + 2]) {
            $repeat = 0;
            for ($c = $a; $c < strlen($words[$i]); $c++) {
                if ($words[$i][$c] == $words[$i][$c + 1]) {
                    $repeat += 1;
                } else {
                    break;
                }
            }
            $readyWord[] = $words[$i][$c];
            $readyWord[] = $repeat + 1;
            $a += $repeat;
        }
    }

    // output
    echo implode('', $readyWord) . PHP_EOL;
}
