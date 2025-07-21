using System;

namespace ex4
{
    class Program
    {
        static void Main(string[] args)
        {
            Console.WriteLine("Insira o dia atual (usando somente números; ex: 1, 2...): ");
            int dia_atual = Convert.ToInt32(Console.ReadLine());
            
            Console.WriteLine("Insira o mês atual (usando somente números; ex: 6): ");
            int mes_atual = Convert.ToInt32(Console.ReadLine());

            Console.WriteLine("Insira o ano atual (usando somente números): ");
            int ano_atual = Convert.ToInt32(Console.ReadLine());

            Console.WriteLine("Insira o dia do seu nascimento (usando somente números): ");
            int dia_nasc = Convert.ToInt32(Console.ReadLine());

            Console.WriteLine("Insira o mês do seu nascimento (usando somente números; ex: 3): ");
            int mes_nasc = Convert.ToInt32(Console.ReadLine());

            Console.WriteLine("Insira o ano do seu nascimento (usando somente números): ");
            int ano_nasc = Convert.ToInt32(Console.ReadLine());

            if((dia_nasc == 29) && (mes_nasc == 2))
            {
                dia_nasc = 1;
                mes_nasc = 3;
            }

            if(mes_atual > mes_nasc)
            {
                Console.WriteLine("Você tem " + (ano_atual - ano_nasc) + " Anos");
            }
            else if(mes_atual < mes_nasc)
            {
                Console.WriteLine("Você tem " + ((ano_atual - ano_nasc) - 1) + " Anos");
            }

            else if(mes_atual == mes_nasc)
            {
                if(dia_atual >= dia_nasc)
                {
                Console.WriteLine("Você tem " + (ano_atual - ano_nasc) + " Anos");
                }

                Console.WriteLine("Você tem " + ((ano_atual - ano_nasc) - 1) + " Anos");
            }       
            else
            {
                Console.WriteLine("Error");
            }
            
        }
        
    }
}
