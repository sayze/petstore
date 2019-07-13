<?php

use Slim\App;
use Slim\Http\Request;
use Slim\Http\Response;
use App\Service\Validate\Pet as Validate;

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
			
			return $response->withJson($rb->build('Retrieved ' . count($pets). ' pets', $pets));
		});

		/**
		 * Handler for creating a new pet.
		 */
		$app->post('pet', function (Request $request, Response $response, array $args) use($c) {
			$json_data = json_decode($request->getBody(), TRUE);
			$rb = $c->get('jresponse');

			if (!$json_data) {
				$rb->setMessage('The json body you have supplied is invalid.');
				$rb->setStatus($rb::CODE_BAD_REQUEST);
				return $response->withJson($rb->build())->withStatus($rb::CODE_BAD_REQUEST);
			}

			if (!($v = new Validate())->validate($json_data)) {
				$rb->setMessage('There was an issue with supplied json values.');
				$rb->setStatus($rb::CODE_BAD_REQUEST);
				$rb->setData($v->getErrors());
				return $response->withJson($rb->build())->withStatus($rb::CODE_BAD_REQUEST);
			}	
			
			$pet_access = $c->get('access');
			$pet_access->createPet($json_data);
			
			return $response->withJson($rb->build('Created 1 new pet.'));
		});
  });
};
