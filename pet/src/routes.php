<?php

use Slim\App;
use Slim\Http\Request;
use Slim\Http\Response;

return function (App $app) {
	
	/**
   * Api path handlers
   */
  $app->group('/api/', function (App $app) {
		
		// NOTE: For simplicity sake not going use annotation routing since there aren't many 
		// controller actions that need to be invoked. Nor are there many endpoints.

		/**
		 * Handler for creating a new pet.
		 */
		$app->post('pet', function (Request $request, Response $response, array $args) use($app) {
			$pet_access = $app->getContainer()->get('access');
			$pet_access->createPet();
		});
  });
};
