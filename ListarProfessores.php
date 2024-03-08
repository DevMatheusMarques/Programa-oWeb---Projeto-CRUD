<?php

require_once("config.php");

function consultarProfessores(){
    global $pdo;
    $sql = "SELECT * FROM professores";
    $stm = $pdo->query($sql);
    return $stm->fetchAll(PDO::FETCH_ASSOC);
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cadastro de Professores</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
<?php require_once("navbar.php");?>
    <div class="container">
        <br><br>
        <h3>Cadastro de Professores</h3>

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
        <a href="InserirProfessor.php" class="btn btn-info text-white">Inserir novo Professor</a>
        <br><br>
        <table class="table table-white border-info table-hover">
            <thead>
            <tr>
                <th>Nome</th>
                <th>Formação</th>
                <th>Telefone</th>
                <th>E-mail</th>
                <th>ID do Aluno</th>
                <th>Ações</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $dados = consultarProfessores();
            if ($dados != null) {
                foreach ($dados as $d) {
                    echo "
                    <tr>
                        <td>{$d['nome']}</td>
                        <td>{$d['formacao']}</td>
                        <td>{$d['telefone']}</td>
                        <td>{$d['email']}</td>
                        <td>{$d['aluno_id']}</td>
                        <td>
                        <a class='btn btn-warning' href='AlterarProfessor.php?id=" . $d['id'] . "'>Alterar</a>
                        <a class='btn btn-danger' href='ExcluirProfessor.php?id=" . $d['id'] . "'>Excluir</a>
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