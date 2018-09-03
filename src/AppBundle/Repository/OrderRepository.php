<?php

namespace AppBundle\Repository;

use AppBundle\Entity\Order;
use AppBundle\Entity\OrderAnn;
use AppBundle\Service\Basket;
use Symfony\Component\HttpFoundation\Session\Session;

class OrderRepository extends \Doctrine\ORM\EntityRepository
{
	
	public function addOrderItem($config=null){

		$basket = $config['basket'];
		
		$em = $this->getEntityManager();
		$item = new Order();
		$item->setFio( $config['fio'] );
		$item->setPhone( $config['phone'] );
		$item->setEmail( $config['email'] );
		$item->setCity( $config['city'] );
		$item->setAddress( $config['address'] );
		$item->setText( $config['text'] );
		$item->setDatetimeAdd( time() );
		$item->setSum( $basket['summa'] );
		
		foreach($basket['basket'] as $key=>$val) {
			$oa = new OrderAnn();
			$oa->setOrder($item);
			$oa->setAnnId($val['id']);
			$oa->setPrice($val['price']);
			$oa->setQty($val['amount']);
			$oa->setSum($val['summa']);
			$em->persist($oa);
		}

		$em->persist($item);
		$em->flush();
		
		$item->setOrderCode( $this->generateCode( $item->getId() ) );
		$em->flush();
		
		return $item->getId();
	}
	
	protected function generateCode($id){
		return md5($id.'g5dgz545');
	}
		
}
