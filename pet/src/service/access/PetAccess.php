<?php
/**
 * This class implements the persistance logic which defines how and where a model is stored.
 */

namespace App\Service\Access;

use Doctrine\ORM\EntityManager;

class PetAccess {

  /**
   * @var EntityManager $em
   */
  private $em;

	// Note: Ideally in larger context would use autowiring 
	// but since scope is limited we can manually inject here.
  public function __construct(EntityManager $em) {
    $this->em = $em;
  }

  /**
   * Implementation of creating a pet.
   *
   * @param array
   */
  public function createPet() {
		
		echo "Pet create";
	}

	

}
