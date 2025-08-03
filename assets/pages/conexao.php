<?php
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
?>