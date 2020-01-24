<?php




switch (rand(1, 1)) {
    case 1:


        $answer = rand(-30, 30);
        $expt = $answer ** 3;

        $costA = 3628800;
        $costB = 40320;
        $fcA = $costA - $expt;
        $fcB = $costB - $expt;

        $latex = <<<LATEX
\\sqrt[3]{\\ln\\left(
\\sum_{a = 1}^{\\infty} 
  \\left(
    \\int_{0}^{\\infty} \\frac{x^{a - 1}
            \\exp\\left(-x\\left(\\Gamma(11) - {$fcA}\\right)^{-1}\\right)
     }{
         \\left(\\Gamma(8) - {$fcB}\\right)
         \\left((a - 1)!\\right)^{2}
    }\\;dx
  \\right)
\\right)}
LATEX;
		$msg = "Evaluate this expression!";
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
