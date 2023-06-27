<?php include_once("functions/class.php"); ?>
<?php 
	
	function a101_get_item($key, $a101_items){

		$translationTable = array(
	    'ı' => 'i',
	    'ç' => 'c',
	    'ğ' => 'g',
	    'ö' => 'o',
	    'ş' => 's',
	    'ü' => 'u',
	    ' ' => '+'
		);

		$key = strtr($key, $translationTable);
		$url = "https://www.a101.com.tr/list/?search_text=". $key;
		
		
		$get_item_name = 'h3[class="name"]';
		$get_item_price = 'span[class="current"]';

		function preg_match_function_a101($site){
			
			global $birim_fiyat;
			$birim_fiyat = 1;
			if (preg_match('/\d+(\.\d+)?\s*(g|kg|gram|GRAM|GR|Gr|gr|kilogram|KG|G|Kg|ml|Ml|ML|mL|mililitre|Mililitre|MİLİLİTRE|litre|Litre|LİTRE|lt|LT|l|L|Lt)/', $site, $matches) ) {

		 		if (preg_match('/\d+(\.\d+)?\s*(g|G|gram|GRAM|GR|Gr|gr|ml|Ml|ML|mL|mililitre|Mililitre|MİLİLİTRE)/', $site, $matches2)) {
		 			$birim_fiyat = intval($matches2[0]); 
		 		}else{
		 			$birim_fiyat = intval($matches[0]);

		 			$birim_fiyat = $birim_fiyat * 1000;
		 		}
			}
			return $birim_fiyat;

		}

		function unit_number_a101($site){
			global $unit_number;
			$unit_number = 1;
			$pattern1 = '/\d+(\.\d+)?\s*(adet|Adet|tane|parça|paket|Paket|PAKET | x |x| x|Tane|TANE|ADET|Parça|Yıkama|yıkama|kullanım|Kullanım| X | X | X|Ad\.|ad\.|lı|li|lu|lü|Yaprak|yaprak|li|lı|lu|lü|Rulo|rulo)/';

			if (preg_match($pattern1, $site, $matches))
			{ 
		 		global $unit_number;
		 		$unit_number = intval($matches[0]);
		 		//echo 'Adet sayısı: ' . $unit_number . '<br>';
			}
			return $unit_number;

		}

			$context = stream_context_create(
	   			 array(
	       			 "http" => array(
	    			        "header" => "User-Agent: Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like 			Gecko) Chrome/50.0.2661.102 Safari/537.36"
	        			)
	    			)
			);

			
	    	$html = file_get_html($url,false,$context);
	    	$items = $html->find("[class='col-md-4 col-sm-6 col-xs-6 set-product-item']");

	    	$counter = 0;

	    	foreach ($items as $item) {

	    		
	    		if($counter > 9){
	    			return;
	    		}
	    		$counter ++;
	    		$temp_html=str_get_html($item->outertext);

				$item_name = $temp_html->find($get_item_name);
				$item_price = $temp_html->find($get_item_price);			
				
				$name = $item_name[0]??"İsim Yok";
				$name = strip_tags($name);
				$name = trim($name);
				$price = $item_price[0]??"Fiyat Yok";
				$price = strip_tags($price);


				$price_edits = [
					"." => "",
					"," => ".",
					"₺" => "",
				];
				$price = str_replace(array_keys($price_edits), array_values($price_edits), $price);

				
				$birim_fiyat = preg_match_function_a101($name);
				$unit_number = unit_number_a101($name);

				$result = $birim_fiyat * $unit_number;

				$market_id = 3;

				echo $name . ' ' .  $price. ' '.  $result . '<br>';

				if($result!=1){
					foreach($a101_items as $a101_item){
						echo 'Name: ' . $name . '<br>';
						echo 'A101: ' . $a101_item. '<br>';
						if($name == $a101_item){
							echo 'Aynı ürün var';
							$object = new Obj();
							$object->marketid = $market_id;
							$object->product_name = $name;
							$object->product_price = $price;
							$object->product_price1 = 0;
							$object->product_price2 = 0;
							$object->product_price3 = 0;
							$object->product_price4 = 0;
							$object->product_price5 = 0;
							$object->unit_number = $result;
							$object->update("product");
							return;

						}else{
							echo 'Farklı ürünler';
						}
					}
					$object = new Obj();
					$object->marketid = $market_id;
					$object->product_name = $name;
					$object->product_price = $price;
					$object->product_price1 = 0;
					$object->product_price2 = 0;
					$object->product_price3 = 0;
					$object->product_price4 = 0;
					$object->product_price5 = 0;
					$object->unit_number = $result;
					//$object->create("product");
				}
	    		
	    	}
		
	}

?>
