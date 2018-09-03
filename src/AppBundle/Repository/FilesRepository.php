<?php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;
use AppBundle\Entity\Files;
use AppBundle\Ext\loggerClass;

class FilesRepository extends \Doctrine\ORM\EntityRepository
{
	
	public function uploadFile($config=null){
		
		$site_dir = $_SERVER['DOCUMENT_ROOT'];
		$type = $config['type'];
		
		if (isset($_GET['qqfile'])) {
			$file_name_dest='php://input';	
			$file_name_origin=$_GET['qqfile'];
		} elseif (isset($_FILES['qqfile'])) {
			$file_name_dest=$_FILES['qqfile']['tmp_name'];
			$file_name_origin=$_FILES['qqfile']['name'];
		} 
		else{
			$result= false; 
		}
		
		$file_data = pathinfo($file_name_origin);
		$ext = $file_data['extension'];
		$filename_old = $file_data['filename'];
		$filename_old = substr($file_name_origin, 0 ,-4);
		$file_id = $this->getNewFileId(['type'=>$type]);
		$filename_new = $type.'_'.$file_id;
		$filename_new = $this->getHash($filename_new);
		$path = $this->getFilePath($file_id);
		$file = $path.$filename_new.'.'.$ext;
		
		copy($file_name_dest, $site_dir.$file);
		$this->updateFile( ['id'=>$file_id, 'file'=>$file, 'ext'=>$ext, 'name'=>$filename_old]);	
		
		$result = [
			"success"=>true, 
			'file_id'=>$file_id, 
			'file'=>$file, 
			'filename'=>$filename_old, 
			'ext'=>$ext
		];
		
		return $result;
	
	}
	
	protected function getNewFileId ($config=null){
		
		$item = new Files();
		$item->setType( $config['type'] );
		$item->setDatetime( time() );
		
		$em = $this->getEntityManager();
		$em->persist($item);
		$em->flush();
		
		return $item->getId();
		
	}
	
	protected function getHash ($val){
		return md5('7adf05'.$val.'98fasdf5');
	}
	
	protected function getFilePath($id) {
		{// dir_mln
			$dir_mln = ($id - $id%1000000)/1000000;
			if($id%1000000 == 0){
				$dir_mln=$dir_mln;
			}
			else{
				$dir_mln=$dir_mln+1;
			}
			$dir_mln=$dir_mln*1000000;
		}
		{// dir_ths
			$dir_ths = ($id - $id%1000)/1000;
			if($id%1000 == 0){
				$dir_ths=$dir_ths;
			}
			else{
				$dir_ths=$dir_ths+1;
			}
			$dir_ths=$dir_ths*1000;
		}
		{// dir_chek
			$site_dir=$_SERVER['DOCUMENT_ROOT'];
			
			if (!is_dir($site_dir.'/fileData/'.$dir_mln)){
				mkdir($site_dir.'/fileData/'.$dir_mln,0777);
			}
			
			if (!is_dir($site_dir.'/fileData/'.$dir_mln.'/'.$dir_ths)){
				mkdir($site_dir.'/fileData/'.$dir_mln.'/'.$dir_ths,0777);
			}
			
		}
		
		$path='/fileData/'.$dir_mln.'/'.$dir_ths.'/';
		return $path;
	}
	
	protected function updateFile ($config=null){
		
		$em = $this->getEntityManager();
		
		$item = $em
			->getRepository(Files::class)
			->find($config['id']);
		
		$item->setFile( $config['file'] );
		$item->setName( $config['name'] );
		$item->setExt( $config['ext'] );
		
		$em->flush();
		
	}
}
