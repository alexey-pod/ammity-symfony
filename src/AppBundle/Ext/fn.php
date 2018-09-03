<?

namespace AppBundle\Ext;

class fn {
	
	public static function unpackDataAjax($str){
		
		$sep1="<[>";	
		$sep2="<[[>";	
		$sep3="<[[[>";	
		$result = [];
		
		$arr = explode($sep3, $str);
		foreach($arr as $key=>$val) {
			if($val!=''){
				$item = explode($sep2, $val);
				$itemArr = [];
				foreach($item as $key1=>$val1) {
					if($val1!=''){
						$val_key = explode($sep1, $val1);
						$itemArr[$val_key[0]] = $val_key[1];
					}
				}
				$result[] = $itemArr;
			}
		}
		return $result;
	}
	
	public static function formatPrice($price){
		return number_format($price, 0, ',', ' ');
	}
	
	
}
	
	
?>