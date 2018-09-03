<?

namespace AppBundle\Ext;

class loggerClass {


	public static function writeLog($obj, $name=null)
	{
		if($name){
			echo "<pre>";
				print_r($name.' = '.$obj);
			echo "</pre>";
		} 
		else{
			echo "<pre>";
				print_r($obj);
			echo "</pre>";
		}
	}
	public static function writeLogA($obj, $name=null)
	{
		if($name){
echo('
');
				print_r($name.' = '.$obj);
		} 
		else{
echo('
');
				print_r($obj);
		}
	}
	public static function writeLogT($obj, $name=null)
	{
		echo '<textarea style="width:100%; height:150px;">';
		if($name){
			echo('');
			print_r($name.' = '.$obj);
		} 
		else{
			echo('');
			print_r($obj);
		}
		echo '</textarea>';
	}
	
	public static function writeLogFile($obj, $name=null)
	{
		$file=$_SERVER['DOCUMENT_ROOT'].'/log.txt';
		/*
		$str='';
		if($name){
			$str=$name.'='.$obj;
		}
		else{
			$str=$obj;
		}
		$handle = fopen($_SERVER['DOCUMENT_ROOT'].'/log.txt', 'a+');
		fwrite($handle, PHP_EOL);
		fwrite($handle, $str);
		fclose($handle);
		*/
		
		//file_put_contents($file, $obj, FILE_APPEND | LOCK_EX);
		file_put_contents($file, PHP_EOL, FILE_APPEND | LOCK_EX);
		file_put_contents($file, var_export($obj,true),FILE_APPEND | LOCK_EX);
		


	}
}

?>