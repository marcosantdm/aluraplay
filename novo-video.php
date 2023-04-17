<?php

// Armazena o caminho do banco de dados, facilitando a manutenção

use Alura\Mvc\Entity\Video;
use Alura\Mvc\Repository\VideoRepository;

$dbPath = __DIR__ . '/banco.sqlite';

// Cria um banco de dados em memória
$pdo = new PDO("sqlite:$dbPath");

$url = filter_input(INPUT_POST, 'url', FILTER_VALIDATE_URL);
if ($url === false) {
    header('Location: /?sucesso=0');
    exit;
}
$titulo = filter_input(INPUT_POST, 'titulo');
if ($titulo === false) {
    header('Location: /?sucesso=0');
    exit;
}

$repository = new VideoRepository($pdo);

if (
    $repository->add(new Video($url, $titulo)) === false
) {
    header('Location: /?sucesso=0');
} else {
    header('Location: /?sucesso=1');
}
