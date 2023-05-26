<?php include 'header.php' ?>

<!-- inclusão do sidebar -->
<?php include 'sidebar.php' ?>

<!-- Conteudo -->
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Turma</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="funcionario.html">Turma</a></li>
          <li class="breadcrumb-item active">Lista</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
          <div class="col-lg-12">
  
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Tabela de turmas</h5>
                <p>Lista de turmas</p>
  
                <!-- Table with stripped rows -->
                <table class="table datatable">
                  <thead>
                    <tr>
                      <th scope="col">Nº da turma</th>
                      <th scope="col">Classe</th>
                      <th scope="col">Turno</th>
                      <th scope="col">Coordenador</th>
                      <th scope="col">Disciplinas</th>
                      <th scope="col">Descrição</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                    <?php $crud-> ComboTurma() ?>

                    </tr>
                  </tbody>
                </table>
                <!-- End Table with stripped rows -->
  
              </div>
            </div>
  
          </div>
        </div>
      </section>

  </main><!-- End #main -->

  <!-- inclusão do footer -->
  <?php include 'footer.php' ?>