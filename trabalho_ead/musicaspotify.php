<?php
include_once './config/constantes.php';
include_once './config/conexao.php';
include_once './funcao/funcoes.php';

if (isset($_GET['musica']) && !empty($_GET['musica'])) {
    $pesquisa = $_GET['musica'];
}

$pesquisaStr = str_replace(' ', '%20', $pesquisa);

$curl = curl_init();

curl_setopt_array($curl, [
    CURLOPT_URL => "https://spotify174.p.rapidapi.com/?trek=$pesquisaStr&limit=12&count_code=UZ&offset=10",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => [
        "X-RapidAPI-Host: spotify174.p.rapidapi.com",
        "X-RapidAPI-Key: f3697056c6mshf507cf0d38f0a8fp1108c4jsne9c8b282ba8b"
    ],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
    echo "cURL Error #:" . $err;
} else {
    //echo $response;
}

$musica = json_decode($response, true);

//--------------------------------------------------------------------------------------------------------------------
//--------------------------------------------------------------------------------------------------------------------
//--------------------------------------------------------------------------------------------------------------------

// $curl = curl_init();

// curl_setopt_array($curl, [
//     CURLOPT_URL => "https://spotify23.p.rapidapi.com/search/?q=$pesquisa&type=multi&offset=0&limit=12&numberOfTopResults=5",
//     CURLOPT_RETURNTRANSFER => true,
//     CURLOPT_ENCODING => "",
//     CURLOPT_MAXREDIRS => 10,
//     CURLOPT_TIMEOUT => 30,
//     CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//     CURLOPT_CUSTOMREQUEST => "GET",
//     CURLOPT_HTTPHEADER => [
//         "X-RapidAPI-Host: spotify23.p.rapidapi.com",
//         "X-RapidAPI-Key: f3697056c6mshf507cf0d38f0a8fp1108c4jsne9c8b282ba8b"
//     ],
// ]);

// $response = curl_exec($curl);
// $err = curl_error($curl);

// curl_close($curl);

// if ($err) {
//     echo "cURL Error #:" . $err;
// } else {
//     //echo $response;
// }


// $musica2 = json_decode($response, true);

// echo "<pre class='text-white'>";
// print_r($musica);
// echo "</pre>";


?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Música - <?php echo $pesquisa; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/7.0.96/css/materialdesignicons.min.css" &gt;>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css'>
    <link rel="stylesheet" href="./css/style.css">
</head>

<body class="bg-dark">
    <nav class="navbar navbar-expand-lg bg-dark border-bottom border-body" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><img src="./img/logo2.jpg" width="50px"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>
                </ul>
                <form action="musicaspotify.php" method="get" id="frmMusic" class="d-flex">
                    <input class="form-control me-2" type="search" name="musica" id="musica" placeholder="Buscar" aria-label="Search" required="required">
                    <button class="btn btn-outline-success" type="submit">Buscar</button>
                </form>
            </div>
        </div>
    </nav>
    <div class="container text-white">
        <div class="text-white fs-3 mt-2 mb-3">
            <?php
            if ($pesquisa != null) {
                if ($musica != null) {
            ?>
                    Exibindo resultados da busca por <b><?php echo $pesquisa; ?></b>
        </div>
        <div class="row">
            <div class="fs-4 mb-2">
                Músicas
            </div>
            <?php
                    foreach ($musica['result'] as $music) {
            ?>
                <div class="col-lg-2 col-md-3 col-sm-6 mt-2">
                    <div class="card bg-dark text-white">
                        <img src="<?php echo $music['image']; ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $music['name']; ?></h5>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item bg-dark text-white"><?php echo $music['artist']; ?></li>
                        </ul>
                        <div class="card-footer text-center align-middle">
                            <a href="<?php echo $music['link']; ?>" class="btn btn-success d-flex aling-items-center justify-content-center">Spotify <i class="bi bi-spotify fs-5"></i></a>
                        </div>
                    </div>
                </div>
            <?php
                    }
            ?>
        </div>
        <!-- <div class="row mt-5">
            <div class="fs-4 mb-2">
                Álbuns
            </div> -->
        <?php
                    //foreach ($musica2['tracks']['items'] as $albuns) {
        ?>
        <!-- <div class="col-lg-2 col-md-3 col-sm-6 mt-2">
            <div class="card bg-dark text-white">
                <img src="<?php //echo $albuns['data']['albumOfTrack']['coverArt']['sources']['0']['url']; 
                            ?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><?php //echo $albuns['data']['name']; 
                                            ?></h5>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item bg-dark text-white"><?php //echo $albuns['data']['artists']['items']['0']['profile']['name']; 
                                                                    ?></li>
                </ul>
                <div class="card-footer text-center align-middle">
                    <a href="<?php //echo $albuns['data']['albumOfTrack']['sharingInfo']['shareUrl']; 
                                ?>" class="btn btn-success d-flex aling-items-center justify-content-center">Spotify <i class="bi bi-spotify fs-5"></i></a>
                </div>
            </div>
        </div> -->
<?php

                    //    }
                }
            } else {
                echo 'Nenhum resultado encontrado! Verifique se digitou corretamente.';
            }
?>
    </div>
    </div>
    <div class="container">
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