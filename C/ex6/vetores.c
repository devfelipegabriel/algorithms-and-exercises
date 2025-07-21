//sistema de votação usando vetor

#include <stdio.h>
#include <conio.h>
#include <locale.h>

int main()
{

    setlocale(LC_ALL, "pt_BR.UTF-8");

    int candidato[5] = {0, 0, 0, 0, 0};
    int voto;
    char op;

    votar:

    printf("Escolha um candidato para votar:\n1- João\n2- Pedro\n3- Luciana\n4- Marcos\n5- Maria\n");
    scanf("%i", &voto);

    if (voto == 1)
    candidato[0]++;

    else if (voto == 2)
    candidato[1]++;

    else if (voto == 3)
    candidato[2]++;
    
    else if (voto == 4)
    candidato[3]++;

    else if (voto == 5)
    candidato[4]++;

    printf("Deseja votar novamente? (S/s)\n");
    scanf(" %c", &op);

    if(op == 's' || op == 'S')
    {
        goto votar;
    }

    goto encerrar;

    encerrar:

    printf("Os resultados são:\n1- João = %i votos\n2- Pedro = %i votos\n3- Luciana = %i votos\n4- Marcos = %i votos\n5- Maria = %i votos\n", candidato[0], candidato[1], candidato[2], candidato[3], candidato[4]);
}