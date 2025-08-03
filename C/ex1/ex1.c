//Leia um número e informe se ele é par ou ímpar

#include <stdio.h>
#include <conio.h>
#include <locale.h>

int main()
{
    setlocale(LC_ALL,"pt_BR.UTF-8");

    int num;
    printf("Digite um número: ");
    scanf ("%i", &num);

    if (num % 2 == 0) printf("O número %i é par", num);

    else printf("O número %i é ímpar", num);

    return 0;
}