<?php
require 'vendor/autoload.php';
require 'config.php';

$session_token = md5( time() );
$_SESSION['session_token'] = $session_token ;
$redirectFlow  = $client->redirectFlows()->create( [
	"params" => [
		// This will be shown on the payment pages
		"description"          => "Welcome to FIN Infocom Payment Page",
		// Not the access token
		"session_token"        => $session_token,
		"success_redirect_url" => "http://192.168.0.49/gocardless/successCustomer.php",
		// Optionally, prefill customer details on the payment page
		"prefilled_customer" => [
			"company_name" => "Fininfocom test",
			"given_name" => "Venkatesh test",
			"family_name" => "v",
			"email" => "testvenki@gocardless.com",
			"address_line1" => "338-346 Goswell Road",
			"city" => "London",
			"postal_code" => "EC1V 7LQ"
		]
	]
] );

// Hold on to this ID - you'll need it when you
// "confirm" the redirect flow later
print( "ID: " . $redirectFlow->id . "<br />" );
header('location:'.$redirectFlow->redirect_url);

print( "redirect_url: " . $redirectFlow->redirect_url );
