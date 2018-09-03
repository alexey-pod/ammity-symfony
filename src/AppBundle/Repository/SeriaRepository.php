<?php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;
use AppBundle\Entity\Ann;
use AppBundle\Entity\Cat;
use AppBundle\Entity\Seria;

class SeriaRepository extends EntityRepository
{
    /**
	* @param $config['root_cat_id']  
	* @param $config['get_ann']  
	* @param $config['bild_url']  
	*/
	public function getSeriaArrayByAnnCat($config=null)
    {
   	
		$qb = $this->getEntityManager()
			->createQueryBuilder()
			->select('s')
			->from('AppBundle:seria', 's')
			->innerJoin('AppBundle:Ann', 'a', 'WITH', 'a.seriaId = s.id')
			->andWhere("a.isDisable = '0'")
			->groupBy('s.id')
			->add('orderBy', 's.sort ASC');
		
		if(isset($config['root_cat_id'])){
			$root_cat_id=$config['root_cat_id'];
			$qb->andWhere("a.rootCatId = '$root_cat_id'");
		}
		
		$result = $qb
				->getQuery()
				->getResult();
		
		foreach($result as $key=>$val) {
			if( isset($config['get_ann']) ){
				$ann_array = $this->getEntityManager()
									->getRepository(Ann::class)
									->getAnnArray([
										'seria_id'=>$val->getId(),
										'root_cat_id'=>$config['root_cat_id'], 
										'no_text'=>true,
										'bild_url'=>true,
									]);
				$result[$key]->setAnnArray($ann_array);
			}
			
			if( isset($config['bild_url']) ){
				$this->bildUrl($val);
			}
		}
			
		return $result;
    }
	
	public function getSeriaItem($id){
		
		$item = $this->getEntityManager()
				->getRepository(Seria::class)
				->find($id);
		
		$this->bildUrl($item);
		
		return $item;
	}
	
	private function bildUrl(Seria $item){

		$mnemonic = $item->getMnemonic();
		$item->setUrl( "/seria/$mnemonic/" );
		
	}
	
	/**
	* @param $config['get_ann']  
	* @param $config['bild_seria_url']  
	*/
	function getSeriaCatArray($config=null){
	
		$id = $config['id'];
		
		$qb = $this->getEntityManager()
			->createQueryBuilder()
			->select('c')
			->from('AppBundle:seria', 's')
			->innerJoin('AppBundle:Ann', 'a', 'WITH', 'a.seriaId = s.id AND a.isDisable = 0')
			->innerJoin('AppBundle:Cat', 'c', 'WITH', 'c.id = a.rootCatId ')
			->andWhere("s.id = '$id'")
			->groupBy('c.id')
			;
		
		$result = $qb
				->getQuery()
				->getResult();
		
		foreach($result as $key=>$val) {
			if( isset($config['get_ann']) ){
				$ann_array = $this->getEntityManager()
									->getRepository(Ann::class)
									->getAnnArray([
										'seria_id'=>$id,
										'root_cat_id'=>$val->getRootCatId(), 
										'no_text'=>true, 
										'get_main_param'=>true,
										'count_compare'=>$config['count_compare'],
										'get_compare_url'=>$config['get_compare_url'],
										'bild_seria_url'=>$config['bild_seria_url'],
										'bild_url'=>true,
									]);
				$result[$key]->setAnnArray($ann_array);
			}
		}
		
		return $result;
		
	}
	
}
?>