<?php 

	function ciceksepeti_get_item($get_url,$get_item_name,$get_item_price,$get_item_evaluation_number){

    	$html = file_get_html($get_url);
    	$items = $html->find('div[class="products__item js-category-item-hover js-product-item-for-countdown js-product-item products__item--featured-xlg"]');
    	$items2 = $html->find('div[class="products__item js-category-item-hover js-product-item-for-countdown js-product-item"]');

    	foreach ($items as $item) {
    		//echo $item->plaintext;

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
				" " => "",
				"." => "",
				"," => ".",
				"TL" => "",
			];
			$price = str_replace(array_keys($price_edits), array_values($price_edits), $price);

			$review = str_replace(["(",")"],"",$review);

			echo ($name) . '<br>';
			echo ($price) . '<br>';
			echo ($review) . '<br>';

    		echo "<br><br>------------------------------------------<br><br>";

    		$object = new Obj();
			$object->ciceksepeti_item_name = $name;
			$object->ciceksepeti_item_price = $price;
			$object->ciceksepeti_item_review = $review;
			$object->create("ciceksepeti_items");
    	}

    	foreach ($items2 as $item) {
    		//echo $item->plaintext;

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
				" " => "",
				"." => "",
				"," => ".",
				"TL" => "",
			];
			$price = str_replace(array_keys($price_edits), array_values($price_edits), $price);

			$review = str_replace(["(",")"],"",$review);

			echo ($name) . '<br>';
			echo ($price) . '<br>';
			echo ($review) . '<br>';

    		echo "<br><br>------------------------------------------<br><br>";

    		$object = new Obj();
			$object->ciceksepeti_item_name = $name;
			$object->ciceksepeti_item_price = $price;
			$object->ciceksepeti_item_review = $review;
			$object->create("ciceksepeti_items");
    	}
	}

?>