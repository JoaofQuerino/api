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

$app->get('/usuarios', [$controller, 'listar']);

$app->get('/usuarios/{id}',
    [$controller, 'buscar']
);

$app->post('/usuarios',
    [$controller, 'inserir']
);

$app->put('/usuarios/{id}',
    [$controller, 'atualizar']
);

$app->delete('/usuarios/{id}',
    [$controller, 'excluir']
);

$app->run();