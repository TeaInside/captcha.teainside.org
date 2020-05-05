#include <stdio.h>
#include <stdint.h>
int main() {
  uint32_t x;
  char wqz[5] = "CFEE";
  x = *((uint32_t *)wqz);
  ((char *)&x)[0] = 21;
  ((char *)&x)[1] = 46;
  printf("%#x\n", x);
  return 0;
}