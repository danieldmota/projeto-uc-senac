<?php

require_once __DIR__ . "/../config/Database.php";

class ProdutoModel{

    private $conn;
    private $tabela= "produtos";

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
}
//     public function buscarPorId($id){
//         $indexProduto= -1;

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

//         return $array_filtrado[$indexProduto];
//     }

//     public function inserir($nome, $descricao, $categoria, $preco, $imagem){
//         $query = "INSERT INTO $this->produtos (nome, descricao, categoria, preco, imagem)
//         VALUES (:nome, :ano, :descricao, :imagem)";
//         $stmt = $this->pdo->prepare($query);
//         $stmt->bindParam(":nome", $nome);
//         $stmt->bindParam(":ano", $descricao);
//         $stmt->bindParam(":descricao", $categoria);
//         $stmt->bindParam(":descricao", $preco);
//         $stmt->bindParam(":imagem", $imagem);
//         $stmt->execute();

//         return $stmt->rowCount() > 0;

//     }

//     public function editar($id, $nome, $descricao, $categoria, $preco, $imagem){
//         $query= "UPDATE $this->produtos SET nome= :nome, ano= :ano, descricao= :descricao, imagem= :imagem WHERE id= :id";
//         $stmt= $this->pdo->prepare($query);
//         $stmt->bindParam(":id", $id, PDO::PARAM_INT);
//         $stmt->bindParam(":nome", $nome);
//         $stmt->bindParam(":ano", $descricao);
//         $stmt->bindParam(":descricao", $categoria);
//         $stmt->bindParam(":descricao", $preco);
//         $stmt->bindParam(":imagem", $imagem);
//         $stmt->execute();

//         return $stmt->rowCount() > 0;
//     }
// }
?>