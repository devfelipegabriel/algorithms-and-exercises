<?php
session_start();
require 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $tipo = $_POST['tipo'] ?? '';
    $descricao = $_POST['descricao'] ?? '';
    $valor = $_POST['valor'] ?? '';
    $data = $_POST['data'] ?? '';
    $usuario_id = $_SESSION['usuario_id'] ?? null;

    if (!$usuario_id) {
        die("Usuário não autenticado.");
    }

    if (empty($descricao) || empty($valor)) {
        die("Preencha todos os campos.");
    }

    try {
        $stmt = $pdo->prepare("INSERT INTO transacoes (tipo, descricao, valor, data, usuario_id) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$tipo, $descricao, $valor, $data, $usuario_id]);

        header("Location: inicio.php");
        exit;
    } catch (PDOException $e) {
        die("Erro ao salvar transação: " . $e->getMessage());
    }

} else {
    header("Location: inicio.php");
    exit;
}
?>
