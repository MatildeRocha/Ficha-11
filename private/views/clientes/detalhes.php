<?php
// --------------------------------------------------------------------
// SEGURANÇA: Proteção de acesso à página de edição
// Este ficheiro deve ser acedido apenas por utilizadores autenticados.
// Caso não exista sessão iniciada, o utilizador será redirecionado para o login.
// --------------------------------------------------------------------
require_once __DIR__ . '/../../includes/funcoes.php';
require_once __DIR__ . '/../../../config/config.php';
redirect_if_not_logged(); // Inicia a sessão (se necessário) e verifica se o utilizador está autenticado

$idClientEncrypted = $_GET['id_cliente'] ?? null;
$idClient = aes_decrypt($idClientEncrypted);

if (!$idClient || !is_numeric($idClient)) {
    header('Location: ' . BASE_URL . '/private/views/clientes/lista.php');
    exit;
}

try {
    $ligacao = new PDO(
        "mysql:host=" . MYSQL_HOST . ";dbname=" . MYSQL_DATABASE . ";charset=utf8",
        MYSQL_USERNAME,
        MYSQL_PASSWORD
    );
    $stmt = $ligacao->prepare("SELECT * FROM clientes WHERE id = :id");
    $stmt->bindParam(':id', $idClient, PDO::PARAM_INT);
    $stmt->execute();
    $cliente = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$cliente) {
        echo "<p class='text-danger'>Cliente não encontrado.</p>";
        exit;
    }
} catch (PDOException $e) {
    echo "<p class='text-danger'>Erro: " . $e->getMessage() . "</p>";
    exit;
}

?>

<?php include '../../includes/header.php'; ?>

<?php include '../../includes/nav.php'; ?>

<div class="container-fluid">
    <div class="row">

        <?php include '../../includes/sidebar.php'; ?>

        <!-- Conteúdo Principal -->
        <main class="col-md-9 col-lg-10 p-4">
            <div class="d-flex justify-content-center mt-4">
                <div class="card w-100 shadow rounded" style="max-width: 900px;">
                    <div class="card-body">
                        <h2 class="mb-4">
                            <strong><i class="fa-solid fa-user me-2"></i> Detalhes do Cliente</strong> <?php if ($cliente['cliente_ativo'] == 1): ?>
                                <span class="badge bg-success">Ativo</span>
                            <?php else: ?>
                                <span class="badge bg-secondary">Inativo</span>
                            <?php endif; ?>
                        </h2>
                        <hr>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Nome Completo</label>
                            <p class="form-control-plaintext"><?= htmlspecialchars($cliente['nome']) ?></p>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Morada</label>
                            <p class="form-control-plaintext"><?= htmlspecialchars($cliente['morada']) ?></p>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label class="form-label fw-bold">Código Postal</label>
                                <p class="form-control-plaintext">4000-123</p>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label fw-bold">Cidade</label>
                                <p class="form-control-plaintext"><?= htmlspecialchars($cliente['cidade']) ?></p>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label fw-bold">Telefone</label>
                                <p class="form-control-plaintext"><?= htmlspecialchars($cliente['telefone']) ?></p>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Email</label>
                            <p class="form-control-plaintext"><?= htmlspecialchars($cliente['email']) ?></p>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Sexo</label>
                                <p class="form-control-plaintext"><?= ($cliente['sexo'] === 'm') ? 'Masculino' : (($cliente['sexo'] === 'f') ? 'Feminino' : 'Outro') ?></p>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Data de nascimento</label>
                                <p class="form-control-plaintext"><?= date('d/m/Y', strtotime($cliente['data_nascimento'])) ?></p>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Estado Civil</label>
                                <p class="form-control-plaintext">Casado</p>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Sistema de Saúde</label>
                                <p class="form-control-plaintext"><?= htmlspecialchars($cliente['sistema_saude']) ?></p>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end">
                            <a href="lista.php" class="btn btn-outline-secondary">
                                <i class="fa-solid fa-arrow-left me-1"></i> Voltar
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>

<?php include '../../includes/footer.php'; ?>