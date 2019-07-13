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

	// Note: Larger context could use autowiring 
	// but since scope is limited we can manually inject here.
  public function __construct(EntityManager $em) {
    $this->em = $em;
  }

	/**
	 * Internal function to get pets based on criteria.
	 *
	 * @return array
	 */
	private function getPets(array $criteria = []) {
		$pets = $this->em->getRepository('\App\Model\Pet')->findBy($criteria);
		$data = [];
		
		foreach ($pets as $pet) {
			$category = $pet->getCategory();
			
			$data[] = [
				'id' => $pet->getId(),
				'category' => [
					'id' => $category->getId(),
					'name' => $category->getName(),
				],
				'name' => $pet->getName(),
				'photoUrls' => $pet->getPhotos(),
				'tags' => $pet->getTags(),
				'status' => $pet->getStatus()
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
		$name = $data['name'];
		$status = $data['status'];
	
		$pet->setName($name);
		$pet->setStatus($status);

		foreach ($data['photoUrls'] as $value) {
			$photo = new PetPhoto();	
			$photo->setPhotoUrl($value);
			$photo->setPet($pet);
			$pet->addPhoto($photo);
			$this->em->persist($photo);
		}

		if (isset($data['category'])) {
			$category = new Category();
			$category->setName($data['category']['name']);
			$this->em->persist($category);
			$pet->setCategory($category);
		}

		if (isset($data['tags'])) {
			foreach ($data['tags'] as $value) {
				$tag = new PetTag();	
				$tag->setValue($value['name']);
				$tag->setPet($pet);
				$pet->addTag($tag);
				$this->em->persist($tag);
			}
		}

		$this->em->persist($pet);
		$this->em->flush();
		
		return $this->getPets(['id' => $pet->getId()]);
	}

}
