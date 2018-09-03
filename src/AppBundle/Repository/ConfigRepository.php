<?php

namespace AppBundle\Repository;

use AppBundle\Entity\Config;
use Doctrine\ORM\EntityRepository;

class ConfigRepository extends EntityRepository
{
    
	public function getAll()
    {
		$config = $this->getEntityManager()
			->getRepository(Config::class)
			->findAll();
		
		$config = (array)$config;
		
		$result = [];
		
		foreach($config as $key=>$val) {
			$result[$val->getKey()] = $val->getVal();
		}
		return $result;
	}

	
}
?>