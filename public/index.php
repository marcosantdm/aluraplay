<?php
// A função declare() é usada para definir diretivas de execução para o script.

declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

use Alura\Mvc\Controller\VideoListController;
use Alura\Mvc\Repository\VideoRepository;


// Armazena o caminho do banco de dados, facilitando a manutenção
$dbPath = __DIR__ . '/../banco.sqlite';
// Cria um banco de dados em memória
$pdo = new PDO("sqlite:$dbPath");

$videoRepository = new VideoRepository($pdo);

if (!array_key_exists('PATH_INFO', $_SERVER) || $_SERVER['PATH_INFO'] === '/') {
    $controller = new VideoListController($videoRepository);
    $controller->processaRequisicao();
} elseif ($_SERVER['PATH_INFO'] === '/novo-video') {
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        require_once __DIR__ . '/../formulario.php';
    } elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
        require_once __DIR__ . '/../novo-video.php';
    }
} elseif ($_SERVER['PATH_INFO'] === '/editar-video') {
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        require_once __DIR__ . '/../formulario.php';
    } elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
        require_once __DIR__ . '/../editar-video.php';
    }
} elseif ($_SERVER['PATH_INFO'] === '/remover-video') {
    require_once __DIR__ . '/../remover-video.php';
}
