<?php

require_once "../model/anunciante.php";
require_once "../db/conexaoMysql.php";
require_once "../controller/login.php";

$pdo = mysqlConnect();

header('Content-Type: application/json; charset=utf-8');

function cadastroAnunciante($pdo) {
    $nome = $_POST['nome'] ?? '';
    $cpf = $_POST['cpf'] ?? '';
    $email = $_POST['email'] ?? '';
    $senha = $_POST['senha'] ?? '';
    $telefone = $_POST['telefone'] ?? '';

    $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

    if (Anunciante::createAnunciante($pdo, $nome, $cpf, $email, $senhaHash, $telefone)) {
        $cookieParams = session_get_cookie_params();
        $cookieParams['httponly'] = true;
        session_set_cookie_params($cookieParams);  
        session_start();
        $_SESSION['loggedIn'] = true;
        $_SESSION['user'] = $email;
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
        header("Location: ../view/home/homeInterna.html");
        exit();
    } else {
        header("Location: ../view/user/cadastro.html");
        exit();
    }
}

function loginAnunciante($pdo) {
    $email = $_POST['email'] ?? '';
    $senha = $_POST['senha'] ?? '';

    if (Anunciante::checkUserCredentials($pdo, $email, $senha)) {
        $cookieParams = session_get_cookie_params();
        $cookieParams['httponly'] = true;
        session_set_cookie_params($cookieParams);  
        session_start();
        $_SESSION['loggedIn'] = true;
        $_SESSION['user'] = $email;
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
        header("Location: ../view/home/homeInterna.html");
        exit();
    }else {
        header("Location: ../view/user/cadastro.html");
        exit();
    }
}

switch ($_SERVER['REQUEST_METHOD']) {
    case 'POST':
        if ($_POST['action'] == 'cadastro') {
            cadastroAnunciante($pdo);
        } else if ($_POST['action'] == 'login') {
            loginAnunciante($pdo);
        }
        break;
    default:
        header("Location: ../view/user/cadastro.html");
        exit();
}