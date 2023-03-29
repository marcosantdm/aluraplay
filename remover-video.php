<?php

// Armazena o caminho do banco de dados, facilitando a manutenção
$dbPath = __DIR__ . '/banco.sqlite';

// Cria um banco de dados em memória
$pdo = new PDO("sqlite:$dbPath");

$id = $_GET['id'];
$sql = 'DELETE FROM videos WHERE id = ?';

$statement = $pdo->prepare($sql);
$statement->bindValue(1, $id);

if ($statement->execute() === false) {
    header('Location: /?sucesso=0');
} else {
    header('Location: /?sucesso=1');
}
