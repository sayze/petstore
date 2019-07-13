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
		$resp = $this->jsonRequest('valid_token', 'POST', [],[], ['token' => $token]);
		return $resp['status'] === 'OK';
	}

	/**
   * Helper to make request and return json decoded body.
   *
   * @param string uri
   * @param string $method
   * @param array $payload
   * @param array $headers
   * @param array $body
   * @param array $query
   *
   * @return mixed.
   */
  private function jsonRequest(string $uri, string $method, array $payload = [], array $headers = [], array $body = [], $query = []) {
    $req_options = [
      'form_params' => $payload,
      'headers' => $headers
    ];

    if (!empty($body)) {
      $req_options['json'] = $body;
      unset($req_options['form_params']);
    }

    if (!empty($query)) {
      $req_options['query'] = $query;
    }

    if ($method === 'POST') {
      $this->resp = $this->client->post($uri, $req_options);
    }

    if ($method === 'GET') {
      $this->resp = $this->client->get($uri, $req_options);
    }

    if ($method === 'DELETE') {
      $this->resp = $this->client->delete($uri, $req_options);
    }

    if ($method === 'PATCH') {
      $this->resp = $this->client->patch($uri, $req_options);
    }

    $decoded = $this->resp ? json_decode($this->resp->getBody(), TRUE) : NULL;

    return $decoded;
  }

}
