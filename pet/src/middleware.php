<?php

use Slim\App;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use App\Service\Validate\AuthToken;

return function (App $app) {

	// Calls auth service to ensure token is valid.
  $app->add(function(ServerRequestInterface $request,  ResponseInterface $response, callable $next) use($app) {
		$resp = $app->getContainer()->get('jresponse');
		$auth_token = $request->hasHeader('AUTH_TOKEN') ? $request->getHeader('AUTH_TOKEN') : FALSE;

		// Since we will only ever return json we can default it at this point in the application.
		$response = $response->withHeader('Content-Type', 'application/json');

		if (!$auth_token) {
			$response->getBody()->write((json_encode($resp->build('Could not find expected key AUTH_TOKEN in header.', [], $resp::CODE_BAD_REQUEST))));
			return $response->withStatus($resp::CODE_BAD_REQUEST);
		}
		
		if (!AuthToken::isValid($auth_token[0][0])) {
			$response->getBody()->write(json_encode($resp->build('You are not authorized to access this resource.', [], $resp::CODE_UNAUTHORISED)));
				return $response->withStatus($resp::CODE_UNAUTHORISED);
		} else {
			return $next($request, $response);
		}
	
	});	
};
