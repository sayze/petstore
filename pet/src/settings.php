<?php
return [
	// NOTE: Since only one deploy env db config can sit directly here.
	// no need for env files or external env variables.
  'settings' => [
		'debug' => FALSE,
		
    'displayErrorDetails' => FALSE,
    // set to false in production
    'addContentLengthHeader' => FALSE,
    // Allow the web server to send the content-length header

    // Monolog settings
    'logger' => [
      'name' => 'slim-app',
      'path' => isset($_ENV['docker']) ? 'php://stdout' : __DIR__ . '/../logs/app.log',
      'level' => \Monolog\Logger::DEBUG,
    ],
  ],
];
