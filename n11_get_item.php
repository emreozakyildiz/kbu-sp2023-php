<?php 

	
	function n11_get_item($get_url,$get_item_name,$get_item_price,$get_piece,$get_item_evaluation_number,$get_item_delivery_info){

    	$html = file_get_html($get_url);
    	$items = $html->find("li[class='column']");

    	foreach ($items as $item) {

    		$temp_html=str_get_html($item->outertext);

			$item_name = $temp_html->find($get_item_name);
			$item_price = $temp_html->find($get_item_price);			
			$item_piece = $temp_html->find($get_piece);			
			$item_review = $temp_html->find($get_item_evaluation_number);
			$item_delivery_info = $temp_html->find($get_item_delivery_info);

			$name = $item_name[0]??"İsim Yok";
			$name = strip_tags($name);
			$price = $item_price[0]??"Fiyat Yok";
			$price = strip_tags($price);
			$piece = $item_piece[0]??"Adet Fiyatı Yok";
			$piece = strip_tags($piece);
			$review = $item_review[0]??"Değerlendirme Yok";
			$review = strip_tags($review);
			$delivery_info = $item_delivery_info[0]??"Kargo Bilgisi Yok";
			$delivery_info = strip_tags($delivery_info);

			$price_edits = [
				"." => "",
				"," => ".",
			];

			$price = str_replace(array_keys($price_edits), array_values($price_edits), $price);
			$review = str_replace(["(",")"],"",$review);

			/*echo ($name) . '<br>';
			echo ($price) . '<br>';
			echo ($piece) . '<br>';
			echo ($review) . '<br>';
			echo ($delivery_info) . '<br>';

    		echo "<br><br>------------------------------------------<br><br>";*/

    		$object = new Obj();
			$object->n11_item_name = $name;
			$object->n11_item_price = $price;
			$object->n11_item_piece = $piece;
			$object->n11_item_review = $review;
			$object->n11_item_delivery = $delivery_info;
			$object->create("n11_items");
    	}
 	}

?>