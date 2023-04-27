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
                            <form class="row g-3">
                                <div class="col-md-4">
                                    <label for="validationDefault01" class="form-label">Nome completo</label>
                                    <input type="text" class="form-control" id="validationDefault01"
                                        required>
                                </div>
                                <div class="col-md-3">
                                    <label for="validationDefault04" class="form-label">Sexo</label>
                                    <select class="form-select" id="validationDefault04" required>
                                        <option selected disabled value="">Escolha...</option>
                                        <option value="M">Masculino</option>
                                        <option value="F">Femenino</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="validationDefaultUsername" class="form-label">E-mail</label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="inputGroupPrepend2">@</span>
                                        <input type="text" class="form-control" id="validationDefaultUsername"
                                            aria-describedby="inputGroupPrepend2" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label for="validationDefault03" class="form-label">Endereço</label>
                                    <input type="text" class="form-control" id="validationDefault03" required>
                                </div>
                                <div class="col-md-3">
                                    <label for="validationDefault04" class="form-label">Estado cívil</label>
                                    <select class="form-select" id="validationDefault04" required>
                                        <option selected disabled value="">Escolher...</option>
                                        <option value="S">Solterio</option>
                                        <option value="C">Casado</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="validationDefault05" class="form-label">Número de telefone</label>
                                    <input type="text" class="form-control" id="validationDefault05" required>
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
                                    <button class="btn btn-primary" type="submit">Cadastrar</button>
                                </div>
                                <div class="col-md-1">
                                    <a href="funcionario.html" class="btn btn-danger">Cancelar</a>
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