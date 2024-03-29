<?php
require '../vendor/autoload.php';
require '../config.php';

$payment = $client->payments()->create([
	"params" => [
		"amount" => 1000, // 10 GBP in pence
		"currency" => "GBP",
		"links" => [
			"mandate" => "MD0005V6TD8246"
			// The mandate ID from last section
		],
		// Almost all resources in the API let you store custom metadata,
		// which you can retrieve later
		"metadata" => [
			"invoice_number" => "001"
		]
	],
	"headers" => [
		"Idempotency-Key" => sha1( time() )
	]
]);

// Keep hold of this payment ID - we'll use it in a minute
// It should look like "PM000260X9VKF4"
print("ID: " . $payment->id);