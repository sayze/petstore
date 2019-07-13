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

	public function getPhotoUrl() {
		return $this->photoUrl;
	}

	public function getPet() {
		return $this->pet;
	}

	public function setPhotoUrl(string $url) {
		$this->photoUrl = $url;
	}

	public function setPet(Pet $pet) {
		$this->pet = $pet;
	}
}