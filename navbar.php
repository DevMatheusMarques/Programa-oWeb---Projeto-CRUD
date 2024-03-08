<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

<nav class="navbar navbar-expand-lg bg-info">
    <div class="container-fluid">
        <a class="navbar-brand text-white" href="./index.php">Projeto CRUD</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse ms-5">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active text-white ms-5" aria-current="page" href="./ListarAlunos.php">Alunos Cadastrados</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white ms-5" href="./ListarProfessores.php">Professores Cadastrados</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white ms-5" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Cadastrar
                    </a>
                    <ul class="dropdown-menu bg-info bg:hover-none ms-auto">
                        <li><a class="dropdown-item text-white bg-info" href="./InserirAluno.php">Cadastrar Aluno</a></li>
                        <li><a class="dropdown-item text-white bg-info" href="./InserirProfessor.php">Cadastrar Professor</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
