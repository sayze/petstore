<?php

/**
 * Class implements validation schema for a pet request.
 * 
 * Responsible for ensuring required fields are present.
 */

namespace App\Service\Validate;

class Pet {

	/**
	 * Array of all errors.
	 *
	 * @var array
	 */
	private $errors;

	public function getErrors() {
		return $this->errors;
	}

	public function validate(array $data = []) {
		$valid_name = isset($data['name']);
		$valid_photos = isset($data['photoUrls']) && is_array($data['photoUrls']);
		$accepted_status = [ 'available', 'pending', 'sold'  ];
		
		if (!$valid_name) {
			$this->errors[] = 'Required field "name" missing from request body.';
		}

		if (!$valid_photos) {
			$this->errors[] = 'Required field "photoUrls" missing from request body.';
		}

		if (isset($data['category']) && !isset($data['category']['name']) ) {
			$this->errors[] = 'Field "category" must contain valid name key.';
		}

		if (isset($data['tags'])) {
			$tags = $data['tags'];

			foreach($tags as $tag) {
				if (!isset($tag['name'])) {
					$this->errors[] = 'Field "tags" must contain valid name key.';
					break;
				}
			}
			
		}

		if (isset($data['status']) && !in_array($data['status'], $accepted_status) ) {
			$this->errors[] = 'Field "status" must be one of ' . implode(" | ", $accepted_status);
		}

		return count($this->errors) === 0;
	}

}