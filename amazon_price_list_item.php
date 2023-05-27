<?php include_once("functions/class.php"); ?>
<?php 
	
	function amazon_price_list_item($sorgu){

    	$amazon_database_list = new Obj();
    	$amazon_database_list->list($sorgu);
    	global $amazon_price;
    	$amazon_price = array();
    	if(isset($amazon_database_list->list)){
				foreach ($amazon_database_list->list as $amazon_database_list) {
					$array = json_decode( json_encode($amazon_database_list), true);
					array_push($amazon_price,$array['price']);
					//echo 'Amazon ürün güncel fiyatı: ';
					//print_r($array['price']);
					//echo '<br>';
				}
			}else{
				echo "-";
			}

		//echo '<pre>'; print_r($amazon_price);  echo '</pre>';
	}

?>