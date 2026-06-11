<?php include '../../includes/header.php'; ?>

<?php include '../../includes/nav.php'; ?>

<div class="container-fluid">
    <div class="row">

        <?php include '../../includes/sidebar.php'; ?>

        <!-- Conteúdo Principal -->
        <main class="col-md-9 col-lg-10 p-4">
            <h2 class="mb-4"><i class="fa-solid fa-box-open me-2"></i> Produtos e Serviços</h2>
            <p class="text-muted">Escolhe uma opção no menu lateral para continuar.</p>
            <div class="container-fluid mt-5">
                <div class="row">
                    <!-- Primeira linha de opções -->
                    <div class="d-flex flex-row flex-wrap justify-content-center">
                        <a href="calculoIMC.html" class="unlink m-2">
                            <div class="home-option p-5 text-center">
                                <h3 class="mb-3"><i class="fa-solid fa-users"></i></h3>
                                <h5>Cálculo de IMC</h5>
                            </div>
                        </a>
                        <a href="encaminhamento.html" class="unlink m-2">
                            <div class="home-option p-5 text-center">
                                <h3 class="mb-3"><i class="fa-solid fa-user-plus"></i></h3>
                                <h5>Avaliação</h5>
                            </div>
                        </a>
                        <a href="precario.html" class="unlink m-2">
                            <div class="home-option p-5 text-center">
                                <h3 class="mb-3"><i class="fa-solid fa-chart-column"></i></h3>
                                <h5>Preçário</h5>
                            </div>
                        </a>
                    </div>

                    <!-- Segunda linha de opções -->
                    <div class="d-flex flex-row flex-wrap justify-content-center">
                        <a href="contratos.html" class="unlink m-2">
                            <div class="home-option p-5 text-center">
                                <h3 class="mb-3"><i class="fa-solid fa-upload"></i></h3>
                                <h5>Contratos</h5>
                            </div>
                        </a>
                        <a href="#" class="unlink m-2">
                            <div class="home-option p-5 text-center">
                                <h3 class="mb-3"><i class="fa-solid fa-users"></i></h3>
                                <h5>Funcionalidade</h5>
                            </div>
                        </a>
                        <a href="#" class="unlink m-2">
                            <div class="home-option p-5 text-center">
                                <h3 class="mb-3"><i class="fa-solid fa-user-gear"></i></h3>
                                <h5>Funcionalidade</h5>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>

<?php include '../../includes/footer.php'; ?>