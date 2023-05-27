<?php include_once("functions/class.php"); ?>
<?php 
	
	function a101_price_list_item($sorgu){

    	$a101_database_list = new Obj();
    	$a101_database_list->list($sorgu);
    	global $a101_price;
    	$a101_price = array();
    	if(isset($a101_database_list->list)){
				foreach ($a101_database_list->list as $a101_database_list) {
					$array = json_decode( json_encode($a101_database_list), true);
					array_push($a101_price,$array['price']);
					//echo 'A101 ürün güncel fiyatı: ';
					//print_r($array['price']);
					//echo '<br>';
				}
			}else{
				echo "Böyle bir ürün bulunamadı";
			}
	}

?>