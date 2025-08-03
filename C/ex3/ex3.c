//faça a soma dos elementos de um vetor

#include <stdio.h>
#include <conio.h>
#include <locale.h>

int main()
{
    setlocale(LC_ALL, "pt_BR.UTF-8");
    int vet[4];
    int somavet;
    printf("digite o 1° número: ");
    scanf("%i", &vet[1]);
    printf("digite o 2° número: ");
    scanf("%i", &vet[2]);
    printf("digite o 3° número: ");
    scanf("%i", &vet[3]);
    printf("digite o 4° número: ");
    scanf("%i", &vet[4]);

    somavet = vet[1] + vet[2] + vet[3] + vet[4];

    printf("A soma dos itens do seu vetor é: %i", somavet);
    return 0;
}