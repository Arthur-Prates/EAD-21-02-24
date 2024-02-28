<?php
include_once './config/constantes.php';
include_once './config/conexao.php';
include_once './func/funcoes.php';

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PNEAD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/7.0.96/css/materialdesignicons.min.css"
          &gt;>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css'>
    <link rel="stylesheet" href="./css/style.css">
</head>

<body class="bg-black">
<?php
include_once('nav.php');
?>
<div class="fundo">
    <div class="container-fluid hBody text-white text-center">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12"></div>
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="barraPesquisa">
                    <form action="musicaspotify.php" method="get" id="frmMusic">
                        <div class="search-box active">
                            <input type="text" placeholder="Pesquise uma música" class="active" name="musica"
                                   required="required">
                            <button type="submit" class="btn">
                                <div class="search-icon active">
                                    <i class="fas fa-search"></i>
                                </div>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12"></div>
        </div>
    </div>
</div>

<div class="container">
    <footer class="py-5">
        <div class="row">
            <div class="col-6 col-md-2 mb-3 text-center">
                <h5>PNEAD</h5>
                <ul class="nav flex-column text-white">
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-white">Termos de Serviço</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-white">Política de Privacidade</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-white">Sobre nós</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-white">S.A.C</a></li>
                </ul>
            </div>

            <div class="col-6 col-md-2 mb-3 text-center">
                <h5>Ritmos</h5>
                <ul class="nav flex-column text-white">
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-white">Sertanejo</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-white">Gospel</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-white">Rap</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-white">Eletrônica</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-white">Rock</a></li>
                </ul>
            </div>

            <div class="col-6 col-md-2 mb-3">

            </div>

            <div class="col-md-5 offset-md-1 mb-3 text-center">
                <img src="./img/logo.jpg" alt="" width="50%">
            </div>
        </div>

        <div class="d-flex flex-column flex-sm-row justify-content-between py-4 my-4 border-top">
            <p>© PNEAD 2024, todos os direitos reservados.</p>
            <ul class="list-unstyled d-flex text-white">
                <li class="ms-3"><i class="bi bi-twitter-x"></i></li>
                <li class="ms-3"><i class="bi bi-instagram"></i></li>
                <li class="ms-3"><i class="bi bi-threads"></i></li>
            </ul>
        </div>
    </footer>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
        crossorigin="anonymous"></script>
</body>

</html>