<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD | Filmes</title>
    <link rel="shortcut icon" href="img/caneta.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="styleindex.css">
</head>

<body>
    <header>
        <h3 class="text-uppercase text-center" style="color: white; font-size: 50px;">CRUD - NOTAS</h3>
    </header>

    <div class="d-flex justify-content-evenly banner">
        <div class="column">
            <div class="col-sm-10 mb-3 mb-sm-0">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">ALUNO</h5>
                        <p class="card-text">Cadastre aqui os alunos da escola.</p>
                        <a href="addAluno.php" class="btn btn-primary btCadastrar">Cadastrar</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-10">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">PROFESSORES</h5>
                        <p class="card-text">Cadastre aqui os professores da escola.</p>
                        <a href="addProfessor.php" class="btn btn-primary btCadastrar">Cadastrar</a>
                    </div>
                </div>
            </div>
        </div>
        <img src="img/ESTUDANTE.png" alt="">
        <div class="column">
            <div class="col-sm-10 mb-3 mb-sm-0">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">DISCIPLINA</h5>
                        <p class="card-text">Cadastre aqui as disciplinas ofertadas na escola.</p>
                        <a href="addDisciplina.php" class="btn btn-primary btCadastrar">Cadastrar</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-10">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">NOTAS</h5>
                        <p class="card-text">Cadastre aqui as notas dos alunos por disciplina.</p>
                        <a href="addNota.php" class="btn btn-primary btCadastrar">Cadastrar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer>
        <h5 class="font-monospace" style="font-size: 15px; color: white;">Atividade realizada por: Nayara Brabo</h5>
    </footer>

</body>

</html>