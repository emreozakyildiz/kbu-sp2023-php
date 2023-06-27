<?php 

	function ciceksepeti_get_item($key){

		$translationTable = array(
	    'ı' => 'i',
	    'ç' => 'c',
	    'ğ' => 'g',
	    'ö' => 'o',
	    'ş' => 's',
	    'ü' => 'u',
	    ' ' => '%20'
		);

		$key = strtr($key, $translationTable);
		
		$url = "https://www.ciceksepeti.com/arama?query=". $key . '&qt=' . $key . '&choice=1';

		$get_item_name = 'p[class="products__item-title"]';
		$get_item_price = 'div[class="price price--now"]';
		$get_item_evaluation_number = 'span[class="products-stars__review-count"]';

    	$html = file_get_html($url);
    	$items = $html->find('div[class="products__item js-category-item-hover js-product-item-for-countdown js-product-item products__item--featured-xlg"]');
    	
    	function preg_match_function_ciceksepeti($site){

			$site = str_replace(",","",strtolower($site));
			global $birim_fiyat;
			$birim_fiyat = 1;
			if (preg_match('/\d+(\.\d+)?\s*(g |kg|gram|GRAM|GR |gr|kilogram|KG|G |Kg|ml|Ml|ML|mL|mililitre|Mililitre|MİLİLİTRE|litre|Litre|LİTRE|lt|LT|l |L |Lt)/', $site, $matches) ) {

		 		if (preg_match('/\d+(\.\d+)?\s*(g |G |gram|GRAM|GR|gr|ml|Ml|ML|mL|mililitre|Mililitre|MİLİLİTRE)/', $site, $matches2)) {
		 			$birim_fiyat = intval($matches2[0]); 
		 		}else{
		 			$birim_fiyat = intval($matches[0]);

		 			$birim_fiyat = $birim_fiyat * 1000;
		 		}
			}
			return $birim_fiyat;

		}

		function unit_number_ciceksepeti($site){
			global $unit_number;
			$unit_number = 1;
			$pattern1 = '/\d+(\.\d+)?\s*(adet|Adet|tane|parça|paket|Paket|PAKET | x |x| x|Tane|TANE|ADET|Parça|Yıkama|yıkama|kullanım|Kullanım| X | X | X|Ad\.|ad\.|lı|li|lu|lü|Yaprak|yaprak| li| lı| lu| lü| Li| Lı| Lu| Lü| Lİ| LI| LU| LÜ|Rulo|rulo|’li|’lı|’lü|’lu)/';
			$pattern2 = '/\d+(\.\d+)?\s*(x |x| x|X | X | X)\d+(\.\d+)?/';

			if (preg_match($pattern2, $site, $matches))
			{ 

		 		$string = str_replace([" "],"",strtolower($matches[0]));

		 		$result = explode('x', $string);

		 		$unit_number = intval($result[0]) * intval($result[1]);
		 		// matches[0] = "6x2"
		 		//6,2
		 		//echo 'Adet sayısı: ' . $unit_number . '<br>';
			}
			elseif(preg_match($pattern1, $site, $matches)){
				$matches[0] = str_replace([" "],"",strtolower($matches[0]));

		 		$unit_number = intval($matches[0]);
			}
			return $unit_number;

		}

    	foreach ($items as $item) {
    		//echo $item->plaintext;

    		$temp_html=str_get_html($item->outertext);

			$item_name = $temp_html->find($get_item_name);
			$item_price = $temp_html->find($get_item_price);			
			$item_review = $temp_html->find($get_item_evaluation_number);

			$name = $item_name[0]??"İsim Yok";
			$name = strip_tags($name);
			$name = html_entity_decode($name, ENT_COMPAT | ENT_HTML5, 'UTF-8');
			$price = $item_price[0]??"Fiyat Yok";
			$price = strip_tags($price);
			$review = $item_review[0]??"Değerlendirme Yok";
			$review = strip_tags($review);

			$price_edits = [
				" " => "",
				"." => "",
				"," => ".",
				"TL" => "",
			];
			$price = str_replace(array_keys($price_edits), array_values($price_edits), $price);
			$price = doubleval($price);
			$review = str_replace(["(",")"],"",$review);

			$birim_fiyat = preg_match_function_ciceksepeti($name);
			$unit_number = unit_number_ciceksepeti($name);

			$result = $birim_fiyat * $unit_number;
			echo ($name) . '<br>';
			echo ($price) . '<br>';
			echo ($result) . '<br>';

    		echo "<br><br>------------------------------------------<br><br>";

    		$market_id = 1;
			$null = 0.0;
			if($result != 1){
				$object = new Obj();
				$object->marketid = $market_id;
				$object->product_name = $name;
				$object->product_price = $price;
				$object->product_price1 = $null;			
				$object->product_price2 = $null;
				$object->product_price3 = $null;
				$object->product_price4 = $null;
				$object->product_price5 = $null;
				$object->unit_number = $result;
				//$object->create("product");
			}
    		
    	}

   
    }
	

?>
