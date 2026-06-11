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
public function buscar($id)
{
    $stmt = $this->pdo->prepare(
        "SELECT * FROM usuarios WHERE id = ?"
    );
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

public function inserir($dados)
{
    $stmt = $this->pdo->prepare(
        "INSERT INTO usuarios(nome,email)
         VALUES (?,?)"
    );

    return $stmt->execute([
        $dados['nome'],
        $dados['email']
    ]);
}

public function atualizar($id, $dados)
{
    $stmt = $this->pdo->prepare(
        "UPDATE usuarios
         SET nome=?, email=?
         WHERE id=?"
    );

    return $stmt->execute([
        $dados['nome'],
        $dados['email'],
        $id
    ]);
}

public function excluir($id)
{
    $stmt = $this->pdo->prepare(
        "DELETE FROM usuarios
         WHERE id=?"
    );

    return $stmt->execute([$id]);
}