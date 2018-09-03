<?
// src/AppBundle/Service/SiteData.php
namespace AppBundle\Service;



use Symfony\Component\HttpFoundation\RequestStack;
use Doctrine\ORM\EntityManager;
use AppBundle\Entity\Config;
use AppBundle\Entity\Page;


class SiteData 
{

    protected $data = [];
	protected $em;
	protected $request_stack;

	function __construct( EntityManager $em, RequestStack $request_stack ){	
		
		$this->em = $em;
		$this->request_stack = $request_stack;
		
		$this->build();
	}
	
	public function build(){
		
		$em = $this->em;
		$request_stack = $this->request_stack;
		
		// config
		$config = $em
			->getRepository(Config::class)
			->getAll();
		$this->data['config'] = $config;
		
		// mnemonic
		$request = $request_stack->getCurrentRequest();
		if(!$request){
			return false;
		}
		$mnemonic = $request->attributes->get('mnemonic');
		
		$page = $em
			->getRepository(Page::class)
			->getPageItemByMnemonic(['mnemonic'=>$mnemonic]);
		
		if(!$page){
			$mnemonic = '404';
			$page = $em
					->getRepository(Page::class)
					->getPageItemByMnemonic(['mnemonic'=>$mnemonic]);
		}
		$this->data['mnemonic'] = $mnemonic;
		$this->data['page'] = $page;
		
		$this->data['cat_mnemonic'] = '';
		$this->data['mode'] = '';
		$this->data['ann_mnemonic'] = '';
		$this->data['sub_mnemonic'] = '';
	}
	
	public function getData(){
		return $this->data;
	}
	public function setCatMnemonic($mnemonic){
		$this->data['cat_mnemonic'] = $mnemonic;
	}
	public function setSubMnemonic($mnemonic){
		$this->data['sub_mnemonic'] = $mnemonic;
	}
	public function setAnnMnemonic($mnemonic){
		$this->data['ann_mnemonic'] = $mnemonic;
	}
	public function setPageTitle($title){
		$this->data['page']['title'] = $title;
	}
	
	

}
?>