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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/7.0.96/css/materialdesignicons.min.css" &gt;>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css'>
    <link rel="stylesheet" href="./css/style.css">
</head>

<body class="bg-black">
   <?php
   include_once ('nav.php');
   ?>
    <div class="fundo">

        <div class="container-fluid hBody text-white text-center position-relative">
            <div class="position-absolute top-50 start-50 translate-middle text-center">
                <!-- <div class="fs-3 text-black">Suas músicas favoritas direto no Spotify <i class="bi bi-spotify corSpotify text-success"></i></div> -->
                <form action="musicaspotify.php" method="get" id="frmMusic">
                    <div class="search-box active">
                        <input type="text" placeholder="Pesquise uma música" class="active" name="musica" required="required">
                        <button type="submit" class="btn">
                            <div class="search-icon active">
                                <i class="fas fa-search"></i>
                            </div>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="container-fluid bg-black">
        <footer class="row row-cols-1 row-cols-sm-2 row-cols-md-5 py-5 my-5 border-top">
            <div class="col mb-3 text-center">
                <img src="./img/logo.jpg" alt="" width="50%">
                <p class="text-white">© PNEAD 2024, todos os direitos reservados.</p>
            </div>

            <div class="col mb-3">

            </div>
            <div class="col mb-3 text-white">
                <!-- <h5>Section</h5>
            <ul class="nav flex-column text-white">
                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-white">Home</a></li>
                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-white">Features</a></li>
                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-white">Pricing</a></li>
                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-white">FAQs</a></li>
                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-white">About</a></li>
            </ul> -->
            </div>

            <div class="col mb-3 text-white">
                <h5>PNEAD</h5>
                <ul class="nav flex-column text-white">
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-white">Termos de Serviço</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-white">Política de Privacidade</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-white">Sobre nós</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-white">S.A.C</a></li>
                </ul>
            </div>

            <div class="col mb-3 text-white">
                <h5>Ritmos</h5>
                <ul class="nav flex-column text-white">
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-white">Sertanejo</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-white">Gospel</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-white">Rap</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-white">Eletrônica</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-white">Rock</a></li>
                </ul>
            </div>

        </footer>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>

</html>