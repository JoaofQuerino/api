<?php
namespace App\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use App\Services\UsuarioService;

class UsuarioController {
    private UsuarioService $service;
    public function __construct(UsuarioService $service){ $this->service = $service; }

    public function listar(Request $request, Response $response){
        $response->getBody()->write(json_encode($this->service->listar()));
        return $response->withHeader('Content-Type','application/json');
    }
}
