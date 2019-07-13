<?php

namespace App\Model;

/**
 * @Entity 
 * @Table(name="pet_photos")
 */
class PetPhoto {

	/**
	 * @var int
	 * @Id 
	 * @Column(type="integer") 
	 * @GeneratedValue 
	 */
	private $id;

	/**
	 * @var int
	 * @ManyToOne(targetEntity="Pet", inversedBy="photos")
	 * @JoinColumn(name="pet_id", referencedColumnName="id")
	 */
	private $pet;

	/**
	 * @var int
	 * @Column(type="string")
	 */
	private $photoUrl;

}