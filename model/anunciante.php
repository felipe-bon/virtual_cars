<?php

class Anunciante {
    private $id;
    private $nome;
    private $cpf;
    private $email;
    private $senhaHash;
    private $telefone;

    static function createAnunciante($pdo, $nome, $cpf, $email, $senhaHash, $telefone) {
        $sql = <<<SQL
            INSERT INTO Anunciante (nome, cpf, email, senhaHash, telefone) 
            VALUES (?, ?, ?, ?, ?)
            SQL;

        $stmt = $pdo -> prepare($sql);
        $stmt->execute([$nome, $cpf, $email, $senhaHash, $telefone]);


        header("Content-Type: application/json; charset=utf-8");
        return $pdo->lastInsertId();
    }

    static function checkUserCredentials($pdo, $email, $senha)
    {
      $sql = <<<SQL
        SELECT senhaHash
        FROM Anunciante
        WHERE email = ?
        SQL;
    
      try {
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$email]);
        $senhaHash = $stmt->fetchColumn();
    
        if (!$senhaHash) 
          return false; // a consulta não retornou nenhum resultado (email não encontrado)
    
        if (!password_verify($senha, $senhaHash))
          return false; // email e/ou senha incorreta
          
        // email e senha corretos
        return true;
      } 
      catch (Exception $e) {
        exit('Falha inesperada: ' . $e->getMessage());
      }
    }

    // static function loginAnunciante($pdo, $email, $senhaHash) {
    //     $sql = <<<SQL
    //         SELECT * FROM Anunciante 
    //         WHERE email = ? AND senhaHash = ?
    //     SQL;
        
    //     $stmt = $pdo -> prepare($sql);
    //     $stmt->execute([$email, $senhaHash]);

    //     echo json_encode($stmt->fetch(PDO::FETCH_ASSOC));
    //     header("content-type: application/json; charset=utf-8");

    //     return $stmt->fetch(PDO::FETCH_ASSOC);
    // }

}