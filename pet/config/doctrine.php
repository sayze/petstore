<?php 

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

// Create a simple "default" Doctrine ORM configuration for Annotations
$isDevMode = true;

$config = Setup::createAnnotationMetadataConfiguration(array(__DIR__."/../src/model"), $isDevMode);

// database configuration parameters
$conn = array(
	'dbname' => 'pets',
	'user' => 'root',
	'password' => 'root',
	'host' => '127.0.0.1:8889',
	'driver' => 'pdo_mysql',
);

// obtaining the entity manager
$entityManager = EntityManager::create($conn, $config);