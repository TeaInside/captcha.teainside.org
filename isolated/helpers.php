<?php

/**
 * @param int     $n
 * @param ?string $e
 * @return string
 */
function rstr(int $n = 32, ?string $e = null): string
{
  if (is_null($e)) {
    $e = "qwertyuiopasdfghjklzxcvbnmQWETYUIOPASDFGHJKLZXCVBNM1234567890";
  }

  $c = strlen($e) - 1;
  $r = "";
  $n = abs($n);
  for ($i=0; $i < $n; $i++) { 
    $r .= $e[rand(0, $c)];
  }
  return $r;
}
