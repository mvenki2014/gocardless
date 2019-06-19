<?php
require '../vendor/autoload.php';
require '../config.php';

$payment = $client->payments()->get( $_SESSION['payment_id'] );
// Payment ID from above

print( "Status: " . $payment->status . "<br />" );
print( "Cancelling...<br />" );

$payment = $client->payments()->cancel( $_SESSION['payment_id'] );
print( "Status: " . $payment->status );