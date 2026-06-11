<?php
require_once 'includes/funcoes.php';
redirect_if_not_logged();
start_session();
$success_message = $_SESSION['success_message'] ?? '';
unset($_SESSION['success_message']);
?>
<?php
include 'includes/header.php';
include 'includes/nav.php';
?>
<?php if (!empty($success_message)) : ?>
    <div class="position-fixed top-0 end-0 p-3" style="z-index: 11">
        <div id="toastSuccess" class="toast align-items-center text-bg-success border-0 show" role="alert">
            <div class="d-flex">
                <div class="toast-body">
                    <?= htmlspecialchars($success_message) ?>
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
            </div>
        </div>
    </div>
<?php endif; ?>
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