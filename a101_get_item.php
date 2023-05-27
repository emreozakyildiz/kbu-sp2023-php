<?php include_once("functions/class.php"); ?>
<?php 
	
	function a101_get_item($get_url,$get_item_name,$get_item_price,$get_options){

		$context = stream_context_create(
   			 array(
       			 "http" => array(
    			        "header" => "User-Agent: Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like 			Gecko) Chrome/50.0.2661.102 Safari/537.36"
        			)
    			)
		);

		
    	$html = file_get_html($get_url,false,$context);
    	$items = $html->find("[class='col-md-4 col-sm-6 col-xs-6 set-product-item']");

    	foreach ($items as $item) {

    		$temp_html=str_get_html($item->outertext);

			$item_name = $temp_html->find($get_item_name);
			$item_price = $temp_html->find($get_item_price);			
			$item_options = $temp_html->find($get_options);

			$name = $item_name[0]??"İsim Yok";
			$name = strip_tags($name);
			$price = $item_price[0]??"Fiyat Yok";
			$price = strip_tags($price);
			$options = $item_options[0]??"Bilgi Yok";
			$options = strip_tags($options);


			$price_edits = [
				"." => "",
				"," => ".",
				"₺" => "",
			];
			$price = str_replace(array_keys($price_edits), array_values($price_edits), $price);


			/*echo 'Ürün Adı: ' . ($name) . '<br>';
			echo 'Ürün Fiyatı: ' . ($price) . '<br>';
			echo 'Ürün Satın Alma Seçenekleri: ' . ($options) . '<br>';

    		echo "<br><br>------------------------------------------<br><br>";*/

    		$a101_database_list = new Obj();

    		$a101_database_list->list("select a101_item_name from a101_items where a101_item_name LIKE '%Sensodyne%'");

			if(isset($a101_database_list->list)){
				foreach ($a101_database_list->list as $a101_database_list) {
					$array = json_decode( json_encode($a101_database_list), true);
					//print_r($array['a101_item_name']) .'<br>';
					//echo '<br>';
				}
			}else{
				echo "Böyle bir ürün bulunamadı" . '<br>';
			}

    		$object = new Obj();
			$object->a101_item_name = $name;
			$object->a101_item_price = $price;
			$object->a101_item_options = $options;
			$object->create("a101_items");
    	}
		
	}

?>