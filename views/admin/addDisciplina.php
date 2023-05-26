<?php

include "../../dbconfig.php"; 

if (isset($_POST['btn-adddisciplina'])){
  $descricaodisciplina = $_POST["descricaodisciplina"];
  $coordenadordisciplina = $_POST["coordenadordisciplina"];

/*Enviar dados na base de dados*/
if($crud->createDisciplina($descricaodisciplina,$coordenadordisciplina)){
echo "Perfil adicionado";
}else{
echo "Perfil não adicionado";
}  
}

?>

<?php include 'header.php' ?>

<!-- inclusão do sidebar -->
<?php include 'sidebar.php' ?>

<!-- conteúdo -->
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Disciplina</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="funcionario.html">Disciplinas</a></li>
                    <li class="breadcrumb-item active">Adicionar</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Adicionar novo disciplina</h5>
                            <p>Cadastrar novo disciplina</p>

                            <!-- Browser Default Validation -->
                            <form method="POST" class="row g-3">
                                <div class="col-md-4">
                                    <label for="validationDefault01" class="form-label">Nome da disciplina</label>
                                    <input type="text" class="form-control" id="validationDefault01"
                                        required name="descricaodisciplina">
                                </div>
                                <br>
                                <br>
                                <div class="col-md-3">
                                    <label for="validationDefault04" class="form-label">Coordenador</label>
                                    <select class="form-select" id="validationDefault04" required name="coordenadordisciplina">
                                        <option selected disabled value="">Selecione o coordenador...</option>
                                        <option value="António Quintas">António Quintas</option>
                                        <option value="Manuel Ndongola">Manuel Ndongola</option>
                                        <option value="Jorge Manuel">Jorge Manuel</option>
                                        <option value="Quiteque Ninas">Quiteque Ninas</option>
                                        <option value="Kina Rodrigues">Kina Rodrigues</option>
                                    </select>
                                </div>
                                <!-- <div class="col-12">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="invalidCheck2"
                                            required>
                                        <label class="form-check-label" for="invalidCheck2">
                                            Agree to terms and conditions
                                        </label>
                                    </div>
                                </div> -->
                                <div class="col-md-11">
                                    <button class="btn btn-primary" type="submit" name="btn-adddisciplina">Cadastrar</button>
                                </div>
                                <div class="col-md-1">
                                    <a href="alunos.html" class="btn btn-danger">Cancelar</a>
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