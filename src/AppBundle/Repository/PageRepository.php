<?php

namespace AppBundle\Repository;

use AppBundle\Entity\Page;
use AppBundle\Entity\Config;
use Doctrine\ORM\EntityRepository;

class PageRepository extends EntityRepository
{
    

	/**
	* @param $config['mnemonic'] 
	*/
	public function getPageItemByMnemonic($config=null)
    {
		
		$mnemonic = $config['mnemonic'];
		// $mnemonic = 'index4654';
		
		$qb = $this->getEntityManager()
			->createQueryBuilder()
			->select('p')
			->from('AppBundle:Page', 'p')
			->where("p.mnemonic = '$mnemonic'")
			->getQuery()
			->setMaxResults( 1 );
		$result = $qb
				->getResult(\Doctrine\ORM\AbstractQuery::HYDRATE_ARRAY);
		
		if(!$result){
			return false;
		}
		$result = $result[0];
		
		if(!$result['title']){
			$result['title']=$result['name'];
		}
		
		if($result['keywords']=='' || $result['description']==''){
			$site_config = $this->getEntityManager()
				->getRepository(Config::class)
				->getAll();
			
			if($result['keywords']==''){
				$result['keywords']=$site_config['keywords'];
			}
			
			if($result['description']==''){
				$result['description']=$site_config['description'];
			}
		}
		
		return $result;
	
	}

	
}
?>