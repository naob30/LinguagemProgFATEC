<?php
include('conn.php');
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Exibir valores recebidos para debug
    var_dump($_POST);

    $nomeLivro = $_POST['nomeLivro'] ?? null;
    $edicao = $_POST['edicao'] ?? null;
    $codGenero = $_POST['codGenero'] ?? null;
    $codAutor = $_POST['codAutor'] ?? null;
    $codEditora = $_POST['codEditora'] ?? null;

    if ($nomeLivro && $edicao && $codGenero && $codAutor && $codEditora) {
        $stmt = $pdo->prepare('INSERT INTO tbLivro (nomeLivro, edicao, codGenero, codAutor, codEditora) VALUES (?, ?, ?, ?, ?)');
        $stmt->execute([$nomeLivro, $edicao, $codGenero, $codAutor, $codEditora]);

        $_SESSION['mensagem'] = "LIVRO CADASTRADO COM SUCESSO!";
        header('Location: addLivro.php');
        exit();
    } else {
        echo "Por favor, preencha todos os campos.";
    }
}

// Obter autores
$autores = $pdo->query("SELECT codAutor, nomeAutor FROM tbAutor")->fetchAll(PDO::FETCH_ASSOC);

// Obter editoras
$editoras = $pdo->query("SELECT codEditora, nomeEditora FROM tbEditora")->fetchAll(PDO::FETCH_ASSOC);

// Obter gêneros
$generos = $pdo->query("SELECT codGenero, genero FROM tbGenero")->fetchAll(PDO::FETCH_ASSOC);

// Obter livros com JOIN para trazer nomes de autor, editora e gênero
$livros = $pdo->query("
    SELECT 
        l.codLivro, l.nomeLivro, l.edicao, 
        a.nomeAutor, 
        e.nomeEditora, 
        g.genero 
    FROM 
        tbLivro l
    JOIN 
        tbAutor a ON l.codAutor = a.codAutor
    JOIN 
        tbEditora e ON l.codEditora = e.codEditora
    JOIN 
        tbGenero g ON l.codGenero = g.codGenero
")->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar | Livro</title>
    <link rel="shortcut icon" href="img/livros.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/style.css">
    <style>
        #mensagem {
            display: none;
            text-align: center;
            opacity: 0;
            transition: opacity 1s;
        }
        #mensagem.show {
            display: block;
            opacity: 1;
        }
        #mensagem.hide {
            opacity: 0;
            transition: opacity 1s;
        }
    </style>
    <script>
        function exibirMensagem() {
            const mensagem = document.getElementById('mensagem');
            if (mensagem) {
                mensagem.classList.add('show');
                setTimeout(() => {
                    mensagem.classList.add('hide');
                }, 4000); // Inicia o fade-out após 4 segundos
                setTimeout(() => {
                    mensagem.style.display = 'none';
                }, 5000); // Remove a mensagem após o fade-out
            }
        }

        window.onload = exibirMensagem;
    </script>
</head>

<body>
    <header>
        <h3 class="text-uppercase text-center" style="color: white; font-size: 38px">Cadastrar Livro</h3>
    </header>

    <?php
    if (isset($_SESSION['mensagem'])) {
        echo "<div id='mensagem' class='alert alert-success' role='alert'>".$_SESSION['mensagem']."</div>";
        unset($_SESSION['mensagem']);
    }
    ?>

    <div class="d-flex justify-content-center banner">
        <div class="card d-flex justify-content-center">
            <div class="card-header font-monospace text-uppercase">
                Cadastrar Livro na Biblioteca
            </div>
            <div class="card-body">
                <form action="" method="POST">
                    <div class="input-group flex-nowrap mb-3">
                        <span class="input-group-text" id="addon-wrapping"><i class="bi bi-book"></i></span>
                        <input type="text" class="form-control font-monospace" placeholder="Digite o título do livro..." aria-label="nomeLivro" aria-describedby="addon-wrapping" name="nomeLivro" required>
                    </div>
                    <div class="input-group flex-nowrap mb-3">
                        <span class="input-group-text" id="addon-wrapping"><i class="bi bi-postcard"></i></span>
                        <input type="text" class="form-control font-monospace" placeholder="Digite a edição do livro..." aria-label="edicao" aria-describedby="addon-wrapping" name="edicao" required>
                    </div>
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="codGenero">Gênero</label>
                        <select class="form-select" id="codGenero" name="codGenero" required>
                            <option value="" disabled selected>Selecione um gênero</option>
                            <?php foreach ($generos as $genero): ?>
                                <option value="<?= $genero['codGenero'] ?>"><?= $genero['genero'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="codAutor">Autor</label>
                        <select class="form-select" id="codAutor" name="codAutor" required>
                            <option value="" disabled selected>Selecione um autor</option>
                            <?php foreach ($autores as $autor): ?>
                                <option value="<?= $autor['codAutor'] ?>"><?= $autor['nomeAutor'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="codEditora">Editora</label>
                        <select class="form-select" id="codEditora" name="codEditora" required>
                            <option value="" disabled selected>Selecione uma editora</option>
                            <?php foreach ($editoras as $editora): ?>
                                <option value="<?= $editora['codEditora'] ?>"><?= $editora['nomeEditora'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <input type="submit" value="CADASTRAR LIVRO" class="btn btn-outline-primary">
                </form>
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <h3 class="text-center">LIVROS CADASTRADOS</h3>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th style='text-align: center; text-transform: uppercase;' scope="col">#</th>
                    <th style='text-align: center; text-transform: uppercase;' scope="col">Nome do Livro</th>
                    <th style='text-align: center; text-transform: uppercase;' scope="col">Edição</th>
                    <th style='text-align: center; text-transform: uppercase;' scope="col">Gênero</th>
                    <th style='text-align: center; text-transform: uppercase;' scope="col">Autor</th>
                    <th style='text-align: center; text-transform: uppercase;' scope="col">Editora</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($livros as $livro): ?>
                    <tr>
                        <th style='text-align: center;' scope="row"><?= $livro['codLivro'] ?></th>
                        <td><?= $livro['nomeLivro'] ?></td>
                        <td style='text-align: center;'><?= $livro['edicao'] ?></td>
                        <td style='text-align: center;'><?= $livro['genero'] ?></td>
                        <td style='text-align: center;'><?= $livro['nomeAutor'] ?></td>
                        <td style='text-align: center;'><?= $livro['nomeEditora'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <footer class="d-flex justify-content-center">
        <br><a class="btnVoltar btn btn-outline-primary" href="index.php">VOLTAR PARA O MENU</a>
    </footer>
</body>

</html>