<?php

use Slim\App;
use Slim\Http\Request;
use Slim\Http\Response;

return function (App $app) {
	
	/**
   * Api path handlers
   */
  $app->group('/api/', function (App $app) {
		$c = $app->getContainer();

		// NOTE: For simplicity sake not going use annotation routing since there aren't many 
		// controller actions that need to be invoked. Nor are there many endpoints.

		/**
		 * Handler for getting all pets.
		 * Internal endpoint for testing db.
		 */
		$app->get('pet', function (Request $request, Response $response, array $args) use($c) {
			$pet_access = $c->get('access');
			$rb = $c->get('jresponse');
			
			$pets = $pet_access->getPets();
			
			return $response->withJson($rb->build('Fetched ' . count($pets). ' pets', $pets));
		});

		/**
		 * Handler for creating a new pet.
		 */
		$app->post('pet', function (Request $request, Response $response, array $args) use($c) {
			$pet_access = $c->get('access');
			$rb = $c->get('jresponse');
			$pet_access->createPet(json_decode($request->getBody(), TRUE));
			return $response->withJson($rb->build('Created 1 new pet.'));
		});
  });
};
