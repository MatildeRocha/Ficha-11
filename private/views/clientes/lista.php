<?php
// --------------------------------------------------------------------
// SEGURANÇA: Proteção de acesso à página de edição
// Este ficheiro deve ser acedido apenas por utilizadores autenticados.
// Caso não exista sessão iniciada, o utilizador será redirecionado para o login.
// --------------------------------------------------------------------
require_once __DIR__ . '/../../includes/funcoes.php';
require_once __DIR__ . '/../../../config/config.php';
redirect_if_not_logged(); // Inicia a sessão (se necessário) e verifica se o utilizador está autenticado

if (!in_array($_SERVER['REQUEST_METHOD'], ['GET', 'POST'])) {
    header('Location: ' . BASE_URL . '/public/login.php');
    exit;
}

$idClientEncrypted = $_GET['id_cliente'] ?? null;
$idClient = aes_decrypt($idClientEncrypted);
if (!$idClient || !is_numeric($idClient)) {
    header('Location: ' . BASE_URL . '/private/views/clientes/lista.php');
    exit;
}

// Recolhe o ID do cliente da URL
$idClient = $_GET['id_cliente'] ?? null;
if (!$idClient) {
    header('Location: ' . BASE_URL . '/private/views/clientes/lista.php');
    exit;
}

try {
    $ligacao = new PDO(
        "mysql:host=" . MYSQL_HOST . ";dbname=" . MYSQL_DATABASE . ";charset=utf8",
        MYSQL_USERNAME,
        MYSQL_PASSWORD
    );
    $ligacao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  // Preparar e executar a query com segurança
    $stmt = $ligacao->prepare("SELECT * FROM clientes WHERE id = :id");
    $stmt->bindParam(':id', $idClient, PDO::PARAM_INT);
    $stmt->execute();
    $cliente = $stmt->fetch(PDO::FETCH_OBJ);
    // Se não encontrou o cliente, redireciona
    if (!$cliente) {
        header('Location: ' . BASE_URL . '/private/views/clientes/lista.php');
        exit;
    }
    //$erro = ''; apagar senao o erro nao e exibido
} catch (PDOException $err) {
    $erro = "Erro na ligação à base de dados.";
    $cliente = null;
}
// Fecha a ligação
$ligacao = null;

?>

<?php include '../../includes/header.php'; ?>

<?php include '../../includes/nav.php'; ?>

<div class="container-fluid">
    <div class="row">

        <?php include '../../includes/sidebar.php'; ?>

        <!-- Conteúdo Principal -->
        <div class="col-md-9 col-lg-10 p-4">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h2 class="mb-0">
                    <i class="fa-solid fa-address-book me-2"></i>
                    <strong>Listagem de Clientes</strong>
                </h2>
                <a href="novo.php" class="btn btn-success">
                    <i class="fa-solid fa-plus me-1"></i> Novo cliente
                </a>
            </div>
            <hr>

            <?php if (!empty($erro)) : ?>
                <p class="text-center text-danger"><?= $erro ?></p>
            <?php else : ?>
                <?php if (count($resultados) == 0) : ?>
                    <p class="text-muted">Não existem clientes registados.</p>
                <?php else : ?>
                <?php endif; ?>
            <?php endif; ?>


            <div class="table-responsive">
                <table id="tabela-clientes" class="table table-bordered table-striped align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>Nome</th>
                            <th>Sexo</th>
                            <th>Data</th>
                            <th>Email</th>
                            <th>Telefone</th>
                            <th>Morada</th>
                            <th class="text-center">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($resultados as $cliente) : ?>
                            <tr>
                                <td><?= $cliente->nome ?></td>
                                <td><?= $cliente->sexo == 'm' ? 'Masculino' : 'Feminino' ?></td>
                                <td><?= substr($cliente->data_nascimento, 0, 10) ?></td>
                                <td><?= $cliente->email ?></td>
                                <td><?= $cliente->telefone ?></td>
                                <td><?= $cliente->morada . ' - ' . $cliente->cidade ?></td>
                                <td class="text-center">
                                    <a href="detalhes.php" class="btn btn-sm btn-outline-primary me-1"> <i
                                            class="fa-solid fa-eye"></i>
                                    </a>
                                    <a href="editar.php?id_cliente=<?= aes_encrypt($cliente->id) ?>" class="btn btn-sm btn-outline-warning me-1"> <i
                                            class="fa-regular fa-pen-to-square"></i>
                                    </a>
                                    <a href="apagar.php" class="btn btn-sm btn-outline-danger">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class="col">
                <p class="mb-5">Total: <strong> <?= count($resultados) ?> </strong></p>
            </div>
        </div>
    </div>
</div>

<script>
    // tradução para português
    $(document).ready(function() {
        // datatable
        $('#tabela-clientes').DataTable({
            pageLength: 5,
            pagingType: "full_numbers",
            language: {
                decimal: "",
                emptyTable: "Sem dados disponíveis na tabela.",
                info: "Mostrando _START_ até _END_ de _TOTAL_ registos",
                infoEmpty: "Mostrando 0 até 0 de 0 registos",
                infoFiltered: "(Filtrando _MAX_ total de registos)",
                infoPostFix: "",
                thousands: ",",
                lengthMenu: "Mostrando _MENU_ registos por página.",
                loadingRecords: "Carregando...",
                processing: "Processando...",
                search: "Filtrar:",
                zeroRecords: "Nenhum registro encontrado.",
                paginate: {
                    first: "Primeira",
                    last: "Última",
                    next: "Seguinte",
                    previous: "Anterior"
                },
                aria: {
                    sortAscending: ": ative para classificar a coluna em ordem crescente.",
                    sortDescending: ": ative para classificar a coluna em ordem decrescente."
                }
            }
        });
    })
</script>

<?php include '../../includes/footer.php'; ?>