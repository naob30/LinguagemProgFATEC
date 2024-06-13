<?php
include('conn.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $titulo = $_POST['titulo'];
    $genero_id = $_POST['genero_id'];
    $diretor_id = $_POST['diretor_id'];
    $ano = $_POST['ano'];

    $stmt = $pdo->prepare('INSERT INTO filme (titulo, genero_id, diretor_id, ano) VALUES (?, ?, ?, ?)');
    $stmt->execute([$titulo, $genero_id, $diretor_id, $ano]);

    header('Location: add_Filme.php');
    exit();
}

$generos = $pdo->query('SELECT id, nome FROM genero')->fetchAll();
$diretores = $pdo->query('SELECT id, nome FROM diretor')->fetchAll();
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Filme</title>
    <link rel="shortcut icon" href="img/filme-icon.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <header>
        <h3 class="fs-3 text-uppercase text-center" style="color: white;">Cadastrar novo filme</h3>
    </header>

    <div class="d-flex justify-content-center banner">
        <div class="card d-flex justify-content-center">
            <div class="card-header font-monospace">
                CADASTRAR NOVO FILME
            </div>
            <div class="card-body">
                <form action="" method="POST">
                    <div class="input-group flex-nowrap">
                        <span class="input-group-text" id="addon-wrapping"><i class="bi bi-disc"></i></span>
                        <input type="text" class="form-control font-monospace" placeholder="Digite o título do filme..." aria-label="Username" aria-describedby="addon-wrapping" name="titulo" required>
                    </div>
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="inputGroupSelect01">Gênero</label>
                        <select class="form-select" id="inputGroupSelect01" nome="genero_id">
                            <option>Selecione o gênero do filme</option>
                            <?php foreach ($generos as $genero) : ?>
                                <option value="<?= $genero['id'] ?>"><?= $genero['nome'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="inputGroupSelect01">Diretor</label>
                        <select class="form-select" id="inputGroupSelect01" nome="diretor_id">
                            <option>Selecione o diretor do filme</option>
                            <?php foreach ($diretores as $diretor) : ?>
                                <option value="<?= $diretor['id'] ?>"><?= $diretor['nome'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="input-group flex-nowrap">
                        <span class="input-group-text" id="addon-wrapping"><i class="bi bi-calendar-check"></i></span>
                        <input type="text" class="form-control font-monospace" placeholder="Digite o ano de lançamento do filme..." aria-label="Username" aria-describedby="addon-wrapping" name="ano" required>
                    </div>

                    <input type="submit" value="CADASTRAR FILME" class="btn btn-outline-primary">
                </form>
            </div>
        </div>
    </div>

    <footer class=" d-flex justify-content-center">
        <a class="btnVoltar btn btn-outline-primary" href="index.php">VOLTAR PARA O MENU</a>
    </footer>
</body>

</html>