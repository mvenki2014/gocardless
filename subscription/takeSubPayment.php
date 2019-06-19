<?php
require '../vendor/autoload.php';
require '../config.php';

$subscription = $client->subscriptions()->create( [
	"params"  => [
		"amount"        => 1500, // 15 GBP in pence
		"currency"      => "GBP",
		"interval_unit" => "monthly",
		"day_of_month"  => "5",
		"links"         => [
			"mandate" => $_SESSION['mandate_id']
			// Mandate ID from the last section
		],
		"metadata"      => [
			"subscription_number" => $_SESSION['Customer_id']
		]
	],
	"headers" => [
		"Idempotency-Key" => sha1( time() )//"random_subscription_specific_string"
	]
] );

print( "ID: " . $subscription->id );
$_SESSION['subscription_id'] = $subscription->id;
