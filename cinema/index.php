<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Banco de dados | Filmes</title>
    <link rel="shortcut icon" href="img/filme-icon.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
            integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="styleindex.css">
</head>
<body>
    <header>
        <h3 class="fs-3 text-uppercase text-center" style="color: white;">Banco de dados - FILMES</h3>
    </header>

    <div class="d-flex justify-content-evenly">
        <div class="card" style="width: 18rem;">
            <img src="img/diretor.jpg" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">DIRETORES</h5>
                <p class="card-text">Aqui você pode cadatrar seus diretores preferidos.</p>
                <a href="addDiretor.php" class="btn" style="background-color: #ff4700; color: white;">Vamos lá!</a>
            </div>
        </div>
        <div class="card" style="width: 18rem;">
            <img src="img/genero.png" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">GENEROS</h5>
                <p class="card-text">Aqui você pode cadatrar seus gêneros de filmes preferidos.</p>
                <a href="addGenero.php" class="btn" style="background-color: #ff4700; color: white;">Vamos lá!</a>
            </div>
        </div>
        <div class="card" style="width: 18rem;">
            <img src="img/filme.jpg" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">FILMES</h5>
                <p class="card-text">Aqui você pode cadatrar seus filmes preferidos.</p>
                <a href="Add_Filme.php" class="btn" style="background-color: #ff4700; color: white;">Vamos lá!</a>
            </div>
        </div>
    </div>

    <footer>
        <h5 class="font-monospace mt-auto p-2" style="font-size: 13px; color: white;">Atividade realizada por: Nayara Brabo</h5>
    </footer>
    
</body>
</html>