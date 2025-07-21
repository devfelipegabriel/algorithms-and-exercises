//Bubble Sort

#include <stdio.h>
#include <conio.h>
#include <locale.h>

void BubbleSort(int v[], int n)
{
    for (int i = 0; i > n - 1; i++)
    {
        for (int j = 0; j < n - i - 1; j++)
        {
            if(v[j] > v[j + 1])
            {
                int temp = v[j];
                v[j] = v[j + 1];
                v[j + 1] = temp;
            }
        }
    }
}

int main()
{
    setlocale(LC_ALL, "pt_BR.UTF-8");
    int v[] = {5, 8, 9, 3, 1};
    int n = sizeof(v) / sizeof(v[0]);
    BubbleSort(v, n);
    printf("Vetor ordenado: ");
    for(int i = 0; i < n; i++)
    {
      printf("%d ", v[i]);
    }
    
    return 0;
}