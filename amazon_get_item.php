<?php 

	
	function amazon_get_item($get_url,$get_item_name,$get_item_price,$get_piece,$get_item_evaluation_number,$get_discount_info,$get_item_delivery_info,$get_item_options){


    	$html = file_get_html($get_url);
    	$items = $html->find("[data-component-type='s-search-result']");

    	foreach ($items as $item) {

    		$temp_html=str_get_html($item->outertext);

			$item_name = $temp_html->find($get_item_name);			
			$item_price = $temp_html->find($get_item_price);						
			$item_piece = $temp_html->find($get_piece);					
			$item_review = $temp_html->find($get_item_evaluation_number);			
			$item_discount_info = $temp_html->find($get_discount_info);			
			$item_delivery_info = $temp_html->find($get_item_delivery_info);			
			$item_options = $temp_html->find($get_item_options);

			$name = $item_name[0]??"İsim Yok";
			$name = strip_tags($name);
			$price = $item_price[0]??"Fiyat Yok";
			$price = strip_tags($price);
			$piece =$item_piece[0]??"Adet Fiyatı Yok";
			$piece = strip_tags($piece);	
			$review = $item_review[0]??"Değerlendirme Yok";
			$review = strip_tags($review);
			$discount_info = isset($item_discount_info[0]) ? "1" : "0";
			$discount_info = strip_tags($discount_info);
			$delivery_info = isset($item_delivery_info[0]) ? "1" : "0";
			$delivery_info = strip_tags($delivery_info);
			$options = isset($item_options[0]) ? "1" : "0";
			$options = strip_tags($options);

			$price_edits = [
				"." => "",
				"," => ".",
			];

			$price = str_replace(array_keys($price_edits), array_values($price_edits), $price);

			$review = str_replace(["(",")"],"",$review);

			echo 'Ürün Adı: ' .  ($name) . '<br>';
			echo 'Ürün Fiyatı: ' . ($price) . '<br>';
			echo 'Ürün Adet Fiyatı: ' . ($piece) . '<br>';
			echo 'Ürün Değerlendirme Sayısı: ' .($review) . '<br>';
			echo 'Ürün İndirim Var Mı?: ' . ($discount_info) . '<br>';
			echo 'Ürün Kargo Bilgisi Var Mı?: ' . ($delivery_info) . '<br>';
			echo 'Ürün Seçenekleri Var Mı?: ' .($options) . '<br>';

    		echo "<br><br>------------------------------------------<br><br>";

    		$object = new Obj();
			$object->amazon_item_name = $name;
			$object->amazon_item_price = $price;
			$object->amazon_item_piece = $piece;
			$object->amazon_item_review = $review;
			$object->amazon_discount_info= $discount_info;
			$object->amazon_delivery_info = $delivery_info;
			$object->amazon_item_options = $options;
			$object->create("amazon_items");
    	}

 	}

?>