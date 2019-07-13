<?php

namespace App\Model;

/**
 * @Entity 
 * @Table(name="pet_tags")
 */
class PetTag {

	/**
	 * @var int
	 * @Id 
	 * @Column(type="integer") 
	 * @GeneratedValue 
	 */
	private $id;
	
	/**
	 * @var int
	 * @ManyToOne(targetEntity="Pet", inversedBy="tags")
	 * @JoinColumn(name="pet_id", referencedColumnName="id")
	 */
	private $pet;

	/**
	 * @var int
	 * @Column(type="string")
	 */
	private $value;

}