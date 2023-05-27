<?php include_once("functions/class.php"); ?>
<?php 
	
	function list_last_item($sorgu){

    	$match_database_list = new Obj();
    	$match_database_list->list($sorgu);
    	global $a101_product;
    	global $trendyol_product;
    	global $amazon_product;
    	global $n11_product;
    	global $ciceksepeti_product;

    	$a101_product = array();
    	$trendyol_product = array();
    	$amazon_product = array();
    	$n11_product = array();
    	$ciceksepeti_product = array();
    	
    	if(isset($match_database_list->list)){
				foreach ($match_database_list->list as $match_database_list) {
					$array = json_decode( json_encode($match_database_list), true);
					array_push($a101_product,$array['a101_product']);
					array_push($amazon_product,$array['amazon_product']);
					array_push($trendyol_product,$array['trendyol_product']);
					array_push($n11_product,$array['n11_product']);
					array_push($ciceksepeti_product,$array['ciceksepeti_product']);
					//print_r($array['a101_product']);
					//echo ' | ';
					//print_r($array['trendyol_product']);
					//echo ' | ';
					//print_r($array['amazon_product']);
					//echo ' | ';
					//print_r($array['n11_product']);
					//echo ' | ';
					//print_r($array['ciceksepeti_product']);
					//echo ' | ';
					//echo '<br>';
				}
		}
}

?>