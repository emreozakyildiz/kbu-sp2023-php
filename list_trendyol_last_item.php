<?php include_once("functions/class.php"); ?>
<?php 
	
	function list_trendyol_last_item($sorgu){

    	$match_database_list = new Obj();
    	$match_database_list->list($sorgu);
    	global $trendyol_product2;
    	global $amazon_product2;
    	global $n11_product2;
    	global $ciceksepeti_product2;
    	global $a101_product2;

    	$trendyol_product2 = array();
    	$amazon_product2 = array();
    	$n11_product2 = array();
    	$ciceksepeti_product2 = array();
    	$a101_product2 = array();
    	
    	if(isset($match_database_list->list)){
				foreach ($match_database_list->list as $match_database_list) {
					$array = json_decode( json_encode($match_database_list), true);
					array_push($amazon_product2,$array['amazon_product']);
					array_push($trendyol_product2,$array['trendyol_product']);
					array_push($n11_product2,$array['n11_product']);
					array_push($ciceksepeti_product2,$array['ciceksepeti_product']);
					array_push($a101_product2,$array['a101_product']);
					print_r($array['trendyol_product']);
					echo ' | ';
					print_r($array['amazon_product']);
					echo ' | ';
					print_r($array['n11_product']);
					echo ' | ';
					print_r($array['ciceksepeti_product']);
					echo ' | ';
					echo '<br>';
				}
		}
}

?>