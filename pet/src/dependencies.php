<?php

/**
 * Defines all the service factories which can be invoked from the DI container.
 */

use Slim\App;

return function (App $app) {
  $container = $app->getContainer();

  // // Csrf.
  // $container['csrf'] = function ($c) {
  //   return new \Slim\Csrf\Guard;
  // };

  // // view renderer
  // $container['renderer'] = function ($c) {
  //   $settings = $c->get('settings')['renderer'];
  //   return new \Slim\Views\PhpRenderer($settings['template_path']);
  // };


	// response builder.
	$container['jresponse'] = function ($c) {
		return new \App\Service\Response\ResponseBuilder();
	};

  // data access object service.
  $container['access'] = function ($c) {
    return new \App\Service\Access\PetAccess($c, $c->get('db'));
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
    $logger = new \Monolog\Logger($settings['name']);
    $logger->pushProcessor(new \Monolog\Processor\UidProcessor());
    $logger->pushHandler(new \Monolog\Handler\StreamHandler($settings['path'], $settings['level']));
    return $logger;
  };
};
