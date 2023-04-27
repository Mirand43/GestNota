<?php include 'header.php' ?>

<!-- inclusão do sidebar -->
<?php include 'sidebar.php' ?>

<!-- conteúdo -->
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Aluno</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="funcionario.html">Alunos</a></li>
          <li class="breadcrumb-item active">Lista</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
          <div class="col-lg-12">
  
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Tabela de alunos</h5>
                <p>Lista dos alunos cadastrados</p>
  
                <!-- Table with stripped rows -->
                <table class="table datatable">
                  <thead>
                    <tr>
                      <th scope="col">Id</th>
                      <th scope="col">Nome</th>
                      <th scope="col">Classe</th>
                      <th scope="col">Idade</th>
                      <th scope="col">Data de registro</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th scope="row">1</th>
                      <td>Brandon Jacob</td>
                      <td>8</td>
                      <td>28</td>
                      <td>2021-05-25</td>
                    </tr>
                    <tr>
                      <th scope="row">2</th>
                      <td>Bridie Kessler</td>
                      <td>6</td>
                      <td>35</td>
                      <td>2021-12-05</td>
                    </tr>
                    <tr>
                      <th scope="row">3</th>
                      <td>Ashleigh Langosh</td>
                      <td>6</td>
                      <td>45</td>
                      <td>2021-08-12</td>
                    </tr>
                    <tr>
                      <th scope="row">4</th>
                      <td>Angus Grady</td>
                      <td>5</td>
                      <td>34</td>
                      <td>2022-06-11</td>
                    </tr>
                    <tr>
                      <th scope="row">5</th>
                      <td>Raheem Lehner</td>
                      <td>8</td>
                      <td>47</td>
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