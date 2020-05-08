#include <stdint.h>
extern void rcall();
void rev() {
  volatile uint64_t w = 0x6deadd93;
  __asm__ volatile (
    "xor %%rdi,%%rdi; xor %%rsi,%%rsi;"
    "xor %%rdx,%%rdx; xor %%rcx,%%rcx;"
    "mov %0, %%rax; mov $0xd0,%%ah;"
    "mov $0xa2,%%al; sub $0x5,%%al;"
    "sub $0x1,%%ah; mov %%rax,%%rdi;"
    :: "r"(w));
  rcall();
}

int main()
{
  rev();
}
// 

//echo 