<?php 

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

// Create a simple "default" Doctrine ORM configuration for Annotations
$isDevMode = true;

$config = Setup::createAnnotationMetadataConfiguration(array(__DIR__."/../src/model"), $isDevMode);

// database configuration parameters
$conn = array(
	'dbname' => 'petstore',
	'user' => 'lamp-gen',
	'password' => 'lg99np4',
	'host' => 'localhost',
	'driver' => 'pdo_mysql',
);

// obtaining the entity manager
$entityManager = EntityManager::create($conn, $config);