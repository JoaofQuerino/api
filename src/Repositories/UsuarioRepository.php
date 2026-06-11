<?php
namespace App\Repositories;
use PDO;

class UsuarioRepository {
    private PDO $pdo;
    public function __construct(PDO $pdo){ $this->pdo = $pdo; }

    public function listar(){
        return $this->pdo->query("SELECT * FROM usuarios")->fetchAll(PDO::FETCH_ASSOC);
    }
}
