<?php

include "../../dbconfig.php"; 

if (isset($_POST['btn-addTurma'])){
  $classeTurma = $_POST["classeTurma"];
  $turnoTurma = $_POST["turnoTurma"];
  $coordenadorTurma = $_POST["coordenadorTurma"];
  $disciplinasTurma = $_POST["disciplinasTurma"];
  $descricaoTurma = $_POST["descricaoTurma"];

/*Enviar dados na base de dados*/
if($crud->createTurma($classeTurma,$turnoTurma,$coordenadorTurma,$disciplinasTurma,$descricaoTurma)){
echo "Turma adicionado";
}else{
echo "Turma não adicionado";
}  
}

?>

<?php include 'header.php' ?>

<!-- inclusão do sidebar -->
<?php include 'sidebar.php' ?>

<!-- conteúdo -->
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Turma</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="funcionario.html">Turma</a></li>
                    <li class="breadcrumb-item active">Adicionar</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Adicionar nova turma</h5>
                            <p>Cadastrar nova turma</p>

                            <!-- Browser Default Validation -->
                            <form method="POST" class="row g-3">
                                <div class="col-md-4">
                                    <label for="validationDefault01" class="form-label">Classe</label>
                                    <input type="number" class="form-control" id="validationDefault01"
                                        required name="classeTurma">
                                </div>
                                <div class="col-md-4">
                                    <label for="validationDefault01" class="form-label">Turno</label>
                                    <input type="text" class="form-control" id="validationDefault01"
                                        required name="turnoTurma">
                                </div>
                                <br>
                                <br>
                                <div class="col-md-3">
                                    <label for="validationDefault04" class="form-label">Coordenador</label>
                                    <select class="form-select" id="validationDefault04" required name="coordenadorTurma">
                                        <option selected disabled value="">Selecione o coordenador...</option>
                                        <option value="António Quintas">António Quintas</option>
                                        <option value="Manuel Ndongola">Manuel Ndongola</option>
                                        <option value="Jorge Manuel">Jorge Manuel</option>
                                        <option value="Quiteque Ninas">Quiteque Ninas</option>
                                        <option value="Kina Rodrigues">Kina Rodrigues</option>
                                    </select>
                                </div>

                                <div class="col-md-6">
                                    <label for="validationDefault01" class="form-label">Disciplinas</label>
                                    <input type="text" class="form-control" id="validationDefault01"
                                        required name="disciplinasTurma">
                                </div>
                                <div class="col-md-6">
                                    <label for="validationDefault01" class="form-label">Descrição</label>
                                    <input type="text" class="form-control" id="validationDefault01"
                                        required name="descricaoTurma">
                                </div>
                                <div class="col-md-11">
                                    <button class="btn btn-primary" type="submit" name="btn-addTurma">Cadastrar</button>
                                </div>
                                <div class="col-md-1">
                                    <a href="./turma.php" class="btn btn-danger">Cancelar</a>
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