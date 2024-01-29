<?php

require_once 'autoload.php';

$apiKey = 'pk.5d872a6601bcdc3db3b751e26979349f';
$model = new LocationModel($apiKey);
$view = new LocationView();
$controller = new LocationController($model, $view);

$coordinates = ['latitude' => 51.5237629, 'longitude' => -0.1584743];
$controller->getAddressByCoordinates($coordinates);

$addressData = [
    'address' => 'Sherlock Holmes Museum, 221b, Baker Street, Мерилибон, Лондон, Большой Лондон, Англия, NW1 6XE, Великобритания'
];
$controller->getCoordinatesByAddress($addressData);

?>