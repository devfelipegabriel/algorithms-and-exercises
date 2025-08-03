using System;

namespace log_programação
{
    class Program
    {
        static void Main(string[] args)
        {
            Console.WriteLine("Digite o valor de A: ");
            int num_a = int.Parse(Console.ReadLine());
            
            Console.WriteLine("Digite o valor de B: ");
            int num_b = int.Parse(Console.ReadLine());

            Console.WriteLine("Agora digite o valor de C: ");
            int num_c = int.Parse(Console.ReadLine()); 
            int soma = num_a + num_b;

            Console.WriteLine("A soma de A + B é: " + soma);
            if (soma > num_c)
            {
                Console.WriteLine("A soma de A + B é Maior do que C");
            }
            else
            {
                Console.WriteLine("A soma de A + B é menor do que C");
            }

            Console.ReadKey();
        }
    }
}
