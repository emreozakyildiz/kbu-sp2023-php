<?php include_once("functions/class.php"); ?>
<?php 

	function trendyol_brandname_list_item($sorgu){
		
		global $brand_name;
		$brand_name = array();
    	$trendyol_database_list = new Obj();
    	$trendyol_database_list->list($sorgu);
    	if(isset($trendyol_database_list->list)){
				foreach ($trendyol_database_list->list as $trendyol_database_list) {
					$array = json_decode( json_encode($trendyol_database_list), true);
					array_push($brand_name,$array['brand_name']);
					print_r($array['trendyol_item_name']);
					echo '<br>';
				}
			}	
	}

?>