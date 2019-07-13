<?php
/**
 * This class implements the persistance logic which defines how and where a model is stored.
 */

namespace App\Service\Access;

class PetAccess {

  /**
   * @var \PDO $db
   */
  private $db;

	// Note: Ideally in larger context would use autowiring 
	// but since scope is limited we can manually inject here.
  public function __construct(\Slim\Container $container, \PDO $db) {
    $this->db = $db;
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
