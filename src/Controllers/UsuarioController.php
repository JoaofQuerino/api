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

public function buscar($request, $response, $args)
{
    $dados = $this->service->buscar($args['id']);

    $response->getBody()->write(
        json_encode($dados)
    );

    return $response->withHeader(
        'Content-Type',
        'application/json'
    );
}

public function inserir($request, $response)
{
    $dados = $request->getParsedBody();

    $this->service->inserir($dados);

    $response->getBody()->write(
        json_encode(["mensagem"=>"Usuário cadastrado"])
    );

    return $response->withHeader(
        'Content-Type',
        'application/json'
    );
}

public function atualizar($request, $response, $args)
{
    $dados = $request->getParsedBody();

    $this->service->atualizar(
        $args['id'],
        $dados
    );

    $response->getBody()->write(
        json_encode(["mensagem"=>"Usuário atualizado"])
    );

    return $response->withHeader(
        'Content-Type',
        'application/json'
    );
}

public function excluir($request, $response, $args)
{
    $this->service->excluir(
        $args['id']
    );

    $response->getBody()->write(
        json_encode(["mensagem"=>"Usuário removido"])
    );

    return $response->withHeader(
        'Content-Type',
        'application/json'
    );
}