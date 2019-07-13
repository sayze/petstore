<?php 

namespace App\Model;

/**
 * @Entity 
 * @Table(name="categories")
 */
class Category {

	/**
	 * @var int
	 * @Id 
	 * @Column(type="integer") 
	 * @GeneratedValue
	 */
	private $id;

	/**
	 * @var string
	 * @Column(type="string") 
	 */
	private $name;

	public function getId() {
		return $this->id;
	}

	public function getName() {
		return $this->name;
	}

}