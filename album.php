<?php
include_once './config/constantes.php';
include_once './config/conexao.php';
include_once './func/funcoes.php';

if (isset($_GET['idAlbum']) && !empty($_GET['idAlbum'])) {
    $idAlbum = $_GET['idAlbum'];
}

$pesquisa = $_SESSION['pesquisa'];

$curl = curl_init();

curl_setopt_array($curl, [
    CURLOPT_URL => "https://spotify81.p.rapidapi.com/albums?ids=$idAlbum",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => [
        "X-RapidAPI-Host: spotify81.p.rapidapi.com",
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

$album = json_decode($response, true);

// echo '<pre>';
// print_r($album);
// echo '</pre>'
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Álbum - <?php foreach ($album['albums'] as $albumItem) {
            echo $albumItem['name'];
        } ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/7.0.96/css/materialdesignicons.min.css"
          &gt;>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css'>
    <link rel="stylesheet" href="./css/style.css">
</head>

<body class="bg-black text-white">
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
                <button class="btn btn-outline-success" type="submit"><i class="bi bi-search"></i></button>
            </form>
        </div>
    </div>
</nav>
<div class="container">
    <div class="row mt-5">
        <div class="col-lg-4 col-sm-12 imgAlbum">
            <?php
            foreach ($album['albums'] as $albumItem) {
            //echo $albumItem['artists']['0']['name'];
            ?>
            <img src="<?php echo $albumItem['images']['1']['url']; ?>" alt="" class="img-fluid imgAlbum">
        </div>
        <div class="col-lg-8 col-sm-12 ">
            <h3 class=" txtAlbum">
                <?php echo $albumItem['name'] ?>
            </h3>
            <p>
                <?php echo $albumItem['artists']['0']['name']; ?>
            </p>

            <p>
                Data de lançamento: <?php
                $dataLancamento = $albumItem['release_date'];
                $data = implode("/", array_reverse(explode("-", $dataLancamento)));

                echo $data; ?>
            </p>
            <p>
                Produtora: <?php echo $albumItem['label'] ?>
            </p>
            <p>
                Quantidade de músicas no álbum: <?php echo $albumItem['total_tracks'];
                $total = $albumItem['total_tracks'];
                ?>
            </p>
            <div class="d-flex justify-content-end">
                <a href="<?php echo $albumItem['external_urls']['spotify'] ?>" target="_blank"
                   class="btn corSpotify d-flex aling-items-center justify-content-center">Ouvir no Spotify</a>
            </div>
            <?php
            }
            ?>
        </div>

    </div>
    <hr>
    <div class="row mt-3">
        <div class="mb-4">Músicas</div>
        <div class="col-lg-12">
            <?php
            $i = 0;
            while ($i <= $total) {
                if ($i == $total) {
                    break;
                }

                foreach ($album['albums'] as $track) {

                    ?>
                    <div>
                        <?php echo $track['tracks']['items'][$i]['track_number']; ?>  
                        <?php echo $track['tracks']['items'][$i]['name']; ?>
                    </div>
                    <hr>

                    <?php
                    $i++;
                    //echo $i;
                }
            }
            ?>
        </div>
    </div>

    <!-- Container -->
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