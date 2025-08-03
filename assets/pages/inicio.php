<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
if (!isset($_SESSION['usuario_id'])) {
  header("Location: login.php");
  exit;
}
require_once 'conexao.php';

$usuario_id = $_SESSION['usuario_id'];

$receita = $pdo->prepare("SELECT SUM(valor) FROM transacoes WHERE tipo = 'receita' AND usuario_id = ?");
$receita->execute([$usuario_id]);
$total_receita = $receita->fetchColumn() ?? 0;

$despesa = $pdo->prepare("SELECT SUM(valor) FROM transacoes WHERE tipo = 'despesa' AND usuario_id = ?");
$despesa->execute([$usuario_id]);
$total_despesa = $despesa->fetchColumn() ?? 0;

$saldo = $total_receita - $total_despesa;

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Dashboard | FinanceFlow</title>
  <link rel="stylesheet" href="../css/inicio.css" />
  <script src="../script/inicio.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
  <header>
    <h1>FinanceFlow</h1>
    <nav>
      <a href="#D">Dashboard</a>
      <a href="#T">Transações</a>
      <a href="#Di">Dicas</a>
      <a href="logout.php">Sair</a>
    </nav>
  </header>

  <main class="container">

    <section class="resumo">
      <div class="card saldo">
        <h2>Saldo Atual</h2>
        <p>R$ <?= number_format($saldo, 2, ',', '.') ?></p>
      </div>
      <div class="card receita">
        <h2>Receitas</h2>
        <p>R$ <?= number_format($total_receita, 2, ',', '.') ?></p>
      </div>
      <div class="card despesa">
        <h2>Despesas</h2>
        <p>R$ <?= number_format($total_despesa, 2, ',', '.') ?></p>
      </div>
    </section>

    <section class="nova-transacao">
      <h2>Adicionar Receita</h2>
      <form action="processar_transacao.php" method="POST">
        <input type="hidden" name="tipo" value="receita">

        <label for="descricao_r">Descrição:</label>
        <input type="text" id="descricao_r" name="descricao" required>

        <label for="valor_r">Valor (R$):</label>
        <input type="number" step="0.01" id="valor_r" name="valor" required>

        <button type="submit">Adicionar Receita</button>
      </form>
    </section>

    <section class="nova-transacao">
      <h2>Adicionar Despesa</h2>
      <form action="processar_transacao.php" method="POST">
        <input type="hidden" name="tipo" value="despesa">

        <label for="descricao_d">Descrição:</label>
        <input type="text" id="descricao_d" name="descricao" required>

        <label for="valor_d">Valor (R$):</label>
        <input type="number" step="0.01" id="valor_d" name="valor" required>

        <button type="submit">Adicionar Despesa</button>
      </form>
    </section>

    <section class="grafico">
      <h2>Resumo Visual</h2>
      <canvas id="grafico"></canvas>
    </section>

    <section class="dicas">
      <h2>Dicas de Finanças</h2>
      <ul>
        <li>Evite gastos desnecessários e registre tudo.</li>
        <li>Tenha uma reserva de emergência.</li>
        <li>Use o FinanceFlow diariamente para acompanhar seu progresso.</li>
      </ul>
    </section>
  </main>

  <script>
  const totalReceita = <?= $total_receita ?>;
  const totalDespesa = <?= $total_despesa ?>;

  const ctx = document.getElementById('grafico').getContext('2d');
  new Chart(ctx, {
    type: 'doughnut',
    data: {
      labels: ['Receitas', 'Despesas'],
      datasets: [{
        label: 'Valores',
        data: [totalReceita, totalDespesa],
        backgroundColor: ['#00b894', '#d63031'],
        borderWidth: 1
      }]
    },
    options: {
      responsive: true,
      plugins: {
        legend: {
          position: 'bottom'
        }
      }
    }
  });
</script>

</body>
</html>
