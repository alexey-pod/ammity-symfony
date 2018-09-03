<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

use AppBundle\Entity\Page;
use AppBundle\Entity\Cat;
use AppBundle\Entity\Ann;

use AppBundle\Service\SiteData;
use AppBundle\Service\DilerLoader;
use AppBundle\Service\Basket;
use AppBundle\Service\Compare;

use AppBundle\Ext\loggerClass;

class DefaultController extends Controller
{
	/**
	* @Route("/", name="homepage", defaults={"mnemonic"="index"})
	*/
    public function indexAction(Request $request, EntityManagerInterface $em)
    {
		$repo = $em->getRepository('AppBundle:Cat');
		$cat_array = $repo->getCatArray(['id'=>0, 'bild_url'=>true, 'show_in_mane'=>true]);
		
		$repo = $em->getRepository('AppBundle:Presentation');
		$pr_array = $repo->getPresentationArray(['pp'=>3, 'page'=>1, 'show_in_mane'=>1, 'bild_url'=>true, 'get_image'=>true]);
		
        return $this->render('index.html.twig', [
            'cat_array' => $cat_array,
            'pr_array' => $pr_array,
        ]);
    }
	
	
	/**
	* @Route("/compare/{compare_list}/", name="compare_page", defaults={"mnemonic"="catalog"})
	* @ParamConverter("page_item", options={"mapping": {"mnemonic" : "mnemonic"}})
	*/
    public function comparePageAction(EntityManagerInterface $em, Request $request, 
		Page $page_item, SiteData $site_data, Compare $compare, $compare_list)
    {
		if (!$page_item) {
			return $this->page404();
        }
		
		$site_data->setPageTitle( 'Сравнение товаров' );
		$site_data->setSubMnemonic( 'compare' );
		$diff = $request->query->get('diff');
		$compare_array = $compare->getCompareItemArray(['compare_list'=>$compare_list, 'diff'=>$diff]);
		
		return $this->render('catalog/compare.html.twig', [
            'page_item' => $page_item,
            'compare_array' => $compare_array,
        ]);
    }
	
	
	/**
	* @Route("/basket/", name="basket_page", defaults={"mnemonic"="basket"})
	* @ParamConverter("page_item", options={"mapping": {"mnemonic" : "mnemonic"}})
	*/
    public function basketPageAction(EntityManagerInterface $em, Request $request, Page $page_item, SiteData $site_data)
    {
		if (!$page_item) {
			return $this->page404();
        }
		
		return $this->render('pages/basket.html.twig', [
            'page_item' => $page_item,
        ]);
    }
	
	/**
	* @Route("/catalog/{cat_mnemonic}/{ann_mnemonic}/", name="ann_item_page", defaults={"mnemonic"="catalog"})
	* @ParamConverter("page_item", options={"mapping": {"mnemonic" : "mnemonic"}})
	*/
    public function annItemPageAction(EntityManagerInterface $em, Request $request, 
		$ann_mnemonic, $cat_mnemonic, Page $page_item, SiteData $site_data, Basket $basket
	)
    {
		if (!$page_item) {
			return $this->page404();
        }
		
		$repo = $em->getRepository('AppBundle:Ann');
		$ann_item = $repo->getAnnItemByMnemonic(['mnemonic' => $ann_mnemonic, 'bild_seria_url'=>true]);
		
		if (!$ann_item) {
			return $this->page404();
        }
		
		$site_data->setPageTitle( $ann_item['name'] );
		$site_data->setAnnMnemonic( $ann_mnemonic );
		$site_data->setCatMnemonic( $cat_mnemonic );
		
		$ann_item['in_basket'] = $basket->checkInBasket(['id'=>$ann_item['id']]);
		$ann_item['in_basket_amount']=$basket->checkInBasketAmount(['id'=>$ann_item['id']]);
		
		
		return $this->render('catalog/ann_item.html.twig', [
            'page_item' => $page_item,
            'ann_item' => $ann_item,
        ]);
    }
	
	/**
	* @Route("/seria/{seria_mnemonic}/", name="seria_item_page", defaults={"mnemonic"="catalog"})
	* @ParamConverter("page_item", options={"mapping": {"mnemonic" : "mnemonic"}})
	*/
    public function seriaItemPageAction(EntityManagerInterface $em, Request $request, $seria_mnemonic, Page $page_item, SiteData $site_data	)
    {
		if (!$page_item) {
			return $this->page404();
        }
		
		$repo = $em->getRepository('AppBundle:Seria');
		$seria_item = $repo->findOneBy(['mnemonic' => $seria_mnemonic]);
		
		if (!$seria_mnemonic) {
			return $this->page404();
        }
		
		$site_data->setPageTitle( 'Серия ' . $seria_item->getName() );
		$site_data->setCatMnemonic( $seria_item->getMnemonic() );
		
		$repo = $em->getRepository('AppBundle:Seria');
		$seria_cat_array = $repo->getSeriaCatArray([
			'id'=>$seria_item->getId(), 
			'get_ann'=>true, 
			'count_compare'=>true, 
			'get_compare_url'=>true,
			'bild_seria_url'=>true,
		]);
		
		return $this->render('catalog/seria_item.html.twig', [
            'page_item' => $page_item,
            'seria_item' => $seria_item,
            'seria_cat_array' => $seria_cat_array,
        ]);
    }
	
	/**
	* @Route("/catalog/", name="cat_item_page_main", defaults={"mnemonic"="catalog", "cat_mnemonic"="begovye-dorozhki"})
	* @Route("/catalog/{cat_mnemonic}/", name="cat_item_page", defaults={"mnemonic"="catalog"})
	* @ParamConverter("page_item", options={"mapping": {"mnemonic" : "mnemonic"}})
	*/
    public function catItemPageAction(EntityManagerInterface $em, Request $request, $cat_mnemonic, Page $page_item, SiteData $site_data	)
    {
		if (!$page_item) {
			return $this->page404();
        }
		
		$repo = $em->getRepository('AppBundle:Cat');
		$cat_item = $repo->findOneBy(['mnemonic' => $cat_mnemonic]);
		
		if (!$cat_item) {
			return $this->page404();
        }
		
		$site_data->setPageTitle( $cat_item->getName() );
		$site_data->setCatMnemonic( $cat_item->getMnemonic() );
		
		$repo = $em->getRepository('AppBundle:Ann');
		$ann_array = $repo->getAnnArray([
			'get_main_param'=>true, 
			'root_cat_id'=>$cat_item->getRootCatId(), 
			'count_compare'=>true, 
			'get_compare_url'=>true,
			'bild_seria_url'=>true,
			'bild_url'=>true,
		]);
		
		return $this->render('catalog/cat_item.html.twig', [
            'page_item' => $page_item,
            'cat_item' => $cat_item,
            'ann_array' => $ann_array,
        ]);
    }
	
	/**
	* @Route("/pages/product_registration/", name="product_registration_page", defaults={"mnemonic"="product_registration"})
	* @ParamConverter("Page", options={"mapping": {"mnemonic" : "mnemonic"}})
	*/
    public function productRegistrationPageAction(EntityManagerInterface $em, Page $page_item)
    {
		if (!$page_item) {
			return $this->page404();
        }
		
		$repo = $em->getRepository('AppBundle:Cat');
		$cat_array = $repo->getCatArray(['id'=>0, 'link_disable'=>0]);
		
		return $this->render('pages/product_registration.html.twig', [
            'page_item' => $page_item,
            'cat_array' => $cat_array,
        ]);
    }
	
	/**
	* @Route("/pages/cooperation/", name="cooperation_page", defaults={"mnemonic"="cooperation"})
	* @ParamConverter("Page", options={"mapping": {"mnemonic" : "mnemonic"}})
	*/
    public function cooperationPageAction(EntityManagerInterface $em, Page $page_item)
    {
		if (!$page_item) {
			return $this->page404();
        }
		
		return $this->render('pages/cooperation.html.twig', [
            'page_item' => $page_item,
        ]);
    }
	
	/**
	* @Route("/pages/contact/", name="contact_page", defaults={"mnemonic"="contact"})
	* @ParamConverter("Page", options={"mapping": {"mnemonic" : "mnemonic"}})
	*/
    public function contactPageAction(EntityManagerInterface $em,Page $page_item)
    {
		if (!$page_item) {
			return $this->page404();
        }
		
		$repo = $em->getRepository('AppBundle:Cat');
		$cat_array = $repo->getCatArray(['id'=>0, 'link_disable'=>0]);
		
		return $this->render('pages/contact.html.twig', [
            'page_item' => $page_item,
            'cat_array' => $cat_array,
        ]);
    }
	
	/**
	* @Route("/pages/search_dealer/", name="search_dealer_page", defaults={"mnemonic"="search_dealer"})
	* @ParamConverter("Page", options={"mapping": {"mnemonic" : "mnemonic"}})
	*/
    public function searchDealerPageAction(DilerLoader $d_loader, $mnemonic, Page $page_item)
    {
		if (!$page_item) {
			return $this->page404();
        }
		
		$data = $d_loader->getData();
		
		return $this->render('pages/search_dealer.html.twig', [
            'page_item' => $page_item,
            'diler_array' => $data['diler_array'],
            'diler_map_array' => $data['diler_map_array'],
        ]);
    }
	
	/**
	* @Route("/pages/action/", name="action_page", defaults={"mnemonic"="action"})
	* @ParamConverter("Page", options={"mapping": {"mnemonic" : "mnemonic"}})
	*/
    public function actionPageAction(EntityManagerInterface $em, Request $request, $mnemonic, Page $page_item)
    {
		if (!$page_item) {
			return $this->page404();
        }
		
		return $this->render('pages/action.html.twig', [
            'page_item' => $page_item,
        ]);
    }

	/**
	* @Route("/pages/presentation/", name="presentation_page", defaults={"mnemonic"="presentation"})
	* @ParamConverter("Page", options={"mapping": {"mnemonic" : "mnemonic"}})
	*/
    public function presentationPageAction(EntityManagerInterface $em, Request $request, $mnemonic, Page $page_item)
    {
		if (!$page_item) {
			return $this->page404();
        }
	 
		$repo = $em->getRepository('AppBundle:Presentation');
		$pr_array = $repo->getPresentationArray(['page'=>-1, 'get_image'=>true, 'show_in_pr_page'=>1]);
			
		return $this->render('pages/presentation.html.twig', [
            'page_item' => $page_item,
            'pr_array' => $pr_array,
        ]);
    }	
	
	/**
	* @Route("/pages/app/", name="app_page", defaults={"mnemonic"="app"})
	* @ParamConverter("Page", options={"mapping": {"mnemonic" : "mnemonic"}})
	*/
    public function appPageAction(EntityManagerInterface $em, Request $request, $mnemonic, Page $page_item)
    {
		if (!$page_item) {
			return $this->page404();
        }
			
		$repo = $em->getRepository('AppBundle:Cat');
		$app_cat_array = $repo->getAppCat([]);
			
		return $this->render('pages/app.html.twig', [
            'page_item' => $page_item,
            'app_cat_array' => $app_cat_array,
        ]);
    }
	
	/**
	* @Route("/pages/{mnemonic}/", name="pages_page")
	*/
    public function pagesPageAction(Request $request, $mnemonic, EntityManagerInterface $em)
    {
		
		$repo = $em->getRepository('AppBundle:Page');
		$page_item = $repo->findBy(['mnemonic' => $mnemonic]);

		if (!$page_item) {
			return $this->page404();
        }
		
		return $this->render('pages/pages.html.twig', [
            'page_item' => $page_item,
        ]);

    }
	
	public function sidebarAction(EntityManagerInterface $em, Request $request)
	// меню слева
    {
		
		$repo = $em->getRepository('AppBundle:Presentation');
		$pr_array = $repo->getPresentationArray(['pp'=>3, 'page'=>1, 'show_in_mane'=>1, 'bild_url'=>true, 'get_image'=>true]);
		
		$repo = $em->getRepository('AppBundle:Cat');
		$left_menu = $repo->getLeftMenu([]);

        return $this->render('inc/sidebar_menu.html.twig', [
            'pr_array' => $pr_array,
            'left_menu' => $left_menu,
        ]);
    }
	
	/**
	* Данный роут перехватывает все переходы в системе, которые не охвачены другими роутами.
	* @Route("/{anything}", name="not_found", defaults={"mnemonic"="404", "anything" = null}, requirements={"anything"=".+"})
	*/
    public function inner404Redirect(SiteData $site_data_obj)
    {
		// $site_data = $site_data_obj->getData();
		// dump( $site_data );
		return $this->page404();
    }
	
	public function page404()
    {
		
		$request = $this->get('request_stack')->getCurrentRequest();
		$request->attributes->set('mnemonic', '404');
		$site_data = $this->container->get(SiteData::class);
		$site_data->build();
		
		$response = $this->render('pages/error404.html.twig', []);
		$response->setStatusCode(Response::HTTP_NOT_FOUND);
		return $response;
    }
	
}
