<?php

function factorial($n) {
    if ($n > 1) {
        return $n * factorial($n-1);
    }
    return $n ? $n : 1;
}

$msg = "";
switch (rand(0, 1)) {
    case 0:
        $a = rand(4, 10);
        $p = rand(1, 2000);
        $answer = $p + (factorial($a)/4);
        $latex = ' & \text{Calculate } \\\\
 & '.$p.' + \int\limits_{0}^{1} \frac{\ln^2(1 + x) \Gamma('.($a + 1).')}{x \operatorname{Li}_3(1)} dx';
        break;
    case 1:
        // Ref: https://math.stackexchange.com/questions/402937/proof-of-sum-n-1-infty-frac1n4-binom2nn-frac17-pi43240
        $a = rand(2, 100);
        $answer = $a * 17;
        $latex = ' & \text{Calculate } \\\\
 & \frac{'.($a * 36).'}{\zeta(4)}\sum_{n = 1}^{\infty} \frac{1}{n^4 \binom{2n}{n}}';
        break;
}

return [
    "id" => "0009",
    "est_time" => 600,
    "correct_answer" => $answer,
    "msg" => $msg,
    "latex" => $latex
];
