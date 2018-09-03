<?php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;
use AppBundle\Entity\Presentation;

class PresentationRepository extends \Doctrine\ORM\EntityRepository
{
	

	
	/**
	* @param $config['show_in_mane'] 
	* @param $config['show_in_pr_page'] 
	* @param $config['pp'] 
	* @param $config['page'] 
	*/
	public function getPresentationArray($config=null)
    {
		
		$qb = $this->getEntityManager()
			->createQueryBuilder()
			->select('p')
			->from('AppBundle:Presentation', 'p')
			->add('orderBy', 'p.sort ASC');
		
		{// фильтрация
			$qb->andWhere("p.isDisable = '0'");
			if(isset($config['show_in_mane'])){
				$show_in_mane=$config['show_in_mane'];
				$qb->andWhere("p.showInMane = '$show_in_mane'");
			}
			if(isset($config['show_in_pr_page'])){
				$show_in_pr_page=$config['show_in_pr_page'];
				$qb->andWhere("p.showInPrPage = '$show_in_pr_page'");
			}
		}
		
		{// limit
			if($config['page'] != -1){
				$offset = ($config['page']-1)*$config['pp'];// сколько рядов мы пропускаем
				$limit = $config['pp'];// сколько выбираем за раз
				$qb->setFirstResult( $offset )->setMaxResults( $limit );
			}
		}
		
		$result = $qb
				->getQuery()
				->getResult();
		
		{// доп обработка данных
			foreach($result as $key=>$val) {
				$this->fuxUrl($val);
			}
		}

		return $result;
	}
	
	private function fuxUrl(Presentation $item){
		
		if($item->getUrl()==''){
			$item->setUrl( '/pages/presentation/#pr_'.$item->getId() );
		}
		
	}//END
	
	
	
	
	
}
