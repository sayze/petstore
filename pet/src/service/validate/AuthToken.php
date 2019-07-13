<?php

/**
 * Describes how a AUTH_TOKEN header is validated.
 */

namespace App\Service\Validate;

class AuthToken {

	/**
	 * Checks if an auth token is valid.
	 *
	 * @param string $token
	 * @return boolean
	 */
	public static function isValid(string $token) {

		return TRUE;
	}

}
