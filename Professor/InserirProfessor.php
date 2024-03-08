<?php

require_once("../config.php");

function inserirProfessor($nome, $formacao, $telefone, $email, $aluno_id)
{
    global $pdo;
    $sql = "SELECT * FROM professores WHERE nome = :nome";
    $stm = $pdo->prepare($sql);
    $stm->bindParam(":nome", $nome);
    $stm->execute();
    $result = $stm->fetchAll(PDO::FETCH_ASSOC);

    if (count($result) > 0) {
        echo "<div class='alert alert-danger alert-dismissible fade show mt-4' role='alert'>
            Professor já cadastrado no sistema!
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>";
    } else {
        $sql = "INSERT INTO professores (nome, formacao, telefone, email, aluno_id) VALUES (:nome, :formacao, :telefone, :email, :aluno_id)";
        $stm = $pdo->prepare($sql);
        $stm->bindParam(":nome", $nome);
        $stm->bindParam(":formacao", $formacao);
        $stm->bindParam(":telefone", $telefone);
        $stm->bindParam(":email", $email);
        $stm->bindParam(":aluno_id", $aluno_id);
        $stm->execute();
        header("Location: ListarProfessores.php?inserir=ok");
        exit();
    }
}
function consultarAlunos(){
    global $pdo;
    $sql = "SELECT * FROM aluno";
    $stm = $pdo->query($sql);
    return $stm->fetchAll(PDO::FETCH_ASSOC);
}

if($_POST){
    if(isset($_POST['nome']) && isset($_POST['formacao']) && isset($_POST['telefone']) && isset($_POST['email']) && isset($_POST['aluno_id'])){
        inserirProfessor($_POST['nome'], $_POST['formacao'], $_POST['telefone'], $_POST['email'], $_POST['aluno_id']);
    }
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cadastrar Professor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
<?php require_once("../navbar.php");?>
<br><br>
<div class="container">
    <h3>Inserir Professor</h3>
    <form action="InserirProfessor.php" method="POST">
        <div class="row">
            <div class="col-7 mt-4">
                <label for="nome" class="form-label">Informe o nome:</label>
                <input type="text" id="nome" name="nome" class="form-control" required/>
            </div>
            <div class="col-5 mt-4">
                <label for="formacao" class="form-label">Informe a formação:</label>
                <input type="text" id="formacao" name="formacao" class="form-control" required/>
            </div>
            <div class="col-7 mt-4">
                <label for="telefone" class="form-label">Informe o telefone:</label>
                <input type="text" id="telefone" name="telefone" class="form-control" required/>
            </div>
            <div class="col-5 mt-4">
                <label for="email" class="form-label">Informe o e-mail:</label>
                <input type="text" id="email" name="email" class="form-control" required/>
            </div>
            <div class="row mt-4">
                <div class="col-6">
                    <label class="form-label">Selecione um Aluno:</label>
                    <select name="aluno_id" class="form-select" required>
                        <option value=""></option>
                        <?php
                        $dados = consultarAlunos();
                        if ($dados != null) {
                            foreach ($dados as $d) {
                                echo "<option value='{$d['id']}'>{$d['nome']}</option>";
                            }
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <button class="btn bg-info text-white mt-4" type="submit">Salvar Dados</button>
                </div>
            </div>
        </div>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>