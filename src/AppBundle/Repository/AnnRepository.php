<?php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\EntityManager;
use AppBundle\Entity\Seria;
use AppBundle\Entity\TableCh;
use AppBundle\Ext\fn;
use AppBundle\Service\Compare;
use Symfony\Component\HttpFoundation\RequestStack;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Session\Session;

class AnnRepository extends EntityRepository
{
			
	/**
	* @param $config['cat_id'] 
	* @param $config['root_cat_id'] 
	* @param $config['seria_id'] 
	* @param $config['app'] 
	* @param $config['bild_url']
	* @param $config['no_text']
	* @param $config['bild_seria_url']
	* @param $config['get_main_param']
	*/
	public function getAnnArray($config=null){
		
		{// QUERY
			$qb = $this->getEntityManager()
				->createQueryBuilder()
				->select('
					a.id, a.name, a.mnemonic, a.price, a.rootCatId AS root_cat_id,
					a.sort AS ann_sort,
					c.mnemonic AS cat_mnemonic, 
					c.compare AS cat_compare, c.extendedWarranty AS cat_extended_warranty, 
					s.name AS series_mnemonic, s.id AS seria_id, s.sort AS seria_sort,
					ai.image
				')
				->from('AppBundle:ann', 'a')
				->innerJoin('AppBundle:Cat', 'c', 'WITH', 'c.id = a.catId')
				->innerJoin('AppBundle:Seria', 's', 'WITH', 's.id = a.seriaId')
				->leftJoin('AppBundle:AnnImage', 'ai', 'WITH', "ai.annId = a.id  AND ai.main='1' ")
				->andWhere("a.isDisable = '0'")
				->add('orderBy', 'a.sort ASC')
				;
		}
		
		{// FILTER
			if(isset($config['cat_id'])){
				$cat_id=$config['cat_id'];
				$qb->andWhere("a.catId = '$cat_id'");
			} 
			if(isset($config['root_cat_id'])){
				$root_cat_id=$config['root_cat_id'];
				$qb->andWhere("a.rootCatId = '$root_cat_id'");
			}
			if(isset($config['seria_id'])){
				$seria_id=$config['seria_id'];
				$qb->andWhere("a.seriaId = '$seria_id'");
			}
			if(isset($config['app'])){
				$app=$config['app'];
				$qb->andWhere("a.app = '$app'");
			}
		}

		$result = $qb
				->getQuery()
				->getResult();
		
		{// data processing
			
			$compare = new Compare( new Session(), $this->getEntityManager()  );
			
			foreach($result as $key=>$val) {
				
				$result[$key]['price_str'] = fn::formatPrice($val['price']);
				
				if( isset($config['bild_url']) ){
					$result[$key]['url']=$this->bildUrl(array('id'=>$val['id']));
				}
			
				if( isset($config['no_text']) ){
					unset($result[$key]['text']);
				}
				
				if( isset($config['bild_seria_url']) ){
					$seria_item = $this->getEntityManager()
								->getRepository('AppBundle:Seria')
								->getSeriaItem($val['seria_id']);
					$result[$key]['seria_url'] = $seria_item->getUrl();
				}
				
				if( isset($config['get_main_param']) ){
					$param_array = $this->getEntityManager()
								->getRepository('AppBundle:TableCh')
								->getAnnTableChArray([
									'id'=>$val['id'], 
									'load_use_param'=>true, 
									'main_param'=>1
								]);
					$result[$key]['param_array']=$param_array[0];
				}
				
				$result[$key]['in_compare'] = $compare->checkInCompare(['id'=>$val['id'], 'root_cat_id'=>$val['root_cat_id']]);
				if(isset($config['count_compare'])){
					$result[$key]['compare_total'] = $compare->countCompare(['id'=>$val['id']]);
				}
				if(isset($config['get_compare_url'])){
					$result[$key]['compare_url'] = $compare->bildCompareUrl(['id'=>$val['id']]);
				}
				
			}
		}

		return $result;
    }
	
	/**
	* @param $config['id'] 
	*/
	public function bildUrl($config=null){
		
		$id=$config['id'];
		
		$qb = $this->getEntityManager()
				->createQueryBuilder()
				->select('a.mnemonic, c.mnemonic AS cat_name')
				->from('AppBundle:ann', 'a')
				->innerJoin('AppBundle:Cat', 'c', 'WITH', 'c.id = a.rootCatId')
				->andWhere("a.id = '$id'")
				;
		
		$result = $qb
				->getQuery()
				->getOneOrNullResult();
		
		$url = '/catalog/'.$result['cat_name'].'/'.$result['mnemonic'].'/';
		
		return $url;
	}
	
	/**
	* @param $config['cat_id'] 
	* @param $config['root_cat_id'] 
	* @param $config['seria_id'] 
	*/
	public function getAnnArrayForRegister($config=null){
		
		{// QUERY
			$qb = $this->getEntityManager()
				->createQueryBuilder()
				->select('a.id, a.name')
				->from('AppBundle:ann', 'a')
				->andWhere("a.isDisable = '0'")
				->add('orderBy', 'a.sort ASC')
				;
		}//
		
		{// FILTER
			if(isset($config['cat_id'])){
				$cat_id=$config['cat_id'];
				$qb->andWhere("a.catId = '$cat_id'");
			} 
			if(isset($config['root_cat_id'])){
				$root_cat_id=$config['root_cat_id'];
				$qb->andWhere("a.rootCatId = '$root_cat_id'");
			}
			if(isset($config['seria_id'])){
				$seria_id=$config['seria_id'];
				$qb->andWhere("a.seriaId = '$seria_id'");
			}
		}
		
		$result = $qb
				->getQuery()
				->getResult();
		
		
		return $result;
	}
	
	/**
	* @param $config['bild_seria_url'] 
	*/
	public function getAnnItemByMnemonic($config=null){
		
		$mnemonic = $config['mnemonic'];

		{// QUERY
			$qb = $this->getEntityManager()
				->createQueryBuilder()
				->select('
					a.id, a.article, a.name, a.features, a.text, a.mnemonic, a.fullName AS full_name, 
					a.fullNameManual AS full_name_manual, a.app, a.available, a.price, a.isDisable as is_disable,
					a.seriaId AS seria_id, a.rootCatId AS root_cat_id,
					c.mnemonic AS cat_mnemonic, c.id AS cat_id, c.nameOne AS cat_name_one,
					c.compare AS cat_compare, c.extendedWarranty AS cat_extended_warranty, 
					s.name AS series_mnemonic
				')
				->from('AppBundle:ann', 'a')
				->innerJoin('AppBundle:Cat', 'c', 'WITH', 'c.id = a.rootCatId')
				->innerJoin('AppBundle:Seria', 's', 'WITH', 's.id = a.seriaId')
				->andWhere("a.mnemonic = '$mnemonic'")
				;
		}
		
		$result = $qb
				->getQuery()
				->getOneOrNullResult();
		
		{// data processing
			$result['url']=$this->bildUrl(array('id'=>$result['id']));
			$result['price_str'] = fn::formatPrice($result['price']);
			if( isset($config['bild_seria_url']) ){
					$seria_item = $this->getEntityManager()
								->getRepository('AppBundle:Seria')
								->getSeriaItem($result['seria_id']);
					$result['seria_url'] = $seria_item->getUrl();
				}
			$result['image_array']=$this->getAnnImageArray(['id'=>$result['id']]);
			$result['feature_array']=$this->getAnnFeatureArray(['id'=>$result['id']]);
			
			$ch_array = $this->getEntityManager()
						->getRepository('AppBundle:TableCh')
						->getAnnTableChArray([
							'id'=>$result['id'], 
							'load_use_param'=>true, 
							'main_param'=>0
						]);
			$result['ch_array'] = $ch_array;
			
			$compare = new Compare( new Session(), $this->getEntityManager()  );
			$result['in_compare'] = $compare->checkInCompare(['id'=>$result['id'], 'root_cat_id'=>$result['root_cat_id']]);
			$result['compare_total'] = $compare->countCompare(['id'=>$result['id']]);
			$result['compare_url'] = $compare->bildCompareUrl(['id'=>$result['id']]);
		}
		return $result;
	}
	
	private function getAnnImageArray($config=null){
		
		$id = $config['id'];
		$qb = $this->getEntityManager()
				->createQueryBuilder()
				->select('a_i.image')
		->from('AppBundle:AnnImage', 'a_i')
		->andWhere("a_i.annId = '$id'")
		->add('orderBy', 'a_i.sort ASC')
		;
		
		$result = $qb
				->getQuery()
				->getResult();
		
		return $result;
	}// END 
	
	private function getAnnFeatureArray($config=null){
		
		
		$id = $config['id'];
		$qb = $this->getEntityManager()
				->createQueryBuilder()
				->select('a_f.name, a_f.image, a_f.text')
		->from('AppBundle:AnnFeature', 'a_f')
		->andWhere("a_f.annId = '$id'")
		->add('orderBy', 'a_f.sort ASC')
		;
		
		$result = $qb
				->getQuery()
				->getResult();
		
		return $result;
	}// END 

	public function getAnnItemShot($config=null){
		
		$id = $config['id'];
		
		{// QUERY
			$qb = $this->getEntityManager()
				->createQueryBuilder()
				->select('
					a.id, a.name, a.price, a.isDisable AS is_disable,
					c.mnemonic AS cat_mnemonic, c.id AS cat_id, c.nameOne AS cat_name_one,
					s.name AS seria_name,
					a_i.image
				')
				->from('AppBundle:Ann', 'a')
				->innerJoin('AppBundle:Cat', 'c', 'WITH', 'c.id = a.rootCatId')
				->innerJoin('AppBundle:Seria', 's', 'WITH', 's.id = a.seriaId')
				->leftJoin('AppBundle:AnnImage', 'a_i', 'WITH', 'a_i.annId=a.id AND a_i.main=1')
				->andWhere("a.id = '$id'")
				;
		}
		
		$result = $qb
				->getQuery()
				->getOneOrNullResult();
		
		$result['url'] = $this->bildUrl($result);
		$result['price_str'] = fn::formatPrice($result['price']);
		if( isset($config['bild_full_name']) ){
			$result['name_full'] = $this->bildFullName($config);
		}
		return $result;
	}
	
	private function bildFullName($config=null){
		
		$id = $config['id'];
		
		{// QUERY
			$qb = $this->getEntityManager()
				->createQueryBuilder()
				->select('
					a.id, a.name, a.fullNameManual AS full_name_manual,
					c.mnemonic AS cat_mnemonic, c.nameOne AS cat_name_one,
					s.name AS seria_name
				')
				->from('AppBundle:Ann', 'a')
				->innerJoin('AppBundle:Cat', 'c', 'WITH', 'c.id = a.rootCatId')
				->innerJoin('AppBundle:Seria', 's', 'WITH', 's.id = a.seriaId')
				->andWhere("a.id = '$id'")
				;
		}
		
		$result = $qb
				->getQuery()
				->getOneOrNullResult();

		$str = $result['cat_name_one'] . ' - '. ' AMMITY ' . $result['seria_name'] . ' ' . $result['name'];
		
		if($result['full_name_manual']!=""){
			$str = $result['full_name_manual'];
		}
		
		return $str;
	}// END 
		
	public function searchAnn($config=null){
				
		{// QUERY
			$qb = $this->getEntityManager()
				->createQueryBuilder()
				->select('
					a.name, a.id, a.price,
					a.mnemonic AS ann_mnemonic,
					c.mnemonic AS cat_mnemonic,
					c2.nameOne AS cat_name_one,
					a_i.image
				')
				->from('AppBundle:ann', 'a')
				->innerJoin('AppBundle:Cat', 'c', 'WITH', 'c.id = a.catId')
				->leftJoin('AppBundle:Cat', 'c2', 'WITH', 'c2.id = a.rootCatId')
				->leftJoin('AppBundle:AnnImage', 'a_i', 'WITH', "a_i.annId = a.id  AND a_i.main='1' ")
				->andWhere("a.isDisable = '0'")
				->andWhere("a.price > 0")
				->groupBy('a.id') 
				->add('orderBy', 'a.name ASC')
				->setMaxResults( 6 )
				;
		}
		
		{// FILTER
			$query = trim(preg_replace('/ +/', ' ', $config['query']));
			if($query){
				$and_query=" a.name LIKE '%$query%' ";
				$query_arr = split(' ',$query);
				$and_query_arr = '';
				foreach ($query_arr as $key=>$val){
					if($key!=0){
						$and_query_arr.=" AND ";
					}
					$and_query_arr.="( a.fullName LIKE '%$val%' OR a.name LIKE '%$val%' )";
				}
			}
			$qb->andWhere($and_query_arr);
		}
		
		$result = $qb
				->getQuery()
				->getResult();
				
		{// data processing
			foreach($result as $key=>$val) {
				if(!$val['image']){
					$result[$key]['image']='';
				}
				$result[$key]['url']=$this->bildUrl($val);
				$result[$key]['price_str']=fn::formatPrice($val['price']);
			}
		}
				
		return $result;
		
	}
	
	
}
?>