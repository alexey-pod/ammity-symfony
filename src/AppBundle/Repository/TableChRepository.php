<?php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;

class TableChRepository extends \Doctrine\ORM\EntityRepository
{
	
	/**
	* @param $config['id'] 
	* @param $config['main_param'] 
	* @param $config['orientation'] 
	* @param $config['table_ch_sort_field'] 
	* @param $config['load_use_param'] 
	*/
	public function getAnnTableChArray($config=null)
    {
		
		$id = $config['id'];
		
		$qb = $this->getEntityManager()
			->createQueryBuilder()
			->select('t_ch')
			->from('AppBundle:TableCh', 't_ch')
			->andWhere("t_ch.annId = '$id'")
			;
			
		
		{// ORDER
			if( !isset($config['table_ch_sort_field']) ){
				$qb->add('orderBy', 't_ch.sort ASC');
			}
			if( isset($config['table_ch_sort_field']) ){
				$table_ch_sort_field=$config['table_ch_sort_field'];
				$qb->add('orderBy', "t_ch.$table_ch_sort_field ASC");
			}
		}
		
		{// FILTER
			if(isset($config['orientation'])){
				$orientation=$config['orientation'];
				$qb->andWhere("t_ch.orientation = '$orientation'");
			}
			if(isset($config['main_param'])){
				$main_param =$config['main_param'];
				$qb->andWhere("t_ch.mainParam = '$main_param'");
			}
		}
		
		$result = $qb
				->getQuery()
				->getResult();
		
		return $result;
	}
	
}
