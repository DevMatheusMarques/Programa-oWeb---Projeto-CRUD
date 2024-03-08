<?php

require_once("config.php");

function inserirAluno($nome, $curso)
{
    global $pdo;
    $sql = "SELECT * FROM professores WHERE nome = :nome";
    $stm = $pdo->prepare($sql);
    $stm->bindParam(":nome", $nome);
    $stm->execute();
    $result = $stm->fetchAll(PDO::FETCH_ASSOC);

    if (count($result) > 0) {
        echo "<div class='alert alert-danger alert-dismissible fade show mt-4' role='alert'>
                Aluno já cadastrado no sistema!
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>";
    } else {
        global $pdo;
        $sql = "INSERT INTO aluno (nome, curso) VALUES (:nome, :curso)";
        $stm = $pdo->prepare($sql);
        $stm->bindParam(":nome", $nome);
        $stm->bindParam(":curso", $curso);
        $stm->execute();
        header("Location: ListarAlunos.php?inserir=ok");
        exit();
    }
}

if($_POST){
    if(isset($_POST['nome']) && isset($_POST['curso'])){
      inserirAluno($_POST['nome'], $_POST['curso']);
    }
}

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cadastrar Aluno</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
  <?php require_once("navbar.php");?>
  <br><br>
  <div class="container">
    <h3>Inserir Aluno</h3>
    <form action="InserirAluno.php" method="POST">
        <div class="row">
        <div class="col-7">
          <label for="nome" class="form-label">Informe o nome:</label>
          <input type="text" id="nome" name="nome" class="form-control" required/>
        </div>
        <div class="col-5">
          <label for="curso" class="form-label">Informe o curso:</label>
          <input type="text" id="curso" name="curso" class="form-control" required/>
        </div>
        <div class="row">
        <div class="col">
          <button class="btn bg-info mt-4 text-white" type="submit">Salvar Dados</button>
        </div>
        </div>
    </form>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>