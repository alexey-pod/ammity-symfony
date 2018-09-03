<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\SerializerInterface;
use AppBundle\Ext\loggerClass;
use AppBundle\Service\Basket;
use AppBundle\Service\Compare;

class AjaxController extends Controller
{
	
	/**
	* @Route("/ajax/", name="ajax_page")
	*/
    public function pagesPageAction(Request $request, EntityManagerInterface $em, SerializerInterface  $serializer, 
	loggerClass $logger, Basket $basket, Compare $compare)
    {
		
		$_post = $request->request->all();
		$_get = $request->query->all();
		
		if( $request->query->get('mode')=='uploadFile' ){
			// GET
			$mode = $request->query->get('mode');
			$_post = $_get;
		}else{
			// POST
			$mode = $request->request->get('mode');
		}
		
		// debug
		// if(!$_post){
			// $mode = $request->query->get('mode');
			// $_post = $_get;
		// }
		
		if($mode=='getSeriaArrayByAnnCat'){
			$repo = $em->getRepository('AppBundle:Seria');
			$result = $repo->getSeriaArrayByAnnCat($_post);
			return $this->ajax($result);
		}
		if($mode=='getAnnArrayForRegister'){
			$repo = $em->getRepository('AppBundle:Ann');
			$result = $repo->getAnnArrayForRegister($_post);
			return $this->ajax($result);
		}
		if($mode=='addQuestionItem'){
			$repo = $em->getRepository('AppBundle:Question');
			$result = $repo->addQuestionItem($_post);
			return $this->ajax($result);
		}
		if($mode=='addCommentItem'){
			$repo = $em->getRepository('AppBundle:Comment');
			$result = $repo->addCommentItem($_post);
			return $this->ajax($result);
		}
		if($mode=='addServiceItem'){
			$repo = $em->getRepository('AppBundle:Service');
			$result = $repo->addServiceItem($_post);
			return $this->ajax($result);
		}
		if($mode=='addDealerRequestItem'){
			$repo = $em->getRepository('AppBundle:DealerRequest');
			$result = $repo->addDealerRequestItem($_post);
			return $this->ajax($result);
		}
		if($mode=='addPrItem'){
			$repo = $em->getRepository('AppBundle:ProductRegistration');
			$result = $repo->addPrItem($_post);
			// $logger->writeLog($_post);
			return $this->ajax($result);
		}
		if($mode=='uploadFile'){
			$repo = $em->getRepository('AppBundle:Files');
			$result = $repo->uploadFile($_post);
			return $this->ajax($result);
		}
		if($mode=='searchAnn'){
			$repo = $em->getRepository('AppBundle:Ann');
			$result = $repo->searchAnn($_post);
			return $this->ajax($result);
		}
		if ($mode=='setCompare'){
			$result = $compare->setCompare($_post);
			return $this->ajax($result);
		}
		
		// BASKET
		if ($mode=='loadBasket'){
			$result = $basket->loadBasket();
			return $this->ajax($result);
		}
		if ($mode=='addToBasket'){
			$amount = $basket->addToBasket($_post);
			$result = $basket->loadBasket($_post);
			$result['amount'] = $amount;
			return $this->ajax($result);
		}
		if ($mode=='updateBasketItem'){
			$basket->updateBasketItem($_post);
			$result = $basket->loadBasket($_post);
			return $this->ajax($result);
		}
		if ($mode=='deleteFromBasket'){
			$basket->deleteFromBasket($_post);
			$result = $basket->loadBasket($_post);
			return $this->ajax($result);
		}
		if ($mode=='addOrderItem'){
			$result = $basket->addOrderItem($_post);
			return $this->ajax($result);
		}

		$response = $this->forward('AppBundle\Controller\DefaultController::inner404Redirect', []);
		return $response;
		
    }
	
	public function ajax($data)
    {
		$serializer = $this->get('serializer');
		$data = $serializer->normalize($data);
		$response = new Response( json_encode ($data, JSON_UNESCAPED_UNICODE) );
		return $response;
	}
		
}
