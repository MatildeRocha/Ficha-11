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
try {
    $ligacao = new PDO(
        "mysql:host=" . MYSQL_HOST . ";dbname=" . MYSQL_DATABASE . ";charset=utf8",
        MYSQL_USERNAME,
        MYSQL_PASSWORD,
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );
    $comando = $ligacao->prepare(" SELECT *, AES_DECRYPT(name, :chave) AS email FROM agents WHERE AES_DECRYPT(name, :chave) = :u");
    $comando->execute([
        ':chave' => MYSQL_AES_KEY,
        ':u' => $_POST['text_username']
    ]);
    $agente = $comando->fetch(PDO::FETCH_OBJ);
    // 2. Verifica se o utilizador existe e se a password está correta
    if (!$agente || $_POST['text_password'] !== $agente->passwrd) {
        $_SESSION['server_error'] = 'Login inválido';
        header('Location: ../public/login.php');
        return;
    }
    // Atualizar last_login
    $stmt = $ligacao->prepare("UPDATE agents SET last_login = NOW() WHERE id = ?");
    $stmt->execute([$agente->id]);
    // Guardar na sessão
    $_SESSION['utilizador'] = $agente->email;
    $_SESSION['profile'] = $agente->profile;
} catch (PDOException $e) {
    $_SESSION['server_error'] = 'Erro ao ligar à base de dados.';
    header('Location: ../public/login.php');
    return;
}
