<?php

switch (rand(1, 1)) {
    case 1:
        $cost = rand(-10000, 10000);
        $answer = $cost / 2;
        $div = rand(2, 100);
        $cost *= $div;
        $dcost = "\\left(".$cost."\\right)";
        $dqx = [
            [
                "\\left(\\sum_{n = 0}^{\\infty} \\frac{x^{n}}{\\Gamma(n + 1)}\\right)",
                $dcost
            ],
            [
                "",
                $dcost." \\left(\\sinh(1) + \\cosh(1)\\right)^{x}"
            ],
        ][rand(0, 1)];

        $rne = "\\left(e\\,(\\sin(1) - \\cos(1)) + 1\\right)";
        $sinx = [
            [["\\sin(2x)", "\\sec(x)"], "\\left(".(2 * $div)."\\right)"]
        ][rand(0, 0)];

        if (is_array($sinx[0])) {
            shuffle($sinx[0]);
            $sinx[0] = implode("", $sinx[0]);
        }

        $num = [$dqx[1], $sinx[0]];
        $denom = [$sinx[1], $rne];
        shuffle($num);
        shuffle($denom);
        $num = implode("", $num);
        $denom = implode("", $denom);
        $latex = "\\int_{0}^{1}\\left(".$dvd.$dqx[0]."\\frac{".$num."}{".$denom."} \\right) dx";
        $msg = "Evaluate the following expression!";
        break;
    default:
        break;
}

return [
    "id" => "0007",
    "est_time" => 600,
    "correct_answer" => $answer,
    "msg" => $msg,
    "latex" => $latex
];
