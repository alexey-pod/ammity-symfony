<?
// src/AppBundle/Service/Basket.php
namespace AppBundle\Service;

use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\RequestStack;

use AppBundle\Entity\Ann;
use AppBundle\Entity\Config;
use AppBundle\Ext\fn;

class Basket
{
	private $session;
	private $em;
	private $twig;
	private $request_stack;
	private $mailer;

    public function __construct(SessionInterface $session, EntityManagerInterface $em, 
		\Twig_Environment $twig, RequestStack $request_stack, \Swift_Mailer $mailer)
    {
         $this->session = $session;
		 $this->em = $em;
		 $this->twig = $twig;
		 $this->request_stack = $request_stack;
		 $this->mailer = $mailer;
    }
	
	public function loadBasket($config=null){
		
		$item_array = $this->session->get('user_data')['cart'];
		
		if(!is_array($item_array)){
			return $result = [
				'basket'=>[], 
				'summa'=>0, 
				'summa_str'=>'', 
			];
		}
		
		$total_summa = 0;
		$basket = [];
		foreach($item_array as $key=>$val){
			
			$ann = $this->em
						->getRepository(Ann::class)
						->getAnnItemShot(['id'=>$val['id'], 'bild_full_name'=>true]);
			
			$item = [
				'id'=>$ann['id'], 
				'name'=>$ann['name'], 
				'name_full'=>$ann['name_full'], 
				'cat_name_one'=>$ann['cat_name_one'], 
				'seria_name'=>$ann['seria_name'], 
				'image'=>$ann['image'],
				'price'=>$ann['price'],
				'price_str'=>fn::formatPrice($ann['price']),
				'url'=>$ann['url']
			];
			$item['amount'] = $val['amount'];
			$item['summa'] = $item['amount'] * $item['price'];
			$item['summa_str'] = fn::formatPrice($item['summa']);
			$basket[] = $item;
			$total_summa += $item['summa'];
		}
	
		$result = [
			'basket'=>$basket, 
			'summa'=>$total_summa, 
			'summa_str'=>fn::formatPrice($total_summa), 
		];
		return $result;
	}
	
	public function checkInBasket($config=null){
		$item_array = $this->session->get('user_data')['cart'];
		if(!$item_array){
			return false;
		}
		foreach($item_array as $key=>$val) {
			if($val['id']==$config['id']){
				return true;
			}
		}
	}
	
	public function checkInBasketAmount($config=null){
		$item_array = $this->session->get('user_data')['cart'];
		if(!$item_array){
			return 0;
		}
		foreach($item_array as $key=>$val) {
			if($val['id']==$config['id']){
				return $val['amount'];
			}
		}
	}

	public function addToBasket($config=null){
		$item_array = $this->session->get('user_data')['cart'];
		if($item_array){
			foreach($item_array as $key=>$val){
				if($val['id']==$config['id']){
					$item_array[$key]['amount'] = $val['amount'] + $config['amount'];
					$this->session->set('user_data', ['cart'=>$item_array]);
					return $item_array[$key]['amount'];
				}
			}
		}

		$item_array[] = ['id'=>$config['id'], 'amount'=>$config['amount']];
		$this->session->set('user_data', ['cart'=>$item_array]);
		
		$amount = $this->checkInBasketAmount($config);
		return $amount;
	}
	
	public function updateBasketItem($config=null){
		
		$item_array = $this->session->get('user_data')['cart'];
		
		if(!$item_array){
			return ;
		}
		
		foreach($item_array as $key=>$val) {
			if($val['id']==$config['id']){
				$item_array[$key]['amount'] = $config['amount'];
				$this->session->set('user_data', ['cart'=>$item_array]);
				return;
			}
		}
		return;
	}
	
	public function deleteFromBasket($config=null){
	
		$item_array = $this->session->get('user_data')['cart'];
		
		if(!$item_array){
			return ;
		}
		
		foreach($item_array as $key=>$val) {
			if($val['id']==$config['id']){
				unset($item_array[$key]);
				$this->session->set('user_data', ['cart'=>$item_array]);
				return;
			}
		}
		return;
	}
	
	public function clearBasket($config=null){
		$this->session->set('user_data', ['cart'=>[]]);
		return;
	}
	
	public function addOrderItem($config=null){
		$repo =  $this->em->getRepository('AppBundle:Order');
		
		$config['basket'] = $this->loadBasket();
		$order_id = $repo->addOrderItem($config);
				
		$config['order_id'] = $order_id;
		$config['time'] = date("d.m.Y H:i", time());
		$request = $this->request_stack->getCurrentRequest();
		$config['site_url'] = $request->server->get('HTTP_HOST');
		$config['site_url'] = ($config['site_url']=='127.0.0.1:8000' ? 'ammity.ru' : $config['site_url']);
		$config['site_name'] = $this->em->getRepository(Config::class)->findOneBy(['key'=>'site_name'])->getVal();
		$config['product_order'] = $this->em->getRepository(Config::class)->findOneBy(['key'=>'product_order'])->getVal();
		
		$html = $this->renderTemplate($config);
				
		// to user
		$this->sendNotify([
			'subject'=>'Ваш заказ в магазине '.$config['site_name'].' - получен.',
			'from'=>'no-reply@'.$config['site_url'],
			'to'=>$config['email'],
			'body'=>'<h1>Ваш заказ получен.</h1>'.$html,
		]);
		
		// to admin
		$this->sendNotify([
			'subject'=>'Заявка от посетителя '.$config['site_url'],
			'from'=>'no-reply@'.$config['site_url'],
			'to'=>$config['product_order'],
			'body'=>"<h1>Заявка от посетителя сайта ".$config['site_url']."</h1>".$html,
		]);
		
		$this->clearBasket();
		
		return $order_id;
	}
	
	private function renderTemplate($config=null){
		return $this->twig->render(
            'email_template/basket_order.html.twig',
            [
                'data' => $config
            ]
        );
    }
	
	private function sendNotify($config=null){
		
		$email = \Swift_Message::newInstance()
			->setSubject($config['subject'])
			->setFrom($config['from'])
			->setTo($config['to'])
			->setContentType("text/html")
			->setBody($config['body'], 'text/html');
		
		$this->mailer->send($email);
	}
	
}
?>