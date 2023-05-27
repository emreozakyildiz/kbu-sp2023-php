<?php include_once("functions/class.php"); ?>
<?php 

	function trendyol_price_list_item($sorgu){
		
		global $trendyol_price;
		$trendyol_price = array();
    	$trendyol_database_list = new Obj();
    	$trendyol_database_list->list($sorgu);
    	if(isset($trendyol_database_list->list)){
				foreach ($trendyol_database_list->list as $trendyol_database_list) {
					$array = json_decode( json_encode($trendyol_database_list), true);
					array_push($trendyol_price,$array['price']);
					//echo 'Trendyol ürün güncel fiyatı: ';
					//print_r($array['price']);
					//echo '<br>';
				}
			}else{
				echo "Böyle bir ürün bulunamadı";
			}
		
	}
