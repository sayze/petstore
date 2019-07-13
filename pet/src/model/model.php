<?php

namespace App\Model;

interface Model {

	/**
	 * Every model must define a validate function which performs field type validation.
	 * 
	 * Note: The validate function must not perform any business logic pertaining to storage behaviour or external dependencies.
	 *
	 * @return array
	 * 
	 * [
	 *   valid => bool,
	 *   message => mixed,
	 * ]
	 */
	public function validate();
}