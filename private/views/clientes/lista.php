<?php
// --------------------------------------------------------------------
// SEGURANÇA: Proteção de acesso à página de edição
// Este ficheiro deve ser acedido apenas por utilizadores autenticados.
// Caso não exista sessão iniciada, o utilizador será redirecionado para o login.
// --------------------------------------------------------------------
require_once __DIR__ . '/../../includes/funcoes.php';
redirect_if_not_logged(); // Inicia a sessão (se necessário) e verifica se o utilizador está autenticado
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
            <p class="text-muted">Não existem clientes registados.</p>
            <div class="table-responsive">
                <table class="table table-bordered table-striped align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>Nome</th>
                            <th>Sexo</th>
                            <th>Data nascimento</th>
                            <th>Email</th>
                            <th>Telefone</th>
                            <th>Sistema de Saúde</th>
                            <th class="text-center">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>[Nome Cliente]</td>
                            <td>[Sexo]</td>
                            <td>[data_Nasc]</td>
                            <td>[email]</td>
                            <td>[Telefone]</td>
                            <td>[sistema_saude]</td>
                            <td class="text-center">
                                <a href="detalhes.php" class="btn btn-sm btn-outline-primary me-1"> <i
                                        class="fa-solid fa-eye"></i>
                                </a>
                                <a href="editar.php" class="btn btn-sm btn-outline-warning me-1"> <i
                                        class="fa-regular fa-pen-to-square"></i>
                                </a>
                                <a href="apagar.php" class="btn btn-sm btn-outline-danger">
                                    <i class="fa-solid fa-trash-can"></i>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php include '../../includes/footer.php'; ?>