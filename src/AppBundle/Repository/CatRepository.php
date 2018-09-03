<?php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;
use AppBundle\Entity\Cat;
use AppBundle\Entity\Seria;

class CatRepository extends EntityRepository
{
    /**
	* @param $config['id'] 
	* @param $config['link_disable'] 
	* @param $config['show_in_mane'] 
	* @param $config['no_text'] 
	*/
	public function getCatArray($config=null){
        
		$qb = $this->getEntityManager()
			->createQueryBuilder()
			->select('c')
			->from('AppBundle:Cat', 'c')
			->add('orderBy', 'c.sort ASC');
			
		{// фильтрация
			if(isset($config['id'])){
				$id = $config['id'];
				$qb->andWhere("c.catId = '$id'");
			}
			if(isset($config['link_disable'])){
				$link_disable=$config['link_disable'];
				$qb->andWhere("c.linkDisable = '$link_disable'");
			}
			if(isset($config['show_in_mane'])){
				$show_in_mane=$config['show_in_mane'];
				$qb->andWhere("c.showInMane = '$show_in_mane'");
			}
		}
		
		
		$result = $qb
				->getQuery()
				->getResult();
		
		{// дополнительная обработка данных
			
			foreach($result as $key=>$val) {
				$this->bildUrl($val);
				
				if( isset($config['no_text']) ){
					$result[$key]->setText('');
				}
			}
			
		}
				
		return $result;
    }
	
	private function bildUrl(Cat $item){
		
		$mnemonic = $item->getMnemonic();
		$item->setUrl( "/catalog/$mnemonic/" );
		
	}
	
	private function bildUrl_back($config=null){
		$id=$config['id'];
		
		$cat_item = $this->getEntityManager()
					->getRepository(Cat::class)
					->find($id);
		
		$mnemonic = $cat_item->getMnemonic();
		
		$url = "/catalog/$mnemonic/";
		
		return $url;
	}
	
	public function getLeftMenu($config=null){
		
		$result=$this->getCatArray(['id'=>0, 'no_text'=>true]);
		
		foreach($result as $key=>$val) {
			
			$seria_array = $this->getEntityManager()
						->getRepository(Seria::class)
						->getSeriaArrayByAnnCat(['root_cat_id'=>$val->getRootCatId(), 'bild_url'=>true, 'get_ann'=>true]);
			$result[$key]->setSeriaArray($seria_array);
			
		}
		
		return $result;
	}
	
	public function getAppCat($config=null){
		
		{// query
			$qb = $this->getEntityManager()
				->createQueryBuilder()
				->select('c.id, c.name, c.rootCatId AS root_cat_id')
				->from('AppBundle:Cat', 'c')
				->innerJoin('AppBundle:Ann', 'a', 'WITH', 'a.rootCatId=c.id')
				->andWhere("a.app = '1'")
				->andWhere("c.isDisable = '0'")
				->andWhere("a.isDisable = '0'")
				->andWhere("c.rootCatId != '20'")
				->andWhere("c.rootCatId != '4'")
				->add('orderBy', 'c.sort ASC')
				->groupBy('c.id') 
				;
		}//END query
		
		$result = $qb
				->getQuery()
				->getResult();
		
		foreach($result as $key=>$val) {
			
			$seria_array = $this->getEntityManager()
						->getRepository(Seria::class)
						->getSeriaArrayByAnnCat(
							['root_cat_id'=>$val['root_cat_id'], 'get_ann'=>true]
						);
			foreach($seria_array as $key_2=>$val_2) {
				$ann_array = $val_2->getAnnArray();
				foreach($ann_array as $key_3=>$val_3) {
					$result[$key]['ann_array'][]=$val_3;
				}
			}
		}
		
		return $result;
	}
	
}
?>