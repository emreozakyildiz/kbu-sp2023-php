<?php include_once("functions/class.php"); ?>
<?php 
	
	function n11_price_list_item($sorgu){

    	$n11_database_list = new Obj();
    	$n11_database_list->list($sorgu);
    	global $n11_price;
    	$n11_price = array();
    	if(isset($n11_database_list->list)){
				foreach ($n11_database_list->list as $n11_database_list) {
					$array = json_decode( json_encode($n11_database_list), true);
					array_push($n11_price,$array['price']);
					//echo 'N11 ürün güncel fiyatı: ';
					//print_r($array['price']);
					//echo '<br>';
				}
			}else{
				echo "Böyle bir ürün bulunamadı" . '<br>' . '<br>';
			}
		//echo '<pre>'; print_r($a101_price);  echo '</pre>';
	}

?>
