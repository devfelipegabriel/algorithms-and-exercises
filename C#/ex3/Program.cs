using System;

namespace ex3
{
    class Program
    {
        static void Main(string[] args)
        {
            Console.WriteLine("Digite o valor de A: ");
            int num_a = int.Parse(Console.ReadLine());

            Console.WriteLine("Digite o valor de B: ");
            int num_b = int.Parse(Console.ReadLine());

            int num_c;
            if(num_a == num_b)
            {
                num_c = num_a + num_b;
                Console.WriteLine("O valor de C é: " + num_c);
            }

            else
            {
                num_c = num_a * num_b;
                Console.WriteLine("O valor de C é: " + num_c);
            }

            Console.ReadKey();
        }
    }
}
