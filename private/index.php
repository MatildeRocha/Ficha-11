<?php
// Inicia a sessão para poder usar a variável $_SESSION
require_once 'includes/funcoes.php';
start_session();

// ---------------------------------------------------------------------------
// SEGURANÇA: Impede que o utilizador aceda diretamente a este script.
// Este ficheiro deve ser acedido apenas através de submissão de formulário (POST).
// Se for acedido diretamente (por URL) recebe a informação de Acesso Inválido
// ----------------------------------------------------------------------------
if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    // Redireciona para o formulário de login (interface pública)
    header('Location: ../public/login.php');
    // Encerra a execução do script imediatamente após o redirecionamento
    return;
}

// --------------------------------------------------------------------
// RECOLHA DE DADOS DO FORMULÁRIO
// --------------------------------------------------------------------
// Verifica se o campo 'text_username' foi enviado via POST.
// Se sim, guarda-o na variável $username. Caso contrário, usa string vazia.
$username = isset($_POST['text_username']) ? $_POST['text_username'] : '';
// O mesmo para o campo da password.
$password = isset($_POST['text_password']) ? $_POST['text_password'] : '';

// --------------------------------------------------------------------
// APRESENTAÇÃO DE DADOS ENVIADOS
// --------------------------------------------------------------------
echo "Utilizador: " . $username . "<br>";
echo "Password: " . $password;
// Em produção, **nunca** se deve mostrar a password assim — isto é apenas para testes!

// --------------------------------------------------------------------
// VALIDAÇÃO DOS DADOS
// --------------------------------------------------------------------
// Inicializa um array vazio para guardar mensagens de erro de validação
$validation_errors = [];
// Verifica se o nome de utilizador (username) é um endereço de email válido
// Se não for, adiciona uma mensagem de erro ao array
if (!filter_var($username, FILTER_VALIDATE_EMAIL)) {
    $validation_errors[] = 'O username tem que ser um email válido.';
}
// Verifica se o nome de utilizador tem um comprimento entre 5 e 50 caracteres
// Isto evita usernames demasiado curtos ou excessivamente longos
if (strlen($username) < 5 || strlen($username) > 50) {
    $validation_errors[] = 'O username deve ter entre 5 e 50 caracteres.';
}
// Verifica se a password tem um comprimento entre 6 e 12 caracteres
// Garante uma password minimamente segura, mas fácil de recordar
if (strlen($password) < 6 || strlen($password) > 12) {
    $validation_errors[] = 'A password deve ter entre 6 e 12 caracteres.';
}
// Se existirem erros de validação, guarda-os na sessão
// Depois, redireciona o utilizador de volta para o formulário de login
if (!empty($validation_errors)) {
    $_SESSION['validation_errors'] = $validation_errors;
    // Redireciona para a página de login (ou outro formulário)
    header('Location: ../public/login.php'); // ou 'login_form.php'

    // Encerra o script para impedir execução posterior
    return;
}

// --------------------------------------------------------------------
// SIMULAÇÃO DE RESULTADO DE LOGIN (antes da ligação real à base de dados)
// --------------------------------------------------------------------
// Simula o resultado que viria de uma verificação à base de dados
// Neste caso, assume-se que o login é válido (status = 1)
// Mais tarde, esta variável será substituída por um resultado real vindo da BD
$result['status'] = 1; // 1 = login válido, 0 = inválido

// Verifica se o status retornado indica login inválido
if (!$result['status']) {
    // Se o login for inválido, guarda uma mensagem de erro na sessão
    $_SESSION['server_error'] = 'Login inválido';

    // Redireciona o utilizador novamente para o formulário de login
    header('Location: ../public/login.php'); // ou 'login_form.php'

    // Encerra o script para não continuar o processamento
    return;
}
// Se o status for 1 (válido), o código continuará — aqui será futuramente criada a sessão do utilizador e o redirecionamento para a área privada.

// -------------------------------------------------------------------
// LOGIN BEM-SUCEDIDO: Guardar o utilizador na sessão
// --------------------------------------------------------------------
// Guarda o nome de utilizador na sessão para identificar o utilizador autenticado
$_SESSION['utilizador'] = $username;
// Agora código da área privada 

?>

<?php include 'includes/header.php'; ?>

<?php include 'includes/nav.php'; ?>

<div class="container-fluid">
    <div class="row">

        <?php include 'includes/sidebar.php'; ?>

        <!-- Conteúdo Principal -->
        <main class="col-md-9 col-lg-10 p-4">
            <section>
                <h2>ISEP Ginásio</h2>
                <p>Escolhe uma opção no menu lateral para continuar.</p>
            </section>
        </main>
    </div>
</div>

<?php include 'includes/footer.php'; ?>