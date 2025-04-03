<?php

require_once __DIR__ . "/../config/Database.php";

class CategoriaModel{

    private $conn;
    private $tabela= "categorias";

    public $id;
    public $nome;
    public $descricao;

    public function __construct(){
        $db = new Database();
        $this->conn = $db->conectar();
    }

    public function listar(){
        $query = "SELECT * FROM $this->tabela";

        $stmt = $this-> conn->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll();
    }

    public function buscarPorId($id){
        $query = "SELECT * FROM $this->tabela WHERE id= :id";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();

        return $stmt->fetch();
    }

    public function excluirPorId($id){
        $query= "DELETE FROM $this->tabela WHERE id= :id";
        $stmt= $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        $executado = $stmt->execute();

        if ($executado) {
            echo "Exclusão bem-sucedida!";
        } else {
            echo "Falha ao executar a exclusão.";
        }

        return $stmt->rowCount();
    }

    public function criar(){
        $query = "INSERT INTO $this->tabela (nome, descricao) VALUES (:nome, :descricao)";
        $stmt= $this->conn->prepare($query);
        $stmt->bindParam(":nome", $this->nome);
        $stmt->bindParam(":descricao", $this->descricao);

        $res = $stmt->execute();

        return $res ? true : false;
    }
    public function editar($categoria){
        $query = "UPDATE $this->tabela SET nome = :nome WHERE id = :id";
        $stmt= $this->conn->prepare($query);
        $stmt->bindParam(":id", $categoria["id"]);
        $stmt->bindParam(":nome", $categoria["nome"]);

        return $stmt->execute();
    }

    // public function buscarPorId($id){
    //     $indexCategoria= -1;
    //         $array_filtrado= array_filter(
    //             $this-> produtos,
    //             function ($produto, $index) use ($id, &$indexProduto){
    //                 if ($produto['id'] == $id){
    //                     $indexProduto= $index;
    //                     return $produto;
    //                 }
    //             },
    //             ARRAY_FILTER_USE_BOTH
    //         );
    // }
}