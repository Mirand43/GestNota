<?php

include "../../dbconfig.php";

if (isset($_POST['btn-addFuncionario'])) {
    $numerofuncionario = $_POST["numerofuncionario"];
    $nomefuncionario = $_POST["nomefuncionario"];
    $datanascimento = $_POST["datanascimento"];
    $documento = $_POST["documento"];
    $sexofuncionaro = $_POST["sexofuncionaro"];
    $naturalidadefuncionario = $_POST["naturalidadefuncionario"];
    $nacionalidadefuncionario = $_POST["nacionalidadefuncionario"];
    $telefonefuncionario = $_POST["telefonefuncionario"];
    $emailfuncionario = $_POST["emailfuncionario"];
    $enderecofuncionario = $_POST["enderecofuncionario"];
    $estadocivilfuncionario = $_POST["estadocivilfuncionario"];
    $perfil = $_POST["perfil"];
    $senhafuncionario = '123';

    /*Enviar dados na base de dados*/
    if ($crud->CreateFuncionarios($numerofuncionario, $nomefuncionario, $datanascimento, $documento, $sexofuncionaro, $naturalidadefuncionario, $nacionalidadefuncionario, $telefonefuncionario, $emailfuncionario, $enderecofuncionario, $estadocivilfuncionario, $perfil, $senhafuncionario)) {
        echo "Funcionário adicionado";
    } else {
        echo "Funcionário não adicionado";
    }
}

?>

<?php include 'header.php' ?>

<!-- inclusão do sidebar -->
<?php include 'sidebar.php' ?>

<!-- conteúdo -->
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Funcionário</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="funcionario.html">Funcionários</a></li>
                <li class="breadcrumb-item active">Adicionar</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Adicionar novo funcionário</h5>
                        <p>Cadastrar novo Funcionário</p>

                        <!-- Browser Default Validation -->
                        <form method="POST" class="row g-3">
                            <div class="col-md-4">
                                <label for="validationDefault01" class="form-label">Número de funcionário</label>
                                <input type="text" class="form-control" id="validationDefault01" required name="numerofuncionario">
                            </div>
                            <div class="col-md-4">
                                <label for="validationDefault01" class="form-label">Nome completo</label>
                                <input type="text" class="form-control" id="validationDefault01" required name="nomefuncionario">
                            </div>
                            <div class="col-md-4">
                                <label for="validationDefault01" class="form-label">Nº BI/Cedula ou Passaporte</label>
                                <input type="text" class="form-control" id="validationDefault01" required name="documento">
                            </div>
                            <div class="col-md-4">
                                <label for="validationDefault01" class="form-label">Naturalidade</label>
                                <input type="text" class="form-control" id="validationDefault01" required name="naturalidadefuncionario">
                            </div>
                            <div class="col-md-4">
                                <label for="validationDefault01" class="form-label">Nacionalidade</label>
                                <input type="text" class="form-control" id="validationDefault01" required name="nacionalidadefuncionario">
                            </div>
                            <div class="col-md-4">
                                <label for="validationDefault03" class="form-label">Endereço</label>
                                <input type="text" class="form-control" id="validationDefault03" required name="enderecofuncionario">
                            </div>
                            <div class="col-md-4">
                                <label for="validationDefaultUsername" class="form-label">E-mail</label>
                                <div class="input-group">
                                    <span class="input-group-text" id="inputGroupPrepend2">@</span>
                                    <input type="text" class="form-control" id="validationDefaultUsername" aria-describedby="inputGroupPrepend2" required name="emailfuncionario">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="validationDefault05" class="form-label">Número de telefone</label>
                                <input type="text" class="form-control" id="validationDefault05" required name="telefonefuncionario">
                            </div>
                            <div class="col-md-4">
                                <label for="validationDefault01" class="form-label">Data de nascimento</label>
                                <input type="date" class="form-control" id="validationDefault01" required name="datanascimento">
                            </div>
                            <div class="col-md-4">
                                <label for="validationDefault04" class="form-label">Sexo</label>
                                <select class="form-select" id="validationDefault04" required name="sexofuncionaro">
                                    <option selected disabled value="">Escolha...</option>
                                    <option value="Masculino">Masculino</option>
                                    <option value="Femenino">Femenino</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="validationDefault04" class="form-label">Estado cívil</label>
                                <select class="form-select" id="validationDefault04" required name="estadocivilfuncionario">
                                    <option selected disabled value="">Escolher...</option>
                                    <option value="Solteiro">Solterio</option>
                                    <option value="Casado">Casado</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="validationDefault04" class="form-label">Perfil</label>
                                <select class="form-select" id="validationDefault04" required name="perfil">
                                    <option selected disabled value="">Escolher...</option>
                                        <?php $crud-> ComboPerfil() ?> 
                                </select>
                            </div>
                            <div class="col-md-11">
                                <button class="btn btn-primary" type="submit" name="btn-addFuncionario">Cadastrar</button>
                            </div>
                            <div class="col-md-1">
                                <a href="./funcionario.php" class="btn btn-danger">Cancelar</a>
                            </div>
                        </form>
                        <!-- End Browser Default Validation -->

                    </div>
                </div>


            </div>
        </div>
    </section>

</main><!-- End #main -->

<!-- inclusão do footer -->
<?php include 'footer.php' ?>