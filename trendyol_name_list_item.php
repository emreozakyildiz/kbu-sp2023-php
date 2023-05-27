<?php include_once("functions/class.php"); ?>
<?php 

	function trendyol_name_list_item($sorgu){
		
		global $trendyol_item_name;
		global $trendyol_dizi;
		$trendyol_dizi = array();
		$trendyol_item_name= array();
    	$trendyol_database_list = new Obj();
    	$trendyol_database_list->list($sorgu);
    	if(isset($trendyol_database_list->list)){
				foreach ($trendyol_database_list->list as $trendyol_database_list) {
					$array = json_decode( json_encode($trendyol_database_list), true);
					array_push($trendyol_dizi,$array['name']);
					//array_push($trendyol_item_name,$array['trendyol_item_name']);
					//print_r($array['name']);
					//print_r($array['trendyol_item_name']);
					//echo '<br>';
				}
			}	
		}

?>