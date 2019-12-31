<?php

if (isset($checkAnswer)) {
    return is_numeric($answer) &&
        (((int)$answer) === $correctAnswer);
}

switch (rand(1, 3)) {
    case 1:
        $varList = ["x", "y", "z", "t", "u"];
        $varList2 = ["\\alpha", "\\beta", "\\gamma", "\\theta", "\\pi", "e"];

        // Get first bound variable.
        $varB1 = array_rand($varList2);
        $tmp = $varList2[$varB1];
        unset($varList2[$varB1]);
        $varB1 = $tmp;

        // Get second bound variable.
        $varB2 = array_rand($varList2);
        $tmp = $varList2[$varB2];
        unset($varList2[$varB2]);
        $varB2 = $tmp;

        $mul1 = rand(1, 100) * 4;
        $upB1 = rand(0, 1) ? rand(-300, -1) : rand(1, 300);
        $lwB1 = $upB1 - $mul1;
        $upB1 > 0 and $upB1 = "+".$upB1;
        $lwB1 > 0 and $lwB1 = "+".$lwB1;
        $upB1 == 0 and $upB1 = "";
        $lwB1 == 0 and $lwB1 = "";

        $mul2 = rand(1, 100);
        $upB2 = rand(0, 1) ? rand(-300, -1) : rand(1, 300);
        $lwB2 = $upB2 - $mul2;
        $upB2 > 0 and $upB2 = "+".$upB2;
        $lwB2 > 0 and $lwB2 = "+".$lwB2;
        $upB2 == 0 and $upB2 = "";
        $lwB2 == 0 and $lwB2 = "";

        $varE1 = array_rand($varList);
        $tmp = $varList[$varE1];
        unset($varList[$varE1]);
        $varE1 = $tmp;

        $varE2 = array_rand($varList);
        $tmp = $varList[$varE2];
        unset($varList[$varE2]);
        $varE2 = $tmp;

        $varE3 = array_rand($varList);
        $tmp = $varList[$varE3];
        unset($varList[$varE3]);
        $varE3 = $tmp;

        $inExpr = [
            "\\sin(".$varE1.")",
            ["\\frac{".$varE1."^{3}}{\pi^{4}}", "\\pi^{-4} ".$varE1."^{3}"][rand(0, 1)]
        ];
        shuffle($inExpr);

        $latex = "\\int_{".$varB2.$lwB2."}^{".$varB2.$upB2."} \\int_{".$varB1.$lwB1."}^{".$varB1.$upB1."} \\int_{\\pi}^{2\\pi} (".implode("+", $inExpr).") d".$varE1." d".$varE2." d".$varE3;
        $answer = $mul1 * $mul2 * (7/4);
        $msg = "Integrate";
        break;

    case 2:
        $answer = rand(1, 500);
        $latex = '\frac{'.$answer.' \cdot \ln(e^{x})}{\sqrt{3} \cdot x} \sqrt{{\int_{0}^{\infty} -t^{4} e^{-t} dt} \cdot {\int_{\pi}^{2\pi} \tan(x) \cos(x) dx}}';
        $answer *= 4;
        $msg = "Evaluate";
        break;

    case 3:
        $answer = "e";
        $latex = "\\lim_{n \\to \\infty} {(1 + \\frac{1}{n})}^{n}";
        $msg = "Evaluate";
        break;

    default:
        break;
}

$msg = "{$msg} the following expression!";

return [
    "id" => "0005",
    "est_time" => 600,
    "correct_answer" => $answer,
    "msg" => $msg,
    "latex" => $latex
];
