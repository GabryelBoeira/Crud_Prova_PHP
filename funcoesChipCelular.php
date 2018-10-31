<?php
require_once "conexao.php";

function salvarChip($chip)  {  
    $conn = conectar();

    $stmt = $conn->prepare('INSERT INTO chip (nome, marca, fabricante, numSerie, valor ,qtde, descricao)
            VALUES(:nome, :marca, :fabricante, :numSerie, :valor, :qtde, :descricao)');

    $stmt->bindParam(':nome',$chip['nome']);
    $stmt->bindParam(':marca',$chip['marca']);
    $stmt->bindParam(':fabricante',$chip['fabricante']);
    $stmt->bindParam(':numSerie',$chip['numSerie']);
    $stmt->bindParam(':valor',$chip['valor']);
    $stmt->bindParam(':qtde',$chip['qtde']);
    $stmt->bindParam(':descricao',$chip['descricao']);
   
    if ($stmt->execute()){
        return "Chip inserido com sucesso!";
    } else {
        print_r($stmt->errorInfo());
        return "erro! ";
    }
}

function listarChips() {
    $conn = conectar();

    $stmt = $conn->prepare("select id, nome, marca, fabricante, numSerie, valor, qtde, descricao from chip order by nome");
    $stmt->execute();
    $retorno = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $retorno;}

function buscarChip($id) {
    $conn = conectar();

    $stmt = $conn->prepare("select id, nome, marca, fabricante, numSerie, valor, qtde, descricao from chip where id = :id");
    $stmt->bindParam(':id',$id);

    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function editarChip($chip){
    $conn = conectar();

    $stmt = $conn->prepare('update chip set nome = :nome, marca = :marca, fabricante = :fabricante, numSerie = :numSerie , valor = :valor,qtde = :qtde, descricao = :descricao where id = :id');
    
    $stmt->bindParam(':id',$chip['id']);
    $stmt->bindParam(':nome',$chip['nome']);
    $stmt->bindParam(':marca',$chip['marca']);
    $stmt->bindParam(':fabricante',$chip['fabricante']);
    $stmt->bindParam(':numSerie',$chip['numSerie']);
    $stmt->bindParam(':valor',$chip['valor']);
    $stmt->bindParam(':qtde',$chip['qtde']);
    $stmt->bindParam(':descricao',$chip['descricao']);

    if ($stmt->execute()){
        return "Chip alterado com sucesso!";
    } else {
        print_r($stmt->errorInfo());
        return "erro! ";
    }
}

function excluirChip($id) {
    $conn = conectar();

    $stmt = $conn->prepare('delete from chip where id = :id');
    $stmt->bindParam(':id',$id);
    if ($stmt->execute()){
        return "Chip excluído com sucesso!";
    } else {
        print_r($stmt->errorInfo());
        return "erro! ";
    }
}

?>