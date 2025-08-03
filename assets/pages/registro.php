<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$host = 'sql210.infinityfree.com';
$dbname = 'if0_39622143_financeflow';
$user = 'if0_39622143';
$pass = 'KPRyDbVeOxx1MhG';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro de conexão: " . $e->getMessage());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = trim($_POST['usuario'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $senha = $_POST['senha'] ?? '';
    $confirma_senha = $_POST['confirma_senha'] ?? '';

    if (empty($nome) || empty($email) || empty($senha) || empty($confirma_senha)) {
        echo "Por favor, preencha todos os dados.";
    }

    if ($senha !== $confirma_senha) {
        echo "As senhas não coincidem.";
    }

    $stmt = $pdo->prepare("SELECT id FROM usuarios WHERE email = ?");
    $stmt->execute([$email]);

    if ($stmt->rowCount() > 0) {
        echo "E-mail já cadastrado.";
    }

    $senha_hash = password_hash($senha, PASSWORD_DEFAULT);
    $stmt = $pdo->prepare("INSERT INTO usuarios (nome, email, senha) VALUES (?, ?, ?)");

    if ($stmt->execute([$nome, $email, $senha_hash])) {
        echo "Cadastro realizado com sucesso!";
    } else {
        echo "Erro ao cadastrar usuário.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Finance Flow</title>
  <link rel="stylesheet" href="../css/registro.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet" />
</head>
<body>

  <div class="container fade-in">
    <h1 class="title">Finance Flow</h1>
    <form method="POST" action="">
      <input name="usuario" type="text" placeholder="Usuário" required />
      <input name="email" type="email" placeholder="Email" required />
      <input name="senha" type="password" placeholder="Senha" required />
      <input name="confirma_senha" type="password" placeholder="Confirmar senha" required />
      <button type="submit" class="btn">Registrar</button>
      <a href="login.php">Já tem registro? Clique para entrar</a>
    </form>
  </div>

  <footer class="footer">
    TRANSFORME SUAS FINANÇAS. VISÃO CLARA. DECISÕES INTELIGENTES.
  </footer>
</body>
</html>
