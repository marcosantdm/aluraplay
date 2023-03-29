<?php

// Armazena o caminho do banco de dados, facilitando a manutenção
$dbPath = __DIR__ . '/banco.sqlite';

// Cria um banco de dados em memória
$pdo = new PDO("sqlite:$dbPath");

$pdo->exec('CREATE TABLE videos (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    url TEXT,
    title TEXT);');
