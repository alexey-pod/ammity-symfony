<?
// src/AppBundle/Service/Compare.php
namespace AppBundle\Service;

use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Doctrine\ORM\EntityManagerInterface;
use AppBundle\Entity\Ann;
use AppBundle\Entity\TableCh;

class Compare
{
	private $session;
	private $em;

    public function __construct(SessionInterface $session, EntityManagerInterface $em)
    {
         $this->session = $session;
         $this->em = $em;
    }
	 
	/**
	* @param $config['compare_mode'] = add | remove
	*/
	public function setCompare($config=null)
	{
		$mode = $config['compare_mode'];
		$id = $config['id'];
		
		$item = $this->em
				->getRepository(Ann::class)
				->find($id);
		
		$root_cat_id = $item->getRootCatId();
		$compare_list = $this->session->get('compare_list');
		if($mode=='add'){
			$compare_list[$root_cat_id][$id]=1;
		}
		else{
			unset($compare_list[$root_cat_id][$id]);
		}
		$this->session->set('compare_list', $compare_list);
		
		$total = $this->countCompare(['id'=>$id]);
		$list = $this->getCompare(['id'=>$id]);
		$url = $this->bildCompareUrl(['id'=>$id]);
		$result = ['total'=>$total, 'list'=>$list, 'url'=>$url];

		return $result;
	}//END 

	public function countCompare($config=null)
	{
		$id=$config['id'];
		$item = $this->em
				->getRepository(Ann::class)
				->find($id);
		$root_cat_id = $item->getRootCatId();
		$compare_list = $this->session->get('compare_list');
		if(isset($compare_list[$root_cat_id])){
			$total = count($compare_list[$root_cat_id]);	
		}
		else{
			$total = 0;
		}
		
		return $total;
	}

	private function getCompare($config=null)
	{
		
		$id=$config['id'];
		$item = $this->em
				->getRepository(Ann::class)
				->find($id);
		$root_cat_id = $item->getRootCatId();
		$result = [];
		$compare_list = $this->session->get('compare_list');
		
		if(!$compare_list){
			return [];
		}
		
		foreach($compare_list[$root_cat_id] as $key=>$val) {
			$result[] = ['id'=>$key];
		}
		return $result;
	}

	public function bildCompareUrl($config=null)
	{
		$id=$config['id'];
		$item = $this->em
				->getRepository(Ann::class)
				->find($id);
		$root_cat_id = $item->getRootCatId();
		
		$str='';
		$str.='/compare/';
		
		$compare_list = $this->session->get('compare_list');
		if(!$compare_list){
			return '';
		}
		
		if(!isset($compare_list[$root_cat_id])){
			return '';
		}
		
		foreach($compare_list[$root_cat_id] as $key=>$val) {
			$str.= $key.'~';
		}
		$str=substr($str,0,-1);
		$str.='/';
		
		return $str;
	}
	
	public function checkInCompare($config=null)
	{
		$id = $config['id'];
		$root_cat_id = $config['root_cat_id'];
		$compare_list = $this->session->get('compare_list');
		$in_compare = (
			isset( $compare_list )
			&& isset( $compare_list[$root_cat_id] )
			&& isset( $compare_list[$root_cat_id][$id] )
			&& $compare_list[$root_cat_id][$id]==1)
			?(1):(0);
		return $in_compare;
	}
	
	private function bildDeleteCompareUrl($config=null)
	{
		$id=$config['id'];
		if( count($config['compare_list'])==1 ){
			$str = $this->em
						->getRepository(Ann::class)
						->bildUrl(['id'=>$config['id']]);
			return $str;
		}
		
		$str='';
		$str.='/compare/';
		foreach($config['compare_list'] as $key=>$val) {
			if($val!=$id){
				$str.=$val.'~';
			}
		}
		$str=substr($str,0,-1);
		$str.='/';
		return $str;
	}
		
	public function getCompareItemArray($config=null)
	{
		$compare_list = $config['compare_list'];
		$compare_list = explode('~', $compare_list);
		
		{// get product
			foreach($compare_list as $key=>$val){
				$ann_item = $this->em
						->getRepository(Ann::class)
						->getAnnItemShot(['id'=>$val, 'unset_text'=>true]);
				if(!$ann_item){
					return false;
				}
				if($ann_item['is_disable']==1){
					return false;
				}
				$ann_seria_array[] = $ann_item;
			}
		}
		
		{// get ch 
			foreach($ann_seria_array as $key=>$val){
				$ch_array = $this->em
						->getRepository(TableCh::class)
						->getAnnTableChArray([
							'id'=>$val['id'], 
							'load_use_param'=>true,
							'table_ch_sort_field'=>'sort',
							'table_ch_param_sort_field'=>'sort',
							'main_param'=>0
						]);
				$ch_array = $this->modeChNameAsKey(['arr'=>$ch_array]);
				$ann_seria_array[$key]['param']=$ch_array;
			}
		}		
			
		{// buil matrix 
			$result = [];
			$result['model_array'] = [];
			$result['param_array'] = [];
			foreach($ann_seria_array as $key=>$val){
				$result['model_array'][]=array(
					'id'=>$val['id'],
					'name'=>$val['name'],
					'is_disable'=>$val['is_disable'],
					'image'=>$val['image'],
					'url'=>$val['url'],
					'url_delete'=>$this->bildDeleteCompareUrl(['id'=>$val['id'], 'compare_list'=>$compare_list]),
					'price_str'=>$val['price_str'],
				);
			}
		}
					
		{// set data matrix 
			foreach($ann_seria_array as $key_1=>$val_1){
				$item_nomber=$key_1;
				foreach($val_1['param'] as $key_2=>$val_2){
					$section_param_name=$val_2['name'];
					if(!isset($result['param_array'][$section_param_name])){
						$result['param_array'][$section_param_name] = [];
					}
					
					foreach($val_2['param'] as $key_3=>$val_3){
						$param_name=$val_3['name'];
						$param_value=$val_3['value'];
						if(!isset($result['param_array'][$section_param_name][$param_name])){
							$result['param_array'][$section_param_name][$param_name] = [];
						}
						$result['param_array'][$section_param_name][$param_name][$item_nomber]=$param_value;
					}
				}
			}
		}
					
		{// add empty cels
			$total_item_compare=count($result['model_array']);
			foreach($result['param_array'] as $key_1=>$val_1){
				foreach($val_1 as $key_2=>$val_2){ 
					{// add emty element
						for ($i = 0; $i < $total_item_compare; $i++){
							if( !isset($val_2[$i]) ){
								$result['param_array'][$key_1][$key_2][$i]='';
							}
						}
					}
					
					{// sort array
						$arr=$result['param_array'][$key_1][$key_2];
						$result['param_array'][$key_1][$key_2]=array();
						for ($i = 0; $i < $total_item_compare; $i++){
							$result['param_array'][$key_1][$key_2][$i]=$arr[$i];
						}
					}
					
					{// add &mdash; to empty cell
						$arr=$result['param_array'][$key_1][$key_2];
						foreach($arr as $key_3=>$val_3){
							if($val_3==''){
								$result['param_array'][$key_1][$key_2][$key_3]='&mdash;';
							}
						}
					}
				}
				
			}
		}
			
		{// delete empty cat 
			foreach($result['param_array'] as $key_1=>$val_1){
				$param_total=0;
				foreach($val_1 as $key_2=>$val_2){
					$param_total++;
				}
				if($param_total==0){
					unset($result['param_array'][$key_1]);
				} 
			}
		}
			
		if ($config['diff']=='1') {
			foreach ($result['param_array'] as $c_raz_key => $c_razd_val) {
				foreach ($c_razd_val as $c_opt_key => $c_opt_val) {
					if (count(array_unique($c_opt_val)) == 1) {
						unset($result['param_array'][$c_raz_key][$c_opt_key]);
					}
				}
			}
		}
		
		{// // delete empty cat
			foreach($result['param_array'] as $key_1=>$val_1){
				$param_total=0;
				foreach($val_1 as $key_2=>$val_2){
					$param_total++;
				}
				if($param_total==0){
					unset($result['param_array'][$key_1]);
				} 
			}
		}

			return $result;
		}//END 
		
	private function modeChNameAsKey($config=null){
			$arr=$config['arr'];
			
			{// convert object to array
				$arr_new = [];
				foreach($arr as $key_1=>$val_1){
					$param_obj = $val_1->getTableChParamArray();
					$param_array = [];
					foreach($param_obj as $key_2=>$val_2){
						$param_array[] = ['name'=>$val_2->getName(), 'value'=>$val_2->getValue()];
					}
					$arr_new[] = ['name'=>$val_1->getName(), 'param'=>$param_array];
				}
				$arr = $arr_new;
			}
			
			// internal transformation
			foreach($arr as $key_1=>$val_1){
				$param_tmp=array();
				foreach($val_1['param'] as $key_2=>$val_2){
					unset($val_2['sort']);
					unset($val_2['is_collapsed']);
					unset($val_2['rec_id']);
					$param_tmp[$val_2['name']]=$val_2;
				}
				$arr[$key_1]['param'] = $param_tmp;
			}
			
			// external transformation
			$new_arr = [];
			foreach($arr as $key=>$val){
				unset($val['sort']);
				unset($val['rec_id']);
				unset($val['orientation']);
				$new_arr[$val['name']]=$val;
			}
			return $new_arr;
		}
	
	
	
}
?>