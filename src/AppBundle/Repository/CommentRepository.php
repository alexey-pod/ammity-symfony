<?php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;
use AppBundle\Entity\Comment;

class CommentRepository extends \Doctrine\ORM\EntityRepository
{
	
	public function addCommentItem($config=null){
		
		$qs = new Comment();
		
		$qs->setAnnId( $config['ann_id'] );
		$qs->setFio( $config['fio'] );
		$qs->setEmail( $config['email'] );
		$qs->setDatetimeAdd( time() );
		$qs->setText( $config['text'] );
		$qs->setDesign( $config['design'] );
		$qs->setSafety( $config['safety'] );
		$qs->setFunctionality( $config['functionality'] );
		$qs->setComfort( $config['comfort'] );
		
		$em = $this->getEntityManager();
		$em->persist($qs);
		$em->flush();
		
		return $qs->getId();
	}
	
}
