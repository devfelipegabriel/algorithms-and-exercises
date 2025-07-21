//Sistema de votação

using System;

namespace ex5
{
    class Program
    {
        static void Main(string[] args)
        {
            string res;
            int[] cand = new int[5];
            int op;

            votação:
                Console.WriteLine("1- Júlia\n2- Pedro\n3- João\n4- Maria\n5- Márcio\n\nEscolha o candidato:");
                op = int.Parse(Console.ReadLine());
                switch(op)
                {
                    case 1:
                    cand[0]++;
                    break;

                    case 2:
                    cand[1]++;
                    break;

                    case 3:
                    cand[2]++;
                    break;

                    case 4:
                    cand[3]++;
                    break;

                    case 5:
                    cand[4]++;
                    break;

                    default: 
                    Console.WriteLine("Opcão inválida");
                    goto votação;
                }

                pergunta:                
                Console.WriteLine("Deseja Votar novamente? (S/s N/n)");
                res = Console.ReadLine();

                if (res == "n" || res == "N")
                goto encerrar;
                else if (res == "S" || res == "s")
                goto votação;
                else
                {
                    Console.WriteLine("Por favor, insira um valor válido...");
                    goto pergunta;
                }

                encerrar:
                Console.WriteLine("Resultados Finais:\n1- Júlia: {0} votos\n2- Pedro: {1} votos\n3- João: {2} votos\n4- Maria: {3} votos\n5- Márcio: {4} votos/n ", cand[0], cand[1],cand[2],cand[3],cand[4]);

        }
    }
}
