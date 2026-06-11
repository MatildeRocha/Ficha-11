<?php
// Inicia a sessão (necessário para usar $_SESSION)
session_start();
// Inicializa a variável que irá conter os erros de validação
$validation_errors = [];
// --------------------------------------------------------------------
// RECOLHA DE MENSAGENS TEMPORÁRIAS DA SESSÃO
// --------------------------------------------------------------------
// Verifica se existem erros de validação guardados na sessão
if (!empty($_SESSION['validation_errors'])) {
    // Se existirem, copia-os para a variável local
    $validation_errors = $_SESSION['validation_errors'];
    // Remove os erros da sessão para que não apareçam novamente numa recarga de página
    unset($_SESSION['validation_errors']);
}
// Inicializa a variável que irá conter erros de servidor
$server_error = [];
// Verifica se existe algum erro de servidor guardado na sessão
if (!empty($_SESSION['server_error'])) {
    // Se existir, copia-o para a variável local
    $server_error = $_SESSION['server_error'];
    // Remove o erro da sessão após ser lido
    unset($_SESSION['server_error']);
}
?>

<?php include '../private/includes/header.php'; ?>

<div class="container-fluid mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-5 col-md-6 col-sm-8 col-10">
            <div class="card p-4">
                <div class="d-flex align-items-center justify-content-center my-4">
                    <!-- Imagem do ginásio + texto -->
                    <img src="/Ficha%2008/private/assets/img/gym125.png" class="img-fluid me-3">
                    <h2><strong> <?php echo APP_NAME; ?></strong></h2>

                </div>
                <div class="row">
                    <div class="col">
                        <!-- Formulário -->
                        <form name="formulario" action="../private/processa_login.php" method="post">
                            <div class="mb-3">
                                <!-- Utilizador -->
                                <label for="email" class="form-label">Utilizador</label>
                                <input type="email" name="text_username" id="" class="form-control">
                            </div>
                            <div class="mb-3">
                                <!-- Password -->
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="text_password" id="" class="form-control">
                            </div class="mb-3 text-center">
                            <div class="mb-3 text-center">
                                <!-- Submit -->
                                <button type="submit" class="btn btn-secondary px-4">
                                    Entrar <i class="fa-solid fa-right-to-bracket ms-2"></i>
                                </button>
                            </div>
                            <!-- Botões de preenchimento automático (Fase de Testes) -->
                            <div class="mt-2 text-center">
                                <button type="button" id="preencher_adm" class="btn btn-outline-primary btn-sm me-2"> Preencher Admin
                                </button>
                                <button type="button" id="preencher_agnt" class="btn btn-outline-secondary btn-sm"> Preencher Agente
                                </button>
                            </div>
                            <!-- -------------------------------------------------------------------- -->
                            <!-- APRESENTAÇÃO DE MENSAGENS DE ERRO (VALIDAÇÃO E SERVIDOR) -->
                            <!-- -------------------------------------------------------------------- -->
                            <!-- Verifica se existem erros de validação -->
                            <?php if (!empty($validation_errors)) : ?>
                                <!-- Se existirem, apresenta um alerta de erro (vermelho) usando as classes do Bootstrap -->
                                <div class="alert alert-danger p-2 text-center">
                                    <!-- Percorre todos os erros de validação -->
                                    <?php foreach ($validation_errors as $error) : ?>
                                        <!-- Mostra cada erro dentro de uma <div>, escapando caracteres especiais para segurança -->
                                        <div><?= htmlspecialchars($error) ?></div>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>
                            <!-- Verifica se existe um erro de servidor -->
                            <?php if (!empty($server_error)) : ?>
                                <!-- Apresenta também num alerta de erro (vermelho) -->
                                <div class="alert alert-danger p-2 text-center">
                                    <!-- Mostra o erro do servidor, também escapado com htmlspecialchars -->
                                    <div><?= htmlspecialchars($server_error) ?></div>
                                </div>
                            <?php endif; ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Preenchimento automático para testes
    document.querySelector("#preencher_adm").addEventListener('click', () => {
        const formulario = document.forms['formulario'];
        formulario['text_username'].value = "admin@isep.pt";
        formulario['text_password'].value = "$2y$10$aia";
    });
    document.querySelector("#preencher_agnt").addEventListener('click', () => {
        const formulario = document.forms['formulario'];
        formulario['text_username'].value = "agente1@isep.pt";
        formulario['text_password'].value = "$2y$10$O";
    });
</script>

<?php include '../private/includes/footer.php'; ?>