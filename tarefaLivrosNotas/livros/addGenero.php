<?php
include('conn.php');
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['genero'];

    $stmt = $pdo->prepare('INSERT INTO   tbgenero (genero) VALUES (?)');
    $stmt->execute([$nome]);

    $_SESSION['mensagem'] = "GÊNERO LITERÁRIO CADASTRADO COM SUCESSO!";
    header('Location: addGenero.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar | Gêneros Literários</title>
    <link rel="shortcut icon" href="img/livros.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/style.css">
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
        <h3 class="text-uppercase text-center" style="color: white; font-size: 38px">Cadastrar GÊNEROS LITERÁRIOS</h3>
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
                Cadastrar GÊNERO LITERÁRIO dos livros
            </div>
            <div class="card-body">
                <form action="" method="POST">
                    <div class="input-group flex-nowrap">
                        <span class="input-group-text" id="addon-wrapping"><i class="bi bi-grid"></i></span>
                        <input type="text" class="form-control font-monospace" placeholder="Digite o Gênero Literário..." aria-label="Username" aria-describedby="addon-wrapping" name="genero" required>
                    </div>

                    <input type="submit" value="CADASTRAR GÊNERO LITERÁRIO" class="btn btn-outline-primary">
                </form>
            </div>
        </div>
    </div>

    <footer class=" d-flex justify-content-center">
        <br><a class="btnVoltar btn btn-outline-primary" href="index.php">VOLTAR PARA O MENU</a>
    </footer>

</body>

</html>