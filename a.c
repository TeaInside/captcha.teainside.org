#include <stdio.h>
int main() {
  int x;
  char wqz[5] = "GEBF";
  x = *((int *)wqz);
  ((char *)&x)[0] = 77;
  ((char *)&x)[1] = 215;
  printf("%#x\n", x);
  return 0;
}