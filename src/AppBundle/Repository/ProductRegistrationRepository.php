<?php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;
use AppBundle\Entity\ProductRegistration;
use AppBundle\Entity\ProductRegistrationAttach;

use AppBundle\Ext\fn;
use AppBundle\Ext\loggerClass;



class ProductRegistrationRepository extends \Doctrine\ORM\EntityRepository
{
	
	public function addPrItem($config=null){
		
		$item = new ProductRegistration();

		$item->setAnnId( $config['ann_id'] );
		$item->setFio( $config['fio'] );
		$item->setEmail( $config['email'] );
		$item->setDatetimeAdd( time() );
		$item->setPhone( $config['phone'] );
		$item->setCity( $config['city'] );
		$item->setShop( $config['shop'] );
		$item->setSaleDate( $config['sale_date'] );
		$item->setSerialNumber( $config['serial_number'] );
		
		$em = $this->getEntityManager();
		
		$attach_array=fn::unpackDataAjax($config['attach_str']);
		foreach($attach_array as $key=>$val) {
			$pra = new ProductRegistrationAttach();
			$pra->setDealerRequest($item);
			$pra->setFileId($val['file_id']);
			$pra->setSort($val['sort']);
			$em->persist($pra);
		}
		
		$em->persist($item);
		$em->flush();
		
		return $item->getId();
	}
	
}
