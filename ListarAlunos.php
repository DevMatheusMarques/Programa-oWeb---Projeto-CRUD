<?php

    require_once("config.php");

    function consultarAlunos(){
        global $pdo;
        $sql = "SELECT * FROM aluno";
        $stm = $pdo->query($sql);
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cadastro de Alunos</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>
<body>
<?php require_once("navbar.php");?>
    <div class="container">
        <br><br>
        <h3>Cadastro de Alunos</h3>

        <?php
        if (isset($_GET['inserir'])) {
          ?>
          <div class="alert alert-success alert-dismissible fade show" role="alert">
              Registro inserido com sucesso!
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        <?php } ?>

        <?php
        if (isset($_GET['alterar'])) {
          ?>
          <div class="alert alert-success alert-dismissible fade show" role="alert">
              Registro alterado com sucesso!
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        <?php } ?>

        <?php
        if (isset($_GET['excluir'])) {
          ?>
          <div class="alert alert-success alert-dismissible fade show" role="alert">
              Registro excluido com sucesso!
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        <?php } ?>

        <br>
        <a href="InserirAluno.php" class="btn btn-info text-white">Inserir novo Aluno</a>
        <br><br>
        <table class="table table-white border-info table-hover">
          <thead>
              <tr>
                  <th class="border-bottom border-info">Nome</th>
                  <th class="border-bottom border-info">Curso</th>
                  <th class="border-bottom border-info">Ações</th>
              </tr>
          </thead>
          <tbody>
          <?php
          $dados = consultarAlunos();
          if ($dados != null) {
              foreach ($dados as $d) {
                  echo "
                    <tr>
                        <td>{$d['nome']}</td>
                        <td>{$d['curso']}</td>
                        <td>
                        <a class='btn btn-warning' href='AlterarAluno.php?id=" . $d['id'] . "'>Alterar</a>
                        <a class='btn btn-danger' href='ExcluirAluno.php?id=" . $d['id'] . "'>Excluir</a>
                        </td>
                    </tr>";
              }
          } else {
              echo "<tr><td colspan='2'>Tabela vazia!</td></tr>";
          }
          ?>
          </tbody>
        </table>
        </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
            crossorigin="anonymous">

    </script>
    <script>
        $(document).ready(function() {
            $(".main div").hide();

            $(".slidebar li:first").attr("id","active");

            $(".main div:first").fadeIn();

            $('.slidebar a').click(function(e) {
                e.preventDefault();
                if ($(this).closest("li").attr("id") == "active"){
                    return
                }else{
                    $(".main div").hide();

                    $(".slidebar li").attr("id","");

                    $(this).parent().attr("id","active");
                    // active le parent du li selectionner

                    $('#' + $(this).attr('name')).fadeIn();
                    // Montre le texte
                }
            });
        });
    </script>
  </body>
</html>