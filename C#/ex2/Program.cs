using System;

namespace ex2
{
    class Program
    {
        static void Main(string[] args)
        {
            Console.WriteLine("Digite um número qualquer: ");
            int num = int.Parse(Console.ReadLine());
            if (num%2 == 0 && num > 0)
            {
                Console.WriteLine("O número escolhido é par e positivo");
            }
            else if (num%2 != 0 && num > 0)
            {
                Console.WriteLine("O número escolhido é ímpar e positivo");
            }
            else if (num%2 == 0 && num < 0)
            {
                Console.WriteLine("O número escolhido é par e negativo");
            }
            else
            {
                Console.WriteLine("O número escolhido é ímpar e negativo");
            }

            Console.ReadKey();
        }
    }
}
