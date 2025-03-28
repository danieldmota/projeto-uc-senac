<?php

require_once __DIR__ . "/../config/Database.php";

class CategoriaModel{

    private $conn;
    private $tabela= "categorias";

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