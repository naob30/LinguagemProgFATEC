<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD | Livros</title>
    <link rel="shortcut icon" href="img/livros.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="styleindex.css">
</head>

<body>
    <header>
        <h3 class="text-uppercase text-center" style="color: white; font-size: 50px;">CRUD - LIVROS</h3>
    </header>

    <div class="d-flex justify-content-evenly banner">
        <div class="column">
            <div class="col-sm-10 mb-3 mb-sm-0">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">AUTORES</h5>
                        <p class="card-text">Cadastre aqui os autores existentes na biblioteca.</p>
                        <a href="addAutor.php" class="btn btn-primary btCadastrar">Cadastrar</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-10">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">GÊNEROS LITERÁRIOS</h5>
                        <p class="card-text">Cadastre aqui os gêneros existentes na biblioteca.</p>
                        <a href="addGenero.php" class="btn btn-primary btCadastrar">Cadastrar</a>
                    </div>
                </div>
            </div>
        </div>
        <img src="img/livros.png" alt="">
        <div class="column">
            <div class="col-sm-10 mb-3 mb-sm-0">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">EDITORA</h5>
                        <p class="card-text">Cadastre aqui as editoras existentes na biblioteca.</p>
                        <a href="addEditora.php" class="btn btn-primary btCadastrar">Cadastrar</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-10">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">LIVROS</h5>
                        <p class="card-text">Cadastre aqui os livros existentes na biblioteca.</p>
                        <a href="addLivro.php" class="btn btn-primary btCadastrar">Cadastrar</a>
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