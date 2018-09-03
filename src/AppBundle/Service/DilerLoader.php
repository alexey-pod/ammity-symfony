<?
// src/AppBundle/Service/DilerLoader.php
namespace AppBundle\Service;

class DilerLoader
{

	function __construct(  ){}
	
	public function getData(){
		
		{//diler_array
		
			$host = 'http://clear-fit.ru/admin/diler_export.php';
			$diler_str = file_get_contents($host);
			$diler_array = json_decode($diler_str, true);
					
			foreach($diler_array as $key_1=>$val_1) {
				foreach($val_1 as $key_2=>$val_2) {
					if($val_2['website1']!=''){
						if(substr($val_2['website1'], 0,7)!='http://'){
							$diler_array[$key_1][$key_2]['website1_url']='http://'.$val_2['website1'];
						}
						else{
							$diler_array[$key_1][$key_2]['website1_url']=$val_2['website1'];
						}
					}
					if($val_2['website2']!=''){
						if(substr($val_2['website2'], 0,7)!='http://'){
							$diler_array[$key_1][$key_2]['website2_url']='http://'.$val_2['website2'];
						}
						else{
							$diler_array[$key_1][$key_2]['website2_url']=$val_2['website2'];
						}
					}
				}
			}
		}
		
		{//diler_map_array
			$host = 'http://clear-fit.ru/admin/diler_export_map.php';
			$diler_str = file_get_contents($host);
			$diler_map_array = json_decode($diler_str, true);
		}//END 
		
		return ['diler_array'=>$diler_array, 'diler_map_array'=>$diler_map_array];
	}

	
}
?>