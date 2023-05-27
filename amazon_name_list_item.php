<?php include_once("functions/class.php"); ?>
<?php 

	function amazon_name_list_item($sorgu){
		
		global $amazon_dizi;
		$amazon_dizi = array();
		//global $amazon_item_name;
		//$amazon_item_name= array();
    	$amazon_database_list = new Obj();
    	$amazon_database_list->list($sorgu);
    	if(isset($amazon_database_list->list)){
				foreach ($amazon_database_list->list as $amazon_database_list) {
					$array = json_decode( json_encode($amazon_database_list), true);
					array_push($amazon_dizi,$array['name']);
					//array_push($amazon_item_name,$array['amazon_item_name']);
					//print_r($array['name']);
					//echo '<br>';
				}
			}
	}

?>