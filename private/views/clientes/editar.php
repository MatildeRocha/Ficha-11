<?php include '../../includes/header.php'; ?>

<?php include '../../includes/nav.php'; ?>

<div class="container-fluid">
    <div class="row">

        <?php include '../../includes/sidebar.php'; ?>

        <!-- Conteúdo Principal -->
        <main class="col-md-9 col-lg-10 p-4">
            <div class="d-flex justify-content-center mt-4">
                <div class="card w-100 shadow rounded" style="max-width: 1200px;">
                    <div class="card-body">
                        <h2 class="mb-4"><strong><i class="fa-solid fa-users me-2"></i>Atualização de dados</strong></h2>
                        <hr>
                        <form action="#" method="post" novalidate>
                            <!-- Linhas e colunas com campos organizados -->
                            <!-- NOME -->
                            <div class="row mb-3">
                                <div class="col-12">
                                    <label for="texto_nome" class="form-label">Nome Completo</label>
                                    <input type="text" class="form-control" id="texto_nome" name="nome_cliente" value="Ana Beatriz Ferreira"
                                        required>
                                </div>
                            </div>
                            <!-- MORADA -->
                            <div class="row mb-3">
                                <div class="col-12">
                                    <label for="texto_endereco" class="form-label">Morada
                                        <small>(NºPorta, Andar)</small>
                                    </label>
                                    <input type="text" class="form-control" id="texto_endereco" name="morada_cliente" value="Rua Dr. António Benardino de Almeida, 431 ">
                                </div>
                            </div>
                            <!-- CÓDIGO POSTAL, CIDADE, TELEFONE E EMAIL -->
                            <div class="row mb-3">
                                <div class="col-md-3">
                                    <label for="texto_cp" class="form-label">Código Postal</label>
                                    <input type="text" class="form-control" id="texto_cp" name="cp_cliente" value="4249-015" required>
                                </div>
                                <div class="col-md-3">
                                    <label for="texto_cidade" class="form-label">Cidade</label>
                                    <input type="text" class="form-control" id="texto_cidade" name="cid_cliente" value="Porto" required>
                                </div>
                                <div class="col-md-3">
                                    <label for="texto_cliente" class="form-label">Telefone</label>
                                    <input type="text" class="form-control" id="texto_cliente" name="tel_cliente" value="934587621" required>
                                </div>
                                <div class="col-md-3">
                                    <label for="texto_email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="texto_email" name="email_cliente" value="ana.ferreira@isep.ipp.pt" required>
                                </div>
                            </div>
                            <!-- SEXO E DATA DE NASCIMENTO -->
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="form-label">Sexo</label>
                                    <div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="radio_gender" id="radio_m" value="m">
                                            <label class="form-check-label" for="radio_m">Masculino</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="radio_gender" id="radio_f" value="f" checked>
                                            <label class="form-check-label" for="radio_f">Feminino</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="texto_dnasc" class="form-label">Data de nascimento</label>
                                    <input type="text" class="form-control" id="texto_dnasc" name="dnasc_cliente" value="1990-07-15" required>
                                </div>
                            </div>
                            <!-- ESTADO CIVIL, SISTEMA DE SÁUDE E PROFISSÃO -->
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <label for="texto_estcivil" class="form-label">Estado Civil</label>
                                    <select class="form-select" id="texto_estcivil" name="estaciv_cliente">
                                        <option>Escolha uma opção</option>
                                        <option value="solt">Solteiro</option>
                                        <option value="casd" selected>Casado</option>
                                        <option value="ufat">União de Facto</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="texto_SSaude" class="form-label">Sistema de Saúde</label>
                                    <input type="text" class="form-control" id="texto_SSaude" name="campo_opcao" list="sistemasaude">
                                    <datalist id="sistemasaude">
                                        <option value="SNS">
                                        <option value="ADSE">
                                        <option value="SMAS">
                                        <option value="CTT">
                                        <option value="PSP">
                                    </datalist>
                                </div>
                                <div class="col-md-4">
                                    <label for="profissao" class="form-label">Profissão</label>
                                    <input type="text" class="form-control" id="profissao" name="profissao_cliente" value="Engenheira Biomédica">
                                </div>

                                <!-- Botões -->
                                <div class="d-flex justify-content-end gap-2 mb-4">
                                    <a href="lista.php" class="btn btn-outline-secondary">
                                        <i class="fa-solid fa-xmark me-1"></i> Cancelar
                                    </a>
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa-regular fa-floppy-disk me-1"></i> Guardar
                                    </button>
                                </div>

                                <!-- Área de erros -->
                                <div class="alert alert-danger text-center" role="alert"> Erro
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>

<?php include '../../includes/footer.php'; ?>