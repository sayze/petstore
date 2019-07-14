<?php

/**
 * Defines how requests are Authenticated.
 */

namespace App\Service\Validate;

class Auth {

	/**
	 * Object for making network requests to external services.
	 *
	 * @var \GuzzleHttp\Client
	 */
	private $client;

	public function __construct(\GuzzleHttp\Client $client) {
		$this->client = $client;
	}

	/**
	 * Checks if an auth token is valid.
	 *
	 * @param string $token
	 * @return boolean
	 */
	public function validate(string $token = '') {
		$req_options = [
      'json' => [
				'token' => $token
			],
      'headers' => [
				'AUTH_TOKEN' => $token
				]
    ];

		// Make plain http request to authentication service.
		// Note: Realistically should go with gRPC here.
		$resp = $this->client->post('validate', $req_options);
		$decoded = json_decode($resp->getBody(), TRUE);	
		return $decoded['status'] === 'OK';
	}
}
