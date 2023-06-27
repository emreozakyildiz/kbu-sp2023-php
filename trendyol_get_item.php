<?php 

	
	function trendyol_get_item($key){

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
		

		$url = "https://www.trendyol.com/sr?q=". $key . '&qt=' .$key .'&st='. $key . '&os=1';
		

		$get_item_name = 'div[class="prdct-desc-cntnr-ttl-w two-line-text"]';
		$get_item_price = 'div[class="prc-box-dscntd"]';
		$get_item_evaluation_number = 'span[class="ratingCount"]';

    	$html = file_get_html($url);
    	$items = $html->find('div[class="p-card-wrppr with-campaign-view add-to-bs-card"]');

    	function preg_match_function_trendyol($site){
			
			global $birim_fiyat;
			$birim_fiyat = 1;
			if (preg_match('/\d+(\.\d+)?\s*(g|kg|gram|GRAM|GR|Gr|gr|kilogram|KG|G|Kg|ml|Ml|ML|mL|mililitre|Mililitre|MİLİLİTRE|litre|Litre|LİTRE|lt|LT|l |L |Lt)/', $site, $matches) ) {

		 		if (preg_match('/\d+(\.\d+)?\s*(g|G|Gr|gram|GRAM|GR|gr|ml|Ml|ML|mL|mililitre|Mililitre|MİLİLİTRE)/', $site, $matches2)) {
		 			$birim_fiyat = intval($matches2[0]); 
		 		}else{
		 			$birim_fiyat = intval($matches[0]);

		 			$birim_fiyat = $birim_fiyat * 1000;
		 		}
			}
			return $birim_fiyat;

		}

		function unit_number_trendyol($site){
			global $unit_number;
			$unit_number = 1;
			$pattern1 = '/\d+(\.\d+)?\s*(adet|Adet|tane|parça|paket|Paket|PAKET | x |x| x|Tane|TANE|ADET|Parça|Yıkama|yıkama|kullanım|Kullanım| X | X | X|Ad\.|ad\.|lı|li|lu|lü|Yaprak|yaprak| li| lı| lu| lü| Li| Lı| Lu| Lü| Lİ| LI| LU| LÜ|Rulo|rulo|’li|’lı|’lü|’lu)/';
			$pattern2 = '/\d+(\.\d+)?\s*(x |x| x|X | X | X)\d+(\.\d+)?/';

			if (preg_match($pattern2, $site, $matches))
			{ 
		 		global $unit_number;

		 		$string = str_replace([" "],"",strtolower($matches[0]));

		 		$result = explode('x', $string);

		 		$unit_number = intval($result[0]) * intval($result[1]);
		 		// matches[0] = "6x2"
		 		//6,2
		 		//echo 'Adet sayısı: ' . $unit_number . '<br>';
			}
			elseif(preg_match($pattern1, $site, $matches)){
				global $unit_number;
		 		$unit_number = intval($matches[0]);
		 		//echo 'Adet sayısı: ' . $unit_number . '<br>';
			}
			return $unit_number;

		}

    	foreach ($items as $item) {

    		
    		$temp_html=str_get_html($item->outertext);

			/*$element = $temp_html->getElementsByTagName('a');
			$value = $element->getAttribute('href');
			$value = 'https://www.trendyol.com' . $value;*/

			//$category = file_get_html($value); 
			//$category_item = $category->find('a[class="product-detail-breadcrumb-item"]');
			
			//$json_value = strrev($value);
			//$json_value = strstr($json_value, '-', true); 

			//$json_value = strrev($json_value);

			//$json_string = 'https://public-mdc.trendyol.com/discovery-web-socialgw-service/api/review/'.$json_value .'?storefrontId=1&culture=tr-TR&pageSize=50&page=0';
			
			// Ürünlerin yorumları için tekrardan sorgu atılacak
			//$json = file_get_html($json_string);  
    		
    		//$json = json_decode($json,JSON_PRETTY_PRINT);
    		//$array = $json["result"]["productReviews"]["content"];
    	    		  
			$item_name = $temp_html->find($get_item_name);
			$item_price = $temp_html->find($get_item_price);	
			$item_review = $temp_html->find($get_item_evaluation_number);		


			$name = $item_name[0]??"0";
			$name = strip_tags($name);
			$price = $item_price[0]??"0";
			$price = strip_tags($price);
			$review = $item_review[0]??"0";
			$review = strip_tags($review);
			$category= $category_item[2]??"0";
			$category = strip_tags($category);
			
			$price_edits = [
				"." => "",
				"," => ".",
				"TL" => ""
			];

			$piece_edits = [
				" " => "",
				"." => "",
				"," => ".",
			];

			$name_edits = [
				"'" => " "
			];

			$price = str_replace(array_keys($price_edits), array_values($price_edits), $price);
			$price = doubleval($price);
			

			$name = str_replace(array_keys($name_edits), array_values($name_edits), $name);
			$name = str_replace("&#x27;", "", $name);

			$review = str_replace(["(",")"],"",$review);

			$birim_fiyat = preg_match_function_trendyol($name);
			$unit_number = unit_number_trendyol($name);

			$result = $birim_fiyat * $unit_number;

			if($result!=1){
				echo $name . ' ' .  $price  . '<br>' . ' '.  $result .  '<br>';
			}
			else {
				echo "HATALI";
				echo $name . ' ' .  $price  . '<br>' . ' '.  $result .  '<br>';
			}
			
			//echo 'Ürün Adı: ' . ($brand_name) . ' ' .  ($name) . '<br>';
			//echo 'Ürün Fiyatı: ' . ($price) . '<br>';
			//echo 'Ürün Adet Fiyatı: ' . ($piece) . '<br>';
			//echo 'Ürün Değerlendirme Sayısı: ' . ($review) . '<br>';
			//echo 'Ürün Hızlı Teslimat Özelliği: ' .($quick_delivery). '<br>';
			//echo 'Ürün Kargo Bedava Özelliği: ' . ($free_cargo) . '<br>';
			//echo 'Ürün Bugün Kargoda Özelliği: ' . ($today_cargo) . '<br>';
			//echo 'Ürün Son 30 Günün En Düşük Fiyatında mı?: ' . ($lowest_price) . '<br>';
			//echo 'Ürünün Birlikte Al Kazan Kampanyası Var mı: ' . ($win_together) . '<br>';
			//echo 'Ürünün Çok Al Az Öde Kampanyası Var mı: ' . ($buy_more_pay_less) . '<br>';
			//echo 'Ürünün Kupon Kampanyası Var mı: ' . ($coupon_info) . '<br>';
			//echo 'Ürün Linki: ' . ($value) . '<br>';
			//print("<pre>".print_r($json,true)."</pre>");
    		
    		echo "<br>------------------------------------------<br>";
 

			$market_id = 4;
			$null = 0.0;
			if($result!=1){
				$object = new Obj();
				$object->marketid = $market_id;
				$object->product_name =  $name;
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
