<?php

function factorial($n) {
if ($n > 1) {
return $n * factorial($n-1);
}
return $n;
}

switch (rand(0, 1)) {
    case 0:

        $b = rand(2, 15);
        $a = rand(2, 2000);

        $aFix = $a * 3 * $b;

        $latex = [
            '\left(\int\limits_{0}^{\infty} \frac{'.$aFix.'x}{e^x - 1} dx\right)',
            '\left(\int\limits_{0}^{\infty} '.$b.'\ln\left[\coth\left(\frac{t}{4}\right)\right] dt\right)^{-1}'
        ];

        // (pi^2/6)*(2/pi^2)*(3)*(a/b)
        // (integral from 0 to (infinity) ((3(x)/(e^x - 1)))dx) 
        // ((integral from 0 to (infinity) (ln(coth(t/4)))dt))

        shuffle($latex);
        $latex = implode("", $latex);
        $answer = $a;

        $msg = "Evaluate the following expression";
        break;
    case 1:
        $f = rand(2, 7);
        $factor = rand(1, 300);
        $fac = factorial($f);
        $answer = $fac * $factor;
        $gammaParam = $f + 1;

        $latex = '& \text{Calculate } \\\\
& \left(-\Gamma('.$gammaParam.')\gamma + '.$fac.'\sum_{k = 1}^{\infty} \left(\frac{1}{k} - \frac{1}{z + k}\right)\right)\frac{'.$factor.'}{\psi(z + 1)} \\\\
& \text{for } Re(z) > 0. \\\\
& \gamma \text{ denotes Euler-Mascheroni constant.}';

        $msg = "";
        break;
}

return [
    "id" => "0006",
    "est_time" => 600,
    "correct_answer" => $answer,
    "msg" => $msg,
    "latex" => $latex
];
