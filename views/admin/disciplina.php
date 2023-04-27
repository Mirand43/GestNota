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
                <p>Lista dos disciplinas</p>
  
                <!-- Table with stripped rows -->
                <table class="table datatable">
                  <thead>
                    <tr>
                      <th scope="col">Id</th>
                      <th scope="col">Descrição</th>
                      <th scope="col">Coordenador da cadeira</th>
                      <th scope="col">Data de registro</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th scope="row">1</th>
                      <td>Matemática</td>
                      <td>António</td>
                      <td>2021-05-25</td>
                    </tr>
                    <tr>
                      <th scope="row">2</th>
                      <td>Física</td>
                      <td>Miranda</td>
                      <td>2021-12-05</td>
                    </tr>
                    <tr>
                      <th scope="row">3</th>
                      <td>Química</td>
                      <td>Quintas</td>
                      <td>2021-08-12</td>
                    </tr>
                    <tr>
                      <th scope="row">4</th>
                      <td>EMC</td>
                      <td>Jorge</td>
                      <td>2022-06-11</td>
                    </tr>
                    <tr>
                      <th scope="row">5</th>
                      <td>EVP</td>
                      <td>Manuel</td>
                      <td>2021-04-19</td>
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