<?php

require_once "../db/conexaoMysql.php";
require_once "../model/anunciante.php";

class LoginResult
{
  public $success;
  public $newLocation;

  function __construct($success, $newLocation)
  {
    $this->success = $success;
    $this->newLocation = $newLocation;
  }
}

function exitWhenNotLoggedIn()
{ 
  if (!isset($_SESSION['loggedIn'])) {
    header("Location: index.html");
    exit();  
  }
}

function realizaLogin($pdo, $email, $senha) {
  if (Anunciante::checkUserCredentials($pdo, $email, $senha)) {
    $cookieParams = session_get_cookie_params();
    $cookieParams['httponly'] = true;
    session_set_cookie_params($cookieParams);  
    session_start();
    $_SESSION['loggedIn'] = true;
    $_SESSION['user'] = $email;
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    return true;

  } else {
    return false;
  }
}

// $email = $_POST['email'] ?? '';
// $senha = $_POST['senha'] ?? '';

// $pdo = mysqlConnect();

// switch ($_SERVER['REQUEST_METHOD']) {
//   case 'POST':
//     $result = realizaLogin($pdo, $email, $senha);
//     if ($result) {
//         $response = new LoginResult(true, '../view/home/homeInterna.html');
//     } else {
//         $response = new LoginResult(false, '');
//     }
//     header('Content-Type: application/json; charset=utf-8');
//     echo json_encode($response);
//     break;

//   default:
//     // header("Location: ../view/user/login.html");
//     // exit();
// }