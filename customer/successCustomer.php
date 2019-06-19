<?php
require '../vendor/autoload.php';
require '../config.php';

$redirectFlow = $client->redirectFlows()->complete(
	$_REQUEST['redirect_flow_id'], //The redirect flow ID from above.
	[ "params" => [ "session_token" => $_SESSION['session_token'] ] ]
);

$_SESSION['mandate_id'] = $redirectFlow->links->mandate;
// Save this mandate ID for the next section.
//print( "Customer: " . $redirectFlow->links->customer . "<br />" );
$_SESSION['Customer_id'] = $redirectFlow->links->customer;
// Display a confirmation page to the customer, telling them their Direct Debit has been
// set up. You could build your own, or use ours, which shows all the relevant
// information and is translated into all the languages we support.
$_SESSION['Confirmation_URL'] = $redirectFlow->confirmation_url;
header( 'location:' . $redirectFlow->confirmation_url );
