<?php

require_once __DIR__ . "/../config/Database.php";

class UsuarioModel{

    private $conn;
    private $tabela= "usuarios";

    public $id;
    public $nome;
    public $email;
    public $telefone;
    public $data_nascimento;


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

    public function criar($usuario){
        $query = "INSERT INTO $this->tabela (nome, email, telefone, data_nascimento) VALUES (:nome, :email, :telefone, :data_nascimento)";
        $stmt= $this->conn->prepare($query);
        $stmt->bindParam(":nome", $usuario["nome"]);
        $stmt->bindParam(":email", $usuario["email"]);
        $stmt->bindParam(":telefone", $usuario["telefone"]);
        $stmt->bindParam(":data_nascimento", $usuario["data_nascimento"]);

        $res = $stmt->execute();

        return $res ? true : false;
    }
    public function editar($produto){
        $query = "UPDATE $this->tabela SET nome = :nome, Descricao = :Descricao,:Preco = :Preco WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $produto["id"]);
        $stmt->bindParam(":nome", $produto["nome"]);
        $stmt->bindParam(":Descricao", $produto["Descricao"]);
        $stmt->bindParam(":Preco", $produto["Preco"]);
        
        return $stmt->execute();
    }

    public function deletar( $id ){
        $query = "DELETE FROM $this->tabela where id = :id";
 
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
 
        return $stmt->rowCount() >0;
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