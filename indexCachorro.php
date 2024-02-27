<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Api de Cachorro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/7.0.96/css/materialdesignicons.min.css"
          &gt;>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css'>
    <link rel="stylesheet" href="./css/style.css">
    <style>
        .efeito-vidro {
            background: rgba(255, 255, 255, 0.06);
            box-shadow: 0 8px 32px 0 rgba(56, 64, 212, 0.37);
            backdrop-filter: blur(13.5px);
            -webkit-backdrop-filter: blur(13.5px);
            border-radius: 10px;
            border: 1px solid rgba(255, 255, 255, 0.18);
        }

        .walldog {
            background-color: black;
            background: url("./img/walldog.jpg") !important;
            background-position: center !important;;
            background-repeat: no-repeat !important;;
            background-size: 100% 100% !important;
            min-height: 100vh !important;
        }
    </style>
</head>
<body class="text-white walldog">
<?php
include_once('nav.php');
?>
<div class="text-center">
    <form action="#" method="post" name="formLogin" id="formLogin">
        <div id="texto" name="texto" class=" text-light p-3 m-5">
            <h1> Site Usado https://thedogapi.com/</h1>
        </div>
        <div class="container">

            <div class="maincontent efeito-vidro">

                <div id="grid" class="imgrid row d-flex justify-content-center aling-items-center">

                </div>
            </div>
        </div>

    </form>
</div>


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
        crossorigin="anonymous"></script>
<script src="js/apicachorro.js"></script>
<script src="js/script.js"></script>
</body>
</html>