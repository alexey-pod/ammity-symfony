<?php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;
use AppBundle\Entity\Question;

class QuestionRepository extends \Doctrine\ORM\EntityRepository
{
	
	public function addQuestionItem($config=null){
		
		$qs = new Question();
		$qs->setFio( $config['fio'] );
		$qs->setEmail( $config['email'] );
		$qs->setPhone( $config['phone'] );
		$qs->setText( $config['text'] );
		$qs->setDatetimeAdd( time() );
		
		$em = $this->getEntityManager();
		$em->persist($qs);
		$em->flush();
		
		return $qs->getId();
	}
	
}
