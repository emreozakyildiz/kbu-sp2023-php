<?php 

	
	function n11_get_item($key){

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
		
		$url = "https://www.n11.com/arama?q=". $key;
			

		$get_item_name = 'h3[class="productName"]';
		$get_item_price = 'span[class="unitPrice"]';
		$get_item_evaluation_number = 'span[class="cargoBadgeText"]';


    	$html = file_get_html($url);
    	$items = $html->find("li[class='column']");
    	
    	function preg_match_function_n11($site){
			
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

		function unit_number_n11($site){
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


    	foreach ($items as $item) {

    		$temp_html=str_get_html($item->outertext);

			$item_name = $temp_html->find($get_item_name);
			$item_price = $temp_html->find($get_item_price);	
			$item_review = $temp_html->find($get_item_evaluation_number);

			$name = $item_name[0]??"İsim Yok";
			$name = strip_tags($name);
			$price = $item_price[0]??"Fiyat Yok";
			$price = strip_tags($price);
			$review = $item_review[0]??"Değerlendirme Yok";
			$review = strip_tags($review);

			$price_edits = [
				"." => "",
				"," => ".",
			];

			$price = str_replace(array_keys($price_edits), array_values($price_edits), $price);
			$price = doubleval($price);
	

			$birim_fiyat = preg_match_function_n11($name);
			$unit_number = unit_number_n11($name);
			$result = $birim_fiyat * $unit_number;

		
			$market_id = 5;

			if($result!=1){
				echo $name . ' ' .  $price  . '<br>' . ' '.  $result . '<br>';
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
