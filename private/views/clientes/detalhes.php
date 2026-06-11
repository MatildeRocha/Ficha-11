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
                            <strong><i class="fa-solid fa-user me-2"></i>Detalhes do Cliente</strong>
                        </h2>
                        <hr>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Nome Completo</label>
                            <p class="form-control-plaintext">João Silva</p>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Morada</label>
                            <p class="form-control-plaintext">Rua das Flores, nº12, 2º Esq.</p>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label class="form-label fw-bold">Código Postal</label>
                                <p class="form-control-plaintext">4000-123</p>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label fw-bold">Cidade</label>
                                <p class="form-control-plaintext">Porto</p>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label fw-bold">Telefone</label>
                                <p class="form-control-plaintext">912345678</p>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Email</label>
                            <p class="form-control-plaintext">joao.silva@email.pt</p>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Sexo</label>
                                <p class="form-control-plaintext">Masculino</p>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Data de nascimento</label>
                                <p class="form-control-plaintext">1985-07-20</p>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Estado Civil</label>
                                <p class="form-control-plaintext">Casado</p>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Sistema de Saúde</label>
                                <p class="form-control-plaintext">ADSE</p>
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