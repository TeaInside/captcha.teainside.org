<?php


switch (rand(0, 0)) {
  case 0:
  $strn = rstr(4, "ABCDEFG");
  $cost1 = bin2hex(strrev(substr($strn, -2)));
  $cost2 = rand(16, 255);
  $cost3 = rand(16, 255);
  $answer = "0x".$cost1.dechex($cost3).dechex($cost2);
$latex = <<<CODE
\\noindent arch:x86\_64,format:nasm
\begin{lstlisting}
   xor rax, rax
   mov eax, "{$strn}"
   mov al, {$cost2}
   mov ah, {$cost3}
\\end{lstlisting}
What is the latest value of \\\\
eax? (answer in hexadecimal)
CODE;
    
    break;
  
  default:
    break;
}

$msg = "Write the answer of the following problem in hexadecimal with 0x prefix!";

return [
    "id" => "0001",
    "est_time" => 600,
    "correct_answer" => $answer,
    "msg" => $msg,
    "latex" => $latex
];
