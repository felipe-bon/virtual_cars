<?php
<<<<<<< HEAD:view/home/homeInterna.php
session_start();
if (!isset($_SESSION['loggedIn']) || !$_SESSION['loggedIn']) {
    header('../view/user/login.html');
    exit();
}
?>
=======
//TO DO:
session_start();
//TO DO: referencia correta?
if (!isset($_SESSION['user_id'])) {
    header('Location: ../user/login.html');
    exit();
}

?>

>>>>>>> main:view/home/homeInterna.html
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Interna</title>

    <link rel="stylesheet" href="../../public/css/style.css">
    <link rel="stylesheet" href="interna.css">
</head>

<body>
    <header>
        <nav>
            <a href="../home/index.html">
                <img class="logo-image-nav" src="../../public/images/icon.png" alt="logo">
            </a>

<<<<<<< HEAD:view/home/homeInterna.php
            <button class="btn-login" onclick="logout()" id="btn-logout" type="button" name="action" value="logout" action="../../controller/anunciante-controller.php" method="POST">
=======
            <a href="../../controller/logout.php" class="btn-login">
>>>>>>> main:view/home/homeInterna.html
                Logout
            </a>
        </nav>
    </header>
    <main>
        <div class="funcionalidades">
            <h1>Painel do Usuário</h1>
            <div class="funcionalidade">
                <a href="criarAnuncio.html">
                    <div class="botao">Novo Anúncio</div>
                </a>
            </div>
            <div class="funcionalidade">
                <a href="../anuncio/listagem/listagemAnuncios.html">
                    <div class="botao">Listagem de Anúncio</div>
                </a>
            </div>
            <div class="funcionalidade">
                <a href="../anuncio/listagem/listagemInteresses.html">
                    <div class="botao">Listagem de Interesses</div>
                </a>
            </div>
        </div>
    </main>
    <footer>
        <h3>Vitual Cars não é um site real</h3>
    </footer>
    <script>
        function logout() {
            const btnLogout = document.getElementById('btn-logout');
            btnLogout.click();
            window.location.href = "../view/user/login.html";
        }
    </script>
</body>

</html>