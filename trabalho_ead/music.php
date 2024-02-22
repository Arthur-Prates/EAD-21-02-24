<?php
if (isset($_GET['musica'])) {
	$musica = $_GET['musica'];
} else {
	echo "Por favor, forneça um número de cep válido.";
}


$curl = curl_init();


curl_setopt_array($curl, [
	CURLOPT_URL => "https://shazam.p.rapidapi.com/search?term=$musica&offset=0&limit=5",
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 30,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "GET",
	CURLOPT_HTTPHEADER => [
		"X-RapidAPI-Host: shazam.p.rapidapi.com",
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

$musica = json_decode($response,true);

echo "<pre>";
print_r($musica);
echo "</pre>";

