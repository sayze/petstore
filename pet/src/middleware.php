<?php

use Slim\App;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;

return function (App $app) {
	$c = $app->getContainer();

	/**
	 * Middleware for authentication headers.
	 */
  $app->add(function(ServerRequestInterface $request,  ResponseInterface $response, callable $next) use($c) {

		// Bypass on debug mode.
		if ($c->get('settings')['debug']) {
			return $next($request, $response);
		}

		// Get required services from container.
		$auth = $c->get('auth');
		$resp = $c->get('jresponse');

		// Do we have an AUTH_TOKEN in request ?
		$token = $request->hasHeader('AUTH_TOKEN') ? $request->getHeader('AUTH_TOKEN')[0] : FALSE;
		
		// Since we will only ever return json we can default it at this point in the application.
		$response = $response->withHeader('Content-Type', 'application/json');

		if (!$token) {
			$response->getBody()->write((json_encode($resp->build('Could not find expected key AUTH_TOKEN in header.', [], $resp::STATUS_INVALID))));
			return $response->withStatus($resp::CODE_BAD_REQUEST);
		}
		
		if (!$auth->validate($token)) {
			$response->getBody()->write(json_encode($resp->build('You are not authorized to access this resource.', [], $resp::STATUS_OK)));
			return $response->withStatus($resp::CODE_UNAUTHORISED);
		}	
		
		return $next($request, $response);
	
	});	
};
