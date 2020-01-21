<?php
	class FrontendHelper{
	public static function filterElements($collection,$postID){
		$data = array();
		if(!empty($collection)){			
		foreach ($collection as $item) {
			$continue_display = true;
			if($item->exclusive_page=="true"){
				// echo array_search($postID, $item->pages);
				if(count($item->pages)){
					if(array_search($postID, $item->pages)===false){
						$continue_display = false;
					}else{
						// $continue_display = true;
					}
				}
			}
			if($continue_display){
				array_push($data,$item);
			}
		}
		}
		return $data;
	}
	}
?>