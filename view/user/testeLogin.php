<?php
session_start();
if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn']) {
    echo '<h2>Usuário logado!</h2>';
    echo '<p>Email: ' . htmlspecialchars($_SESSION['user']) . '</p>';
} else {
    echo '<h2>Usuário NÃO está logado.</h2>';
}
?>
