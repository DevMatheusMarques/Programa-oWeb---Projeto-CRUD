<?php

require_once("../config.php");

function excluirProfessor($id){
    global $pdo;
    $sql = "DELETE FROM professores WHERE id = :id";
    $stm = $pdo->prepare($sql);
    $stm->bindParam(":id", $id);
    $stm->execute();
    header("Location: ListarProfessores.php?excluir=ok");
    exit();
}

function consultarPorId($id){
    global $pdo;
    $sql = "SELECT * FROM professores WHERE id = :id";
    $stm = $pdo->prepare($sql);
    $stm->bindParam(":id", $id);
    $stm->execute();
    return $stm->fetch(PDO::FETCH_ASSOC);
}

if($_POST){
    if(isset($_POST['id'])){
        excluirProfessor($_POST['id']);
    }
} elseif (isset($_GET['id'])){
    $professor = consultarPorId($_GET['id']);
} else {
    header("Location: ListarProfessores.php");
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Excluir Cadastro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body class="container">
<?php require_once("../navbar.php");?>
<br><br>
<h3>Excluir Professor</h3>
<form action="ExcluirProfessor.php" method="POST">
    <input type="hidden" name="id" value="<?=$_GET['id']?>">
    <div class="row">
        <div class="col-7">
            <label for="nome" class="form-label">Nome:</label>
            <input disabled type="text" id="nome" name="nome" class="form-control" value="<?=$professor['nome']?>" required/>
        </div>
        <div class="col-5">
            <label for="formacao" class="form-label">Formação:</label>
            <input disabled type="text" id="formacao" name="formacao" class="form-control" value="<?=$professor['formacao']?>" required/>
        </div>
        <div class="col-7">
            <label for="telefone" class="form-label">Telefone:</label>
            <input disabled type="text" id="telefone" name="telefone" class="form-control" value="<?=$professor['telefone']?>" required/>
        </div>
        <div class="col-7">
            <label for="email" class="form-label">E-mail:</label>
            <input disabled type="text" id="email" name="email" class="form-control" value="<?=$professor['email']?>" required/>
        </div>
        <div class="col-7">
            <label for="aluno_id" class="form-label">ID do Aluno:</label>
            <input disabled type="number" id="aluno_id" name=aluno_id" class="form-control" value="<?=$professor['aluno_id']?>" required/>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col">
            <button class="btn btn-danger" type="submit">Excluir Dados</button>
        </div>
    </div>
</form>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>