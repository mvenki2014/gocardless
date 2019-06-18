<?php

use GoCardlessPro\Client;
use GoCardlessPro\Environment;

session_start();
$client = new Client( [
	// We recommend storing your access token in an
	// environment variable for security
	'access_token' => 'sandbox_BqMLHDvn-BmHF9cBlvUZ9Z0eu6ZN_rvI3fPZ4vpY',
	// Change me to LIVE when you're ready to go live
	'environment'  => Environment::SANDBOX
] );
