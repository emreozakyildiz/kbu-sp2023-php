<?php include_once("functions/class.php"); ?>
<?php 
	
	function a101_list_item($sorgu){

    	$a101_database_list = new Obj();
    	$a101_database_list->list($sorgu);
    	global $a101_dizi;
    	$a101_dizi = array();
    	if(isset($a101_database_list->list)){
				foreach ($a101_database_list->list as $a101_database_list) {
					$array = json_decode( json_encode($a101_database_list), true);
					array_push($a101_dizi,$array['a101_item_name']);
					//print_r($array['a101_item_name']);
					//echo '<br>';
				}
			}
	}

?>