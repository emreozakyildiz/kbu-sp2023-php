<?php include_once("functions/class.php"); ?>
<?php 
	
	function matching_product_list_item($sorgu){

    	$match_database_list = new Obj();
    	$match_database_list->list($sorgu);
    	global $match_dizi;
    	$match_dizi = array();
    	global $match_dizi_second;
    	$match_dizi_second = array();
    	global $tables_first;
    	global $tables_second;
    	$tables_first = array();
    	$tables_second = array();
    	if(isset($match_database_list->list)){
				foreach ($match_database_list->list as $match_database_list) {
					$array = json_decode( json_encode($match_database_list), true);
					array_push($match_dizi,$array['first_item']);
					array_push($tables_first,$array['first_item_tables']);
					array_push($match_dizi_second,$array['second_item']);
					array_push($tables_second,$array['second_item_tables']);
					//print_r($array['first_item']);
					//print_r($array['first_item_tables']);
					//echo ' - ';
					//print_r($array['second_item']);
					//print_r($array['second_item_tables']);
					//echo '<br>';
				}
		}
}

?>