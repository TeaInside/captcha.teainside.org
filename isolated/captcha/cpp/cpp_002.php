<?php


switch (rand(0, 0)) {
  case 0:
  $r = rand(0x11111111, 0x99999999);
  $cost1 = rand(20, 255);
  $cost2 = rand(20, 255);
  $min1 = rand(0, 5);
  $min2 = rand(0, 5);
  $rhex = dechex($r);
  $cost1hex = dechex($cost1);
  $cost2hex = dechex($cost2);
  $min1hex = dechex($min1);
  $min2hex = dechex($min2);
  $answer = "0x".substr($rhex, 0, 4).dechex($cost1 - $min1).dechex($cost2 - $min2);

$latex = <<<CODE
\\noindent arch:x86\_64
\begin{minted}{c++}
#include <stdint.h>
extern void rcall();
void rev() {
  volatile uint64_t w = 0x{$rhex};
  __asm__ volatile (
    "xor %%rdi,%%rdi; xor %%rsi,%%rsi;"
    "xor %%rdx,%%rdx; xor %%rcx,%%rcx;"
    "mov %0, %%rax; mov \$0x{$cost1hex},%%ah;"
    "mov \$0x{$cost2hex},%%al; sub \$0x{$min2hex},%%al;"
    "sub \$0x{$min1hex},%%ah; mov %%rax,%%rdi;"
    :: "r"(w));
  rcall();
}
\\end{minted}
Consider the actual definition of rcall is \\\\
accepting a single parameter with size \\\\
32 bit. What is the value being passed to \\\\
the first parameter of rcall in the above \\\\
code based on x86\_64 calling convention? \\\\
(answer in hexadecimal format with 0x \\\\ prefix!)
CODE;
    break;
  default:
    break;
}

$msg = "";

return [
    "id" => "0002",
    "est_time" => 600,
    "correct_answer" => $answer,
    "msg" => $msg,
    "latex" => $latex
];
