<?php
session_start();

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
    $email = trim($_POST['email'] ?? '');
    $senha = $_POST['senha'] ?? '';

    if (empty($email) || empty($senha)) {
        echo "Preencha todos os campos.";
        exit;
    }

    $stmt = $pdo->prepare("SELECT id, nome, senha FROM usuarios WHERE email = ?");
    $stmt->execute([$email]);
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($usuario && password_verify($senha, $usuario['senha'])) {

        $_SESSION['usuario_id'] = $usuario['id'];
        $_SESSION['usuario_nome'] = $usuario['nome'];
        header("Location: inicio.php");
    } else {
        echo "E-mail ou senha inválidos.";
    }
}
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Finance Flow</title>
  <link rel="stylesheet" href="../css/login.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet" />
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<body>

  <div class="container fade-in">
    <h1 class="title">Finance Flow</h1>
    <form method="POST" action="login.php">
      <input type="text" name="email" placeholder="Email" required />
      <input type="password" name="senha" placeholder="Senha" required />
      <button type="submit" class="btn">LOGIN</button>
      <a href="registro.php">Clique aqui para se registrar</a>
    </form>
  </div>

  <footer class="footer">
    TRANSFORME SUAS FINANÇAS. VISÃO CLARA. DECISÕES INTELIGENTES.
  </footer>
</body>
</html>
