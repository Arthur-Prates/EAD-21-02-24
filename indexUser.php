<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Api de USER</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/7.0.96/css/materialdesignicons.min.css" &gt;>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css'>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body class="bg-black text-white">
<?php
include_once ('nav.php');
?>
<div class="text-center">


    <div class="container">
        <h1>Site Usado https://reqres.in</h1>
        <?php

        $url = "https://reqres.in/api/users";
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($curl);
        curl_close($curl);
            $data = json_decode($response, true, 512, JSON_THROW_ON_ERROR);

        $url2 = "https://reqres.in/api/users?page=2";
        $curl2 = curl_init($url2);
        curl_setopt($curl2, CURLOPT_RETURNTRANSFER, true);
        $response2 = curl_exec($curl2);
        curl_close($curl2);
        $data2 = json_decode($response2, true, 512, JSON_THROW_ON_ERROR);
        ?>


    </div>
    <div id="texto" class="bg-dark text-light p-5 m-5 ">
        <?php
        if ($data === null) {
            echo 'JSON não ta pegando filhão';
        } else {
            ?>
            <div class="row">
                <?php
                foreach ($data['data'] as $user) {

                    ?>
                    <div class="col-2">
                        <div class="card bg-transparent text-white hov">
                            <img src="<?php echo $user['avatar'] ?>" class="img-fluid card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $user['first_name'] . ' ' . $user['last_name'] ?></h5>
                                <p class="card-text"><?php echo $user['email'] ?></p>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
            <?php
        }
        ?>
        <?php
        if ($data2 === null) {
            echo 'JSON não ta pegando filhão';
        } else {
            ?>
            <div class="row">
                <?php
                foreach ($data2['data'] as $user) {

                    ?>
                    <div class="col-2 mt-3">
                        <div class="card bg-transparent text-white hov">
                            <img src="<?php echo $user['avatar'] ?>" class="img-fluid card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $user['first_name'] . ' ' . $user['last_name'] ?></h5>
                                <p class="card-text"><?php echo $user['email'] ?></p>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
            <?php
        }
        ?>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
        crossorigin="anonymous"></script>


</body>
</html>