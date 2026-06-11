<?php
// --------------------------------------------------------------------
// SEGURANÇA: Proteção de acesso à página de edição
// Este ficheiro deve ser acedido apenas por utilizadores autenticados.
// Caso não exista sessão iniciada, o utilizador será redirecionado para o login.
// --------------------------------------------------------------------
require_once __DIR__ . '/../../includes/funcoes.php';
require_once __DIR__ . '/../../../config/config.php';
redirect_if_not_logged(); // Inicia a sessão (se necessário) e verifica se o utilizador está autenticado

$idEncrypted = $_GET['id_cliente'] ?? null;
$id = aes_decrypt($idEncrypted);
if (!$id || !is_numeric($id)) {
    header('Location: lista.php');
    exit;
}

try {
    $ligacao = new PDO(
        "mysql:host=" . MYSQL_HOST . ";dbname=" . MYSQL_DATABASE . ";charset=utf8",
        MYSQL_USERNAME,
        MYSQL_PASSWORD
    );
    $stmt = $ligacao->prepare("SELECT nome, email, telefone FROM clientes WHERE id = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $cliente = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$cliente) {
        header('Location: lista.php');
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
                <div class="card w-100 shadow rounded text-center p-4" style="max-width: 700px;">
                    <div class="text-warning display-4 mb-3">
                        <i class="fa-solid fa-triangle-exclamation"></i>
                    </div>
                    <p class="mb-2 fs-5">Deseja eliminar o cliente?</p>
                    <h4 class="mb-4"><strong><?= htmlspecialchars($cliente['nome']) ?></strong></h4>
                    <div class="mb-4">
                        <span class="d-block mb-1"><i
                                class="fa-solid fa-at me-2"></i><strong><?= htmlspecialchars($cliente['email']) ?></strong></span> <span
                            class="d-block"><i class="fa-solid fa-phone me-2"></i><strong><?= htmlspecialchars($cliente['telefone']) ?></strong></span>
                    </div>
                    <div class="d-flex justify-content-center gap-3">
                        <a href="lista.php" class="btn btn-outline-secondary px-4">
                            <i class="fa-solid fa-xmark me-2"></i>Não
                        </a>
                        <a href="confirmar_apagar.php?id_cliente=<?= urlencode($idEncrypted) ?>" class="btn btn-danger px-4"> <i class="fa-solid fa-check me-2"></i>Sim
                        </a>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>

<?php include '../../includes/footer.php'; ?>