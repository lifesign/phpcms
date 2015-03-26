<?php

return array (
	'default' => array (
		'hostname' => env('DB_HOST', 'localhost'),
		'database' => env('DB_DATABASE', 'phpcms'),
		'username' => env('DB_USERNAME', 'root'),
		'password' => env('DB_PASSWORD', ''),
		'tablepre' => 'v9_',
		'charset' => 'utf8',
		'type' => env('DB_TYPE', 'mysql'),
		'debug' => true,
		'pconnect' => 0,
		'autoconnect' => 0
	),
);

?>