<?php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;
use AppBundle\Entity\Service;

class ServiceRepository extends \Doctrine\ORM\EntityRepository
{
	
	public function addServiceItem($config=null){
		
		$item = new Service();
		
		$item->setFio( $config['fio'] );
		$item->setEmail( $config['email'] );
		$item->setText( $config['text'] );
		$item->setDatetimeAdd( time() );
		$item->setAnnId( $config['ann_id'] );
		$item->setSerialNumber( $config['serial_number'] );
		$item->setShop( $config['shop'] );
		$item->setPhone( $config['phone'] );
		
		$em = $this->getEntityManager();
		$em->persist($item);
		$em->flush();
		
		return $item->getId();
	}
	
}
