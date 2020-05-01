<?php

function factorial($n) {
    if ($n > 1) {
        return $n * factorial($n-1);
    }
    return $n ? $n : 1;
}

switch (rand(0, 0)) {
    case 0:
        $a = rand(4, 10);
        $p = rand(1, 2000);
        $answer = $p + (factorial($a)/4);
        $latex = ' & \text{Calculate } \\\\
 & '.$p.' + \int\limits_{0}^{1} \frac{\ln^2(1 + x) \Gamma('.($a + 1).')}{x \operatorname{Li}_3(1)} dx';
        break;
}

return [
    "id" => "0009",
    "est_time" => 600,
    "correct_answer" => $answer,
    "msg" => $msg,
    "latex" => $latex
];
