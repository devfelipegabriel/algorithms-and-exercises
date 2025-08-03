//Armazenar números em vetor e imprimir na ordem correspondente

#include <stdio.h>
#include <conio.h>
#include <locale.h>

int main()
{
    setlocale(LC_ALL, "pt_BR.UTF-8");
    int vet[5];
    printf("Digite o 1° número: ");
    scanf("%i", &vet[1]);
    printf("Digite o 2° número: ");
    scanf("%i", &vet[2]);
    printf("Digite o 3° número: ");
    scanf("%i", &vet[3]);
    printf("Digite o 4° número: ");
    scanf("%i", &vet[4]);
    printf("Digite o 5° número: ");
    scanf("%i", &vet[5]);

    printf("Seu vetor foi organizado da seguinte forma: { %i, %i, %i, %i, %i } ", vet[1], vet[2], vet[3], vet[4], vet[5]);

    return 0;
}