<?php

require_once __DIR__ . '/../../vendor/autoload.php';

$usuari = $_POST["usuari"];
$titol = $_POST["titol"];
$data = $_POST["time"];
$content = $_POST["txtContent"];

$client = new MongoDB\Client("mongodb://localhost:27017");
$collection = $client->powerdot->presentacio;

//$collection = (new MongoDB\Client("mongodb://localhost:27017"))->powerdot->presentacio;

$insertOneResult = $collection->insertOne([
    'usuari' => $usuari,
    'titol' => $titol,
    'data' => $data,
    'content' => $content,
]);


header('Location: ../views/repostoryView.php');

// echo var_dump($insertOneResult->getInsertedId());

?>