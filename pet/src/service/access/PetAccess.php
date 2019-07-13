<?php
/**
 * This class implements the persistance logic which defines how and where a model is stored.
 */

namespace App\Service\Access;

use Doctrine\ORM\EntityManager;
use App\Model\Pet;
use App\Model\Category;
use App\Model\PetPhoto;
use App\Model\PetTag;

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
	 * Get all the pets currently stored in db.
	 *
	 * @return void
	 */
	public function getPets() {
		$pets = $this->em->getRepository('\App\Model\Pet')->findAll();
		$data = [];
		
		foreach ($pets as $pet) {
			$data[] = [
				'id' => $pet->getId(),
				'name' => $pet->getName(),
				'category' => $pet->getCategory()->getName(),
				'photos' => $pet->getPhotos(),
				'tags' => $pet->getTags()
			];
		}
		
		return $data;
	}


  /**
   * Implementation of creating a pet.
   *
   * @param array $data all the fields values.
   */
  public function createPet(array $data) {
		$pet = new Pet();
		$pet->setName($data['name']);
		$pet->setStatus($data['status']);

		if (isset($data['category'])) {
			$category = new Category();
			$category->setName($data['category']['name']);
			$this->em->persist($category);
			$pet->setCategory($category);
		}

		if (isset($data['photoUrls'])) {
			foreach ($data['photoUrls'] as $value) {
				$photo = new PetPhoto();	
				$photo->setPhotoUrl($value);
				$photo->setPet($pet);
				
				$this->em->persist($photo);
				$photos[] = $photo->getPhotoUrl();
			}
		}

		if (isset($data['tags'])) {
			foreach ($data['tags'] as $value) {
				$tag = new PetTag();	
				$tag->setValue($value['name']);
				$tag->setPet($pet);
				$this->em->persist($tag);

				$tags[] = [
					'id' => $tag->getId(),
					'name' => $tag->getValue()
				];
			}
		}

		$this->em->persist($pet);
		$this->em->flush($pet);
		
		return true;
	}

	

}
