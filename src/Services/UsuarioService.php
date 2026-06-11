<?php
namespace App\Services;
use App\Repositories\UsuarioRepository;

class UsuarioService {
    private UsuarioRepository $repo;
    public function __construct(UsuarioRepository $repo){ $this->repo = $repo; }
    public function listar(){ return $this->repo->listar(); }
}
