<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="index.php">Colombia</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href='index.php'>Inicio <span class="sr-only">(current)</span></a>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle"
                    href='<?php echo getUrl("Departamento","Departamento","getInsert");?>' id="navbarDropdown"
                    role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Departamento
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item"
                        href='<?php echo getUrl("Departamento","Departamento","consultInsert");?>'>Registrar</a>
                    <a class="dropdown-item"
                        href='<?php echo getUrl("Departamento","Departamento","consult");?>'>Consultar</a>

            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    Ciudad
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item"
                        href='<?php echo getUrl("Ciudad","Ciudad","consultInsert");?>'>Registrar</a>
                    <a class="dropdown-item" href='<?php echo getUrl("Ciudad","Ciudad","consult");?>'>Consultar</a>

            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    Usuario
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item"
                        href='<?php echo getUrl("Usuario","Usuario","getInsert");?>'>Registrar</a>
                    <a class="dropdown-item" href='<?php echo getUrl("Usuario","Usuario","consult");?>'>Consultar</a>

            </li>
        </ul>





    </div>
</nav>