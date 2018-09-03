<?php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;
use AppBundle\Entity\DealerRequest;

class DealerRequestRepository extends \Doctrine\ORM\EntityRepository
{
	
	public function addDealerRequestItem($config=null){
		
		$item = new DealerRequest();

		$item->setName( $config['name'] );
		$item->setFio( $config['fio'] );
		$item->setPhone( $config['phone'] );
		$item->setEmail( $config['email'] );
		$item->setNote( $config['note'] );
		$item->setCustomerBase( $config['customer_base'] );
		$item->setServiceCenter( $config['service_center'] );
		$item->setSite( $config['site'] );
		$item->setCity( $config['city'] );
		$item->setAddDatetime( time() );
		
		$em = $this->getEntityManager();
		$em->persist($item);
		$em->flush();
		
		return $item->getId();
	}
	
}
