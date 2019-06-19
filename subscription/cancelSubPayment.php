<?php
require '../vendor/autoload.php';
require '../config.php';


$subscription = $client->subscriptions()->get( $_SESSION['subscription_id'] );
// Subscription ID from above.

print( "Status: " . $subscription->status . "<br />" );
print( "Cancelling...<br />" );

$subscription = $client->subscriptions()->cancel( $_SESSION['subscription_id'] );

print( "Status: " . $subscription->status . "<br />" );