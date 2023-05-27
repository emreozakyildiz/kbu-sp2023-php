<?php include_once("functions/class.php"); ?>
<?php 
	
	function n11_name_list_item($sorgu){

    	$n11_database_list = new Obj();
    	$n11_database_list->list($sorgu);
    	global $n11_dizi;
    	$n11_dizi = array();
    	if(isset($n11_database_list->list)){
				foreach ($n11_database_list->list as $n11_database_list) {
					$array = json_decode( json_encode($n11_database_list), true);
					array_push($n11_dizi,$array['name']);
					//print_r($array['name']);
					//echo '<br>';
				}
			}
	}

?>