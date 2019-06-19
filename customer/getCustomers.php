<?php
require '../vendor/autoload.php';
require '../config.php';

$customers = $client->customers()->list()->records;
print_r($customers);