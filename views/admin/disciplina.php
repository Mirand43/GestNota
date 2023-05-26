<?php include 'header.php' ?>

<!-- inclusão do sidebar -->
<?php include 'sidebar.php' ?>

<!-- Conteudo -->
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Disciplina</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="funcionario.html">Disciplinas</a></li>
          <li class="breadcrumb-item active">Lista</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
          <div class="col-lg-12">
  
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Tabela de disciplinas</h5>
                <p>Lista das disciplinas</p>
  
                <!-- Table with stripped rows -->
                <table class="table datatable">
                  <thead>
                    <tr>
                      <th scope="col">Descrição</th>
                      <th scope="col">Coordenador</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                    <?php $crud-> ComboDisciplina() ?>
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