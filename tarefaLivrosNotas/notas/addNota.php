<?php
include('conn.php');
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $RAAluno = $_POST['RAAluno'] ?? null;
    $codProfessor = $_POST['codProfessor'] ?? null;
    $codDisciplina = $_POST['codDisciplina'] ?? null;
    $nota = $_POST['nota'] ?? null;
    $faltas = $_POST['faltas'] ?? null;

    if ($RAAluno && $codProfessor && $codDisciplina && $nota !== null && $faltas !== null) {
        $stmt = $pdo->prepare('INSERT INTO tbNota (RAAluno, codProfessor, codDisciplina, nota, faltas) VALUES (?, ?, ?, ?, ?)');
        $stmt->execute([$RAAluno, $codProfessor, $codDisciplina, $nota, $faltas]);

        $_SESSION['mensagem'] = "NOTA CADASTRADA COM SUCESSO!";
        header('Location: addNota.php');
        exit();
    } else {
        echo "Por favor, preencha todos os campos.";
    }
}

// Obter alunos
$alunos = $pdo->query("SELECT RAAluno, nomeAluno FROM tbAluno")->fetchAll(PDO::FETCH_ASSOC);

// Obter professores
$professores = $pdo->query("SELECT codProfessor, nomeProfessor FROM tbProfessor")->fetchAll(PDO::FETCH_ASSOC);

// Obter disciplinas
$disciplinas = $pdo->query("SELECT codDisciplina, disciplina FROM tbDisciplina")->fetchAll(PDO::FETCH_ASSOC);

// Obter notas com JOIN para trazer nomes de aluno, professor e disciplina
$notas = $pdo->query("
    SELECT 
        n.codNota, n.nota, n.faltas, 
        a.nomeAluno, 
        p.nomeProfessor, 
        d.disciplina 
    FROM 
        tbNota n
    JOIN 
        tbAluno a ON n.RAAluno = a.RAAluno
    JOIN 
        tbProfessor p ON n.codProfessor = p.codProfessor
    JOIN 
        tbDisciplina d ON n.codDisciplina = d.codDisciplina
")->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar | Nota</title>
    <link rel="shortcut icon" href="img/caneta.png" type="image/x-icon">
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
        <h3 class="text-uppercase text-center" style="color: white; font-size: 38px">Cadastrar Nota</h3>
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
                Cadastrar Nota
            </div>
            <div class="card-body">
                <form action="" method="POST">
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="RAAluno">Aluno</label>
                        <select class="form-select" id="RAAluno" name="RAAluno" required>
                            <option value="" disabled selected>Selecione um aluno</option>
                            <?php foreach ($alunos as $aluno): ?>
                                <option value="<?= $aluno['RAAluno'] ?>"><?= $aluno['nomeAluno'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="codProfessor">Professor</label>
                        <select class="form-select" id="codProfessor" name="codProfessor" required>
                            <option value="" disabled selected>Selecione um professor</option>
                            <?php foreach ($professores as $professor): ?>
                                <option value="<?= $professor['codProfessor'] ?>"><?= $professor['nomeProfessor'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="codDisciplina">Disciplina</label>
                        <select class="form-select" id="codDisciplina" name="codDisciplina" required>
                            <option value="" disabled selected>Selecione uma disciplina</option>
                            <?php foreach ($disciplinas as $disciplina): ?>
                                <option value="<?= $disciplina['codDisciplina'] ?>"><?= $disciplina['disciplina'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="input-group flex-nowrap mb-3">
                        <span class="input-group-text" id="addon-wrapping"><i class="bi bi-journal-text"></i></span>
                        <input type="number" step="0.01" class="form-control font-monospace" placeholder="Digite a nota..." aria-label="nota" aria-describedby="addon-wrapping" name="nota" required>
                    </div>
                    <div class="input-group flex-nowrap mb-3">
                        <span class="input-group-text" id="addon-wrapping"><i class="bi bi-clipboard-x"></i></span>
                        <input type="number" class="form-control font-monospace" placeholder="Digite o número de faltas..." aria-label="faltas" aria-describedby="addon-wrapping" name="faltas" required>
                    </div>
                    <input type="submit" value="CADASTRAR NOTA" class="btn btn-outline-primary">
                </form>
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <h3 class="text-center">Notas Cadastradas</h3>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Aluno</th>
                    <th scope="col">Professor</th>
                    <th scope="col">Disciplina</th>
                    <th scope="col">Nota</th>
                    <th scope="col">Faltas</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($notas as $nota): ?>
                    <tr>
                        <th scope="row"><?= $nota['codNota'] ?></th>
                        <td><?= $nota['nomeAluno'] ?></td>
                        <td><?= $nota['nomeProfessor'] ?></td>
                        <td><?= $nota['disciplina'] ?></td>
                        <td><?= $nota['nota'] ?></td>
                        <td><?= $nota['faltas'] ?></td>
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
