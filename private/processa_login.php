<?php
require_once 'includes/funcoes.php';
start_session();
// --------------------------------------------------------------------
// SEGURANÇA: Impede que o utilizador aceda diretamente a este script.
// Este ficheiro deve ser acedido apenas através de submissão de formulário (POST).
// Se for acedido diretamente (por URL), será redirecionado para o login.
// --------------------------------------------------------------------
if ($_SERVER['REQUEST_METHOD'] != 'POST') {
 // Redireciona para o formulário de login (interface pública)
 header('Location: ../public/login.php');
 // Encerra a execução do script imediatamente após o redirecionamento
 return;
}
// --------------------------------------------------------------------
// RECOLHA DE DADOS DO FORMULÁRIO
// --------------------------------------------------------------------
$username = $_POST['text_username'] ?? '';
$password = $_POST['text_password'] ?? '';

// Guarda o nome de utilizador na sessão para identificar o utilizador autenticado
$_SESSION['utilizador'] = $username;
// Redirecionar para a página principal privada
header('Location: home.php');
exit;
?>