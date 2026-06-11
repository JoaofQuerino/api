<?php
namespace App\Services;
use App\Repositories\UsuarioRepository;

class UsuarioService {
    private UsuarioRepository $repo;
    public function __construct(UsuarioRepository $repo){ $this->repo = $repo; }
    public function listar(){ return $this->repo->listar(); }
}

public function buscar($id)
{
    return $this->repo->buscar($id);
}

public function inserir($dados)
{
    return $this->repo->inserir($dados);
}

public function atualizar($id, $dados)
{
    return $this->repo->atualizar($id, $dados);
}

public function excluir($id)
{
    return $this->repo->excluir($id);
}