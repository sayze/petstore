<?php

namespace App\Model;

class Pet implements Model{

	/**
	 * Unique identifier pertaining to a pet.
	 *
	 * @var $id {integer}
	 */
	protected $id;

	/**
	 * Category of pet. 
	 * 
	 * Foreign key reference.
	 *
	 * @var $category {integer}
	 */
	private $category;

	/**
	 * Name of the pet.
	 *
	 * @var $name {string}
	 */
	private $name;

	/**
	 * Photos pertaining to a pet.
	 * 
	 * Since pet can have many photo's this will need to tie into M -> M table.
	 *
	 * @var $photoUrls {integer}
	 */
	private $photoUrls;

	/**
	 * Tags related to pet.
	 *
	 * M -> M table.
	 * 
	 * @var $tags {int}
	 */
	private $tags;
	
	/**
	 * Status of pet in store.
	 *	
	 * Assumption is status will always be one of 3 [available, pending, sold] 
	 * and therefore can store in context table.
	 * 
	 * @var $status {int}
	 */
	private $status;

	public function validate() {
		$valid = TRUE;
		$message = '';
			
		return [
			'valid' => $valid,
			'message' => $message
		];
		
	}

}