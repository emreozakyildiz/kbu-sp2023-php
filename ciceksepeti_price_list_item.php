<?php include_once("functions/class.php"); ?>
<?php 
	
	function ciceksepeti_price_list_item($sorgu){

    	$ciceksepeti_database_list = new Obj();
    	$ciceksepeti_database_list->list($sorgu);
    	global $ciceksepeti_price;
    	$ciceksepeti_price = array();
    	if(isset($ciceksepeti_database_list->list)){
				foreach ($ciceksepeti_database_list->list as $ciceksepeti_database_list) {
					$array = json_decode( json_encode($ciceksepeti_database_list), true);
					array_push($ciceksepeti_price,$array['price']);
					//echo 'Çiçeksepeti ürün güncel fiyatı: ';
					//print_r($array['price']);
					//echo '<br>';
				}
			}else{
				echo "Böyle bir ürün bulunamadı";
			}
		//echo '<pre>'; print_r($a101_price);  echo '</pre>';
	}

?>
