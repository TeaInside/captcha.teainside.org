<?php

if (isset($checkAnswer)) {
    return is_numeric($answer) &&
        (((int)$answer) === $correctAnswer);
}

switch (rand(1, 1)) {
    case 1:
        $px = rand(-100, 100);
        $py = rand(-100, 100);
        if ($px === 0) {
            $px += 1;
        }
        if ($py === 0) {
            $py += 1;
        }
        $diameter = rand(1, 100);

        $tab = (-1 * (2 * $px));
        ($tab >= 0) and $tab = "+".$tab;
        $xequ = "x^{2} {$tab}x +".(pow($px, 2));

        $tab = (-1 * (2 * $py));
        ($tab >= 0) and $tab = "+".$tab;
        $yequ = "y^{2} {$tab}y +".(pow($py, 2));

        $fEqu = explode(" ", $xequ." +".$yequ);
        shuffle($fEqu);

        $num = -1 * $diameter;
        $fixEqu = "";
        foreach ($fEqu as $k => $v) {
            if (is_numeric($v)) {
                $num += (int)$v;
            } else {
                if (($v[0] !== "-") && ($v[0] !== "+")) {
                    $v = "+".$v;
                }
                $fixEqu .= $v;
            }
        }

        if ($num >= 0) {
            $num = "+".$num;
        }

        $answer = $diameter;
        $latex = trim($fixEqu, "+").$num."=0";
        $msg = "Find the diameter of the circle with the following equation!";
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
