<?php
require '../vendor/autoload.php';
require '../config.php';

$payment = $client->payments()->create( [
	"params"  => [
		"amount"        => 1000, // 10 GBP in pence
		"app_fee"       => 10,
		"currency"      => "GBP",
		"interval_unit" => "monthly",
		"day_of_month"  => "5",
		"links"         => [
			"mandate" => $_SESSION['mandate_id']
			// The mandate ID from last section
		],
		// Almost all resources in the API let you store custom metadata,
		// which you can retrieve later
		"metadata"      => [
			"invoice_number" => $_SESSION['Customer_id'] . "- 001"
		]
	],
	"headers" => [
		"Idempotency-Key" => sha1( time() )//"random_payment_specific_string"
	]
] );

// Keep hold of this payment ID - we'll use it in a minute
// It should look like "PM000260X9VKF4"
print( "ID: " . $payment->id );
$_SESSION['payment_id'] = $payment->id;