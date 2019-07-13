<?php

/**
 * Defines all the service factories which can be invoked from the DI container.
 */

use Slim\App;
use \GuzzleHttp\Client;
use \App\Service\Response\ResponseBuilder;
use \App\Service\Validate\Auth;
use \App\Service\Access\PetAccess;
use \Monolog\Logger;
use \Monolog\Processor\UidProcessor;
use \Monolog\Handler\StreamHandler;

return function (App $app) {
  $container = $app->getContainer();

	// guzzle.
	$container['guzzle'] = function($c) {
		return new Client([
			'base_uri' => 'http:/127.0.0.1:3000/api/',
			'timeout'  => 2.0,
		]);
	};

	// response builder.
	$container['jresponse'] = function ($c) {
		return new ResponseBuilder();
	};

  // data access object service.
  $container['access'] = function ($c) {
    return new PetAccess($c, $c->get('db'));
	};
	
	// token authentication service.
	$container['auth'] = function ($c) {
		$guzzle = $c->get('guzzle');
		return new Auth($guzzle);
	};

  // database access.
  $container['db'] = function ($c) {
		$conn = NULL;
		$logger = $c->get('logger');

    try {
      $db = $c->get('settings')['database'];
      $conn = new PDO('mysql:host=' . $db['host'] . ';dbname=' . $db['name'] . '', $db['user'], $db['password']);

      // set the PDO error mode to exception
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      return $conn;
    }
    catch(PDOException $e)
    {
      $logger->critical("Connection failed to database: " . $e->getMessage());
		}
  };

  // monolog
  $container['logger'] = function ($c) {
    $settings = $c->get('settings')['logger'];
    $logger = new Logger($settings['name']);
    $logger->pushProcessor(new UidProcessor());
    $logger->pushHandler(new StreamHandler($settings['path'], $settings['level']));
    return $logger;
  };
};
