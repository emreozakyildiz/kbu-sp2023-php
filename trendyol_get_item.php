<?php 

	
	function trendyol_get_item($get_url,$get_item_brand_name,$get_item_name,$get_item_price,$get_item_evaluation_number,$get_piece,$get_quick_delivery,$get_free_cargo,$get_delivery_today,$get_lowest_price_info,$get_birlikte_al_kazan,$get_cok_al_az_ode,$get_coupon_info){

    	$html = file_get_html($get_url);
    	$items = $html->find('div[class="p-card-wrppr with-campaign-view add-to-bs-card"]');

    	foreach ($items as $item) {

    		$temp_html=str_get_html($item->outertext);

			$element = $temp_html->getElementsByTagName('a');
			$value = $element->getAttribute('href');
			$value = 'https://www.trendyol.com' . $value;

			
			$json_value = strrev($value);
			$json_value = strstr($json_value, '-', true); 
//
			$json_value = strrev($json_value);

			//$json_string = 'https://public-mdc.trendyol.com/discovery-web-socialgw-service/api/review/'.$json_value .'?storefrontId=1&culture=tr-TR&pageSize=50&page=0';
			
			// Ürünlerin yorumları için tekrardan sorgu atılacak
			//$json = file_get_html($json_string);  
    		
    		//$json = json_decode($json,JSON_PRETTY_PRINT);
    		//$array = $json["result"]["productReviews"]["content"];
    	    		  
    		$item_brand_name = $temp_html->find($get_item_brand_name);
			$item_name = $temp_html->find($get_item_name);
			$item_price = $temp_html->find($get_item_price);	
			$item_piece = $temp_html->find($get_piece);		
			$item_review = $temp_html->find($get_item_evaluation_number);
			$item_quick_delivery = $temp_html->find($get_quick_delivery);
			$item_free_cargo = $temp_html->find($get_free_cargo);
			$item_today_cargo = $temp_html->find($get_delivery_today);			
			$item_lowest_price_info = $temp_html->find($get_lowest_price_info);			
			$item_birlikte_al_kazan = $temp_html->find($get_birlikte_al_kazan);			
			$item_cok_al_az_ode = $temp_html->find($get_cok_al_az_ode);			
			$item_coupon_info= $temp_html->find($get_coupon_info);			
						

			$brand_name = $item_brand_name[0]??"0";
			$brand_name = strip_tags($brand_name);
			$name = $item_name[0]??"0";
			$name = strip_tags($name);
			$price = $item_price[0]??"0";
			$price = strip_tags($price);
			$piece = $item_piece[0]??"0";
			$piece = strip_tags($piece);
			$review = $item_review[0]??"0";
			$review = strip_tags($review);
			$quick_delivery = isset($item_quick_delivery[0])? "1" : "0";
			$quick_delivery = strip_tags($quick_delivery);
			$free_cargo = isset($item_free_cargo[0])? "1" : "0";
			$free_cargo = strip_tags($free_cargo);
			$today_cargo = isset($item_today_cargo[0])? "1" : "0";
			$today_cargo = strip_tags($today_cargo);
			$lowest_price = isset($item_lowest_price_info[0])? "1" : "0";
			$lowest_price = strip_tags($lowest_price);
			$win_together= isset($item_birlikte_al_kazan[0])? "1" : "0";
			$win_together = strip_tags($win_together);
			$buy_more_pay_less= isset($item_cok_al_az_ode[0])? "1" : "0";
			$buy_more_pay_less = strip_tags($buy_more_pay_less);
			$coupon_info= isset($item_coupon_info[0])? "1" : "0";
			$coupon_info = strip_tags($coupon_info);

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
			$piece = str_replace(array_keys($piece_edits), array_values($piece_edits), $piece);
			$name = str_replace(array_keys($name_edits), array_values($name_edits), $name);

			$review = str_replace(["(",")"],"",$review);

			echo 'Ürün Adı: ' . ($brand_name) . ' ' .  ($name) . '<br>';
			echo 'Ürün Fiyatı: ' . ($price) . '<br>';
			echo 'Ürün Adet Fiyatı: ' . ($piece) . '<br>';
			echo 'Ürün Değerlendirme Sayısı: ' . ($review) . '<br>';
			echo 'Ürün Hızlı Teslimat Özelliği: ' .($quick_delivery). '<br>';
			echo 'Ürün Kargo Bedava Özelliği: ' . ($free_cargo) . '<br>';
			echo 'Ürün Bugün Kargoda Özelliği: ' . ($today_cargo) . '<br>';
			echo 'Ürün Son 30 Günün En Düşük Fiyatında mı?: ' . ($lowest_price) . '<br>';
			echo 'Ürünün Birlikte Al Kazan Kampanyası Var mı: ' . ($win_together) . '<br>';
			echo 'Ürünün Çok Al Az Öde Kampanyası Var mı: ' . ($buy_more_pay_less) . '<br>';
			echo 'Ürünün Kupon Kampanyası Var mı: ' . ($coupon_info) . '<br>';
			//echo 'Ürün Linki: ' . ($value) . '<br>';
			//print("<pre>".print_r($json,true)."</pre>");
    		
    		echo "<br>------------------------------------------<br>";
    		
			$object = new Obj();
			$object->trendyol_item_brand_name = $brand_name;
			$object->trendyol_item_name = $name;
			$object->trendyol_item_price = $price;
			$object->trendyol_item_piece_price = $piece;
			$object->trendyol_item_review = $review;
			$object->trendyol_item_quick_delivery = $quick_delivery;
			$object->trendyol_item_free_cargo = $free_cargo;
			$object->trendyol_item_today_cargo = $today_cargo;
			$object->trendyol_item_lowest_price = $lowest_price;
			$object->trendyol_item_win_together = $win_together;
			$object->trendyol_item_buy_more_pay_less = $buy_more_pay_less;
			$object->trendyol_item_coupon_info = $coupon_info;
			$object->create("trendyol_items");
	}
}
?>