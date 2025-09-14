<?php

function mysqlConnect()
{
  $db_host = "sql204.infinityfree.com";
  $db_username = "if0_39202567";
  $db_password = "x215KRU8PN";
  $db_name = "if0_39202567_ppi";

  $options = [
    PDO::ATTR_EMULATE_PREPARES => false, 
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    // Adicione esta linha:
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC // Define o padrão de busca para array associativo
  ];

  try {
    $pdo = new PDO("mysql:host=$db_host;dbname=$db_name;charset=utf8mb4", $db_username, $db_password, $options);
    return $pdo;
  } 
  catch (Exception $e) {
    exit('Ocorreu uma falha na conexão com o MySQL: ' . $e->getMessage());
  }
}
?>