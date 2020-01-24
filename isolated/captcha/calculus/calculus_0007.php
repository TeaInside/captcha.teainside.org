<?php




switch (rand(1, 1)) {
    case 1:

        $cost = rand(-100, 100);
        $answer = $cost / 2;
        $div = rand(2, 11);
        $cost *= $div;

        $epx = [
            "\\left(\\sum_{n = 0}^{\\infty} \\frac{x^{n}}{\\Gamma(n + 1)}\\right)"
        ][rand(0, 0)];

        $latex = "\\frac{".$cost."}{".$div."} \\int_{0}^{1} \\left( ".$epx." \\frac{\\sin(x)}{e(\\sin(1) - \\cos(1)) + 1} \\right) dx";

        break;
    default:
        break;
}

return [
    "id" => "0006",
    "est_time" => 600,
    "correct_answer" => $answer,
    "msg" => $msg,
    "latex" => $latex
];
