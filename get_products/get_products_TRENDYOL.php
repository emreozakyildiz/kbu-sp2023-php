
<?php 
	function get_products_TRENDYOL($conn, $key, $products_exist){

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
		
		
		$css_product_name = 'div[class="prdct-desc-cntnr-ttl-w two-line-text"]';
		$css_product_price = 'div[class="prc-box-dscntd"]';

		function unit_trendyol($product_name){
			
			global $unit;
			$birim_fiyat = 1;
			if (preg_match('/\d+(\.\d+)?\s*(g|kg|gram|GRAM|GR|Gr|gr|kilogram|KG|G|Kg|ml|Ml|ML|mL|mililitre|Mililitre|MİLİLİTRE|litre|Litre|LİTRE|lt|LT|l|L|Lt)/', $product_name, $matches) ) {

		 		if (preg_match('/\d+(\.\d+)?\s*(g|G|gram|GRAM|GR|Gr|gr|ml|Ml|ML|mL|mililitre|Mililitre|MİLİLİTRE)/', $product_name, $matches2)) {
		 			$unit = intval($matches2[0]); 
		 		}else{
		 			$unit = intval($matches[0]);

		 			$unit = $unit * 1000;
		 		}
			}
			return $unit;

		}

		function unit_number_trendyol($product_name){
			$unit_number = 1;
			$pattern1 = '/\d+(\.\d+)?\s*(adet|Adet|tane|parça|paket|Paket|PAKET | x |x| x|Tane|TANE|ADET|Parça|Yıkama|yıkama|kullanım|Kullanım| X | X | X|Ad\.|ad\.|lı|li|lu|lü|Yaprak|yaprak|li|lı|lu|lü|Rulo|rulo)/';

			if (preg_match($pattern1, $product_name, $matches))
			{ 
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
			
		$html = file_get_html($url, false, $context);
		$products = $html->find('div[class="p-card-wrppr with-campaign-view add-to-bs-card"]');

		$counter = 0;

		foreach ($products as $product) {
			if ($counter > 9) {
				return;
			}
		
			$temp_html = str_get_html($product->outertext);
		
			$marketid = 4;
			$product_name = $temp_html->find($css_product_name);
			$product_price = $temp_html->find($css_product_price);
		
			$name_edits = [
				"'" => " ",
				"&#x27;" => ""
			];
			$product_name = str_replace(array_keys($name_edits), array_values($name_edits), strip_tags($product_name[0])) ?? "İsim Yok";
			$price_edits = [
				" " => "",
				"." => "",
				"," => ".",
				"TL" => "",
			];
			$product_price = doubleval(str_replace(array_keys($price_edits), array_values($price_edits), $product_price)) ?? 0.00;
		
			$unit = unit_trendyol($product_name);
			$unit_number = unit_number_trendyol($product_name);
		
			$total_unit = $unit * $unit_number;
		
			if ($total_unit == 1) {
				continue;
			}
		
			if (in_array($product_name, $products_exist)) {
				// If it exists, update the product_price
				$query = "UPDATE PRODUCT SET product_price = :product_price WHERE product_name = :product_name";
				$stmt = $conn->prepare($query);
				$stmt->bindValue(':product_name', $product_name);
				$stmt->bindValue(':product_price', $product_price);
				$stmt->execute();
		
				echo "Product updated: " . iconv("UTF-8", "CP857", $product_name) . "\r\n";
			} else {
				$query = "INSERT INTO PRODUCT(marketid, product_name, product_price, product_price1, product_price2, product_price3, product_price4, product_price5, unit_number) VALUES(:marketid, :product_name, :product_price, :product_price1, :product_price2, :product_price3, :product_price4, :product_price5, :total_unit)";
				$stmt = $conn->prepare($query);
		
				$stmt->execute([
					':marketid' => $marketid,
					':product_name' => $product_name,
					':product_price' => $product_price,
					':product_price1' => 0.00,
					':product_price2' => 0.00,
					':product_price3' => 0.00,
					':product_price4' => 0.00,
					':product_price5' => 0.00,
					':total_unit' => $total_unit,
				]);
				$counter++;
				echo "Product added to the database: " . iconv("UTF-8", "CP857", $product_name) . "\r\n";
			}
		}
		
	}
?>