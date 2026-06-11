<?php
require __DIR__ . '/../vendor/autoload.php';

use Slim\Factory\AppFactory;
use App\Config\Database;
use App\Repositories\UsuarioRepository;
use App\Services\UsuarioService;
use App\Controllers\UsuarioController;

$app = AppFactory::create();

$controller = new UsuarioController(
    new UsuarioService(
        new UsuarioRepository(Database::getConnection())
    )
);

$app->get('/usuarios', [$controller, 'listar']);
$app->run();
