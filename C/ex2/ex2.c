//Faça uma calculadora em C

#include <stdio.h>
#include <conio.h>
#include <locale.h>
float calculadora(char op, float num1, float num2)
{
    float resultado;
    if (op == '+') 
    {
        resultado = num1 + num2; 
    }

    else if (op == '-') 
    {
        resultado = num1 - num2; 
    }

    else if (op == '*') 
    {
        resultado = num1 * num2; 
    }

    else if (op == '/') 
    {
        resultado = num1 / num2; 
    }

    return resultado;
}

int main()
{
    setlocale(LC_ALL, "pt_BR.UTF-8");
    char op;
    float num1, num2;

    printf ("Escolha o primeiro número:\n");
    scanf("%f", &num1);

    printf ("Escolha o segundo número:\n");
    scanf("%f", &num2);

    printf ("Escolha a operação (+ , - , * , / ):\n");
    scanf("%s", &op);

    float resultado = calculadora(op, num1, num2);

    printf ("O resultado é: %.1f ", resultado);

    return 0;


}