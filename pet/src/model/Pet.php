<?php

namespace App\Model;

/**
 * @Entity 
 * @Table(name="pets")
 */
class Pet {

	/**
	 * @var int
	 * @Id 
	 * @Column(type="integer") 
	 * @GeneratedValue 
	 */
	private $id;

	/**
	 * @var int
	 * @OneToOne(targetEntity="Category")
   * @JoinColumn(name="category_id", referencedColumnName="id")
	 */
	private $category;

	/**
	 * @var string
	 * @Column(type="string")
	 */
	private $name;

	/**
	 * @var int
   * @OneToMany(targetEntity="PetPhoto", mappedBy="pet")
	 * @JoinColumn(name="photo_id", referencedColumnName="pet_id")
	 */
	private $photos;

	/**
	 * @var int
	 * @OneToMany(targetEntity="PetTag", mappedBy="pet")
	 * @JoinColumn(name="tag_id", referencedColumnName="pet_id")
	 */
	private $tags;
	
	/**
	 * Assumption is status will always be one of 3 [available, pending, sold] 
	 * and therefore can store in context table.
	 * 
	 * @var int
	 * @Column(type="integer")
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