<?php


switch (rand(0, 0)) {
  case 0:
  $strn = rstr(4, "ABCDEFG");
  $cost1 = bin2hex(strrev(substr($strn, -2)));
  $cost2 = rand(16, 255);
  $cost3 = rand(16, 255);
  $answer = "0x".$cost1.dechex($cost3).dechex($cost2);
$latex = <<<CODE
\\noindent arch:x86\_64
\begin{minted}{c++}
#include <stdio.h>
#include <stdint.h>
int main() {
  uint32_t x;
  char wqz[5] = "{$strn}";
  x = *((uint32_t *)wqz);
  ((char *)&x)[0] = {$cost2};
  ((char *)&x)[1] = {$cost3};
  printf("%#x\\n", x);
  return 0;
}
\\end{minted}
What is the output?
CODE;
    
    break;
  
  default:
    break;
}


// $msg = "";

return [
    "id" => "0001",
    "est_time" => 300,
    "correct_answer" => $answer,
    "msg" => $msg,
    "latex" => $latex
];
