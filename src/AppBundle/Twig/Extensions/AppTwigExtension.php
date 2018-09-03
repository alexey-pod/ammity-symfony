<?php

namespace AppBundle\Twig\Extensions;

class AppTwigExtension extends \Twig_Extension
{

	public function getName()
    {
        return 'app_twig_extension';
    }
	
	public function getFilters()
    {
        return [
            new \Twig_SimpleFilter('parseToJS', [$this, 'parseToJS'], ['is_safe' => ['all']])
        ];
    }

	public function parseToJS($data){
		if(!$data){
			$data = [];
		}
		$str = json_encode($data);
		$str = addcslashes($str, "'");
		$str = addcslashes($str, '"');
		echo $str;
	}
	
   
}