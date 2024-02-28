<?php
include_once './config/constantes.php';
include_once './config/conexao.php';
include_once './func/funcoes.php';

if (isset($_GET['musica']) && !empty($_GET['musica'])) {
    $pesquisa = $_GET['musica'];
}

$pesquisaStr = str_replace(' ', '%20', $pesquisa);

$_SESSION['pesquisa'] = $pesquisa;

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

$curl = curl_init();

curl_setopt_array($curl, [
    CURLOPT_URL => "https://spotify23.p.rapidapi.com/search/?q=$pesquisaStr&type=multi&offset=0&limit=12&numberOfTopResults=5",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => [
        "X-RapidAPI-Host: spotify23.p.rapidapi.com",
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


$musica2 = json_decode($response, true);

// echo "<pre class='text-white'>";
// print_r($musica2);
// echo "</pre>";


?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Música - <?php echo $pesquisa; ?></title>
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
<nav class="navbar navbar-expand-lg bg-black border-bottom border-body" data-bs-theme="dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#"><img src="./img/iconlogo.png" width="50px"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">Api Spotify</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="indexCachorro.php">Api Dog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="indexUser.php">Api User</a>
                </li>
            </ul>
            <form action="musicaspotify.php" method="get" id="frmMusic" class="d-flex">
                <input class="form-control me-2 bg-black" type="search" name="musica" id="musica" placeholder="Buscar"
                       aria-label="Search" required="required">
                <button class="btn btn-outline-success " type="submit"><i class="bi bi-search"></i></button>
            </form>
        </div>
    </div>
</nav>
<div class="container text-white">
    <div class="text-white fs-3 mt-2 mb-3">
        <?php
        if ($pesquisa !== null) {
        if ($musica !== null) {
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
            <div class="col-lg-2 col-md-4 col-6 mt-2">
                <div class="card bg-dark text-white">
                    <img src="<?php echo $music['image']; ?>" class="card-img-top" alt="...">
                    <div class="card-body text-center">
                        <h5 class="card-title"><?php echo $music['name']; ?></h5>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item bg-dark text-white  text-center"><?php echo $music['artist']; ?></li>
                    </ul>
                    <div class="card-footer text-center align-middle">
                        <a href="<?php echo $music['link']; ?>" target="_blank"
                           class="btn corSpotify d-flex aling-items-center justify-content-center">Spotify <i
                                    class="bi bi-spotify fs-5"></i></a>
                    </div>
                </div>
            </div>
            <?php
        }
        ?>
    </div>
    <div class="row mt-5">
        <div class="fs-4 mb-2">
            Álbuns
        </div>
        <?php
        $i = 0;
        foreach ($musica2['albums']['items'] as $albuns) {
            if ($i == 6) {
                //echo $i;
                break;
            }
            $id = $albuns['data']['uri'];
            $idstr = str_replace('spotify:album:', '', $id);
            //echo $idstr;
            ?>
            <div class="col-lg-2 col-md-4 col-6 mt-2">
                <div class="card bg-dark text-white">
                    <img src="<?php echo $albuns['data']['coverArt']['sources']['0']['url']; ?>" class="card-img-top"
                         alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $albuns['data']['name']; ?></h5>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item bg-dark text-white text-center"><?php echo $albuns['data']['artists']['items']['0']['profile']['name']; ?></li>
                    </ul>
                    <div class="card-footer text-center align-middle">
                        <form action="album.php" method="get" name="frmIDAlbum">
                            <input type="text" value="<?php echo $idstr; ?>" name="idAlbum" hidden>
                            <button type="submit" class="btn corzinhaSpotify">Ver álbum</button>
                        </form>
                    </div>
                </div>
            </div>
            <?php

            $i++;
        }
        }
        } else {
            echo 'Nenhum resultado encontrado! Verifique se digitou corretamente.';
        }
        ?>
    </div>
</div>
<?php
include_once 'footer.php';
?>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
        crossorigin="anonymous"></script>
</body>

</html>