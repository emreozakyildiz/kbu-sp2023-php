<?php include_once("functions/class.php"); ?>
<?php include("functions/query_yayla.php"); ?>

<?php

	// YAYLA PİRİNÇ ÜRÜNÜ A101-TRENDYOL BENZERLİK KARŞILAŞTIRMASI - GÜNCEL FİYAT GÖSTERİMİ //
	// echo 'YAYLA PİRİNÇ ÜRÜNÜ A101-TRENDYOL BENZERLİK KARŞILAŞTIRMASI - GÜNCEL FİYAT GÖSTERİMİ'. '<br>'. '<br>';
	a101_trendyol($a101_dizi,$trendyol_dizi,$trendyol_item_name);
	
	// YAYLA PİRİNÇ ÜRÜNÜ A101-AMAZON BENZERLİK KARŞILAŞTIRMASI - GÜNCEL FİYAT GÖSTERİMİ //
	// echo 'YAYLA PİRİNÇ ÜRÜNÜ A101-AMAZON BENZERLİK KARŞILAŞTIRMASI - GÜNCEL FİYAT GÖSTERİMİ'. '<br>'. '<br>';
	// a101_amazon($a101_dizi,$amazon_dizi);

	// YAYLA PİRİNÇ ÜRÜNÜ A101-N11 BENZERLİK KARŞILAŞTIRMASI - GÜNCEL FİYAT GÖSTERİMİ //
	// echo 'YAYLA PİRİNÇ ÜRÜNÜ A101-N11 BENZERLİK KARŞILAŞTIRMASI - GÜNCEL FİYAT GÖSTERİMİ'. '<br>'. '<br>';
	// a101_n11($a101_dizi,$n11_dizi);
	
	// YAYLA PİRİNÇ ÜRÜNÜ A101-CİCEKSEPETİ BENZERLİK KARŞILAŞTIRMASI - GÜNCEL FİYAT GÖSTERİMİ //
	// echo 'YAYLA PİRİNÇ ÜRÜNÜ A101-CİCEKSEPETİ BENZERLİK KARŞILAŞTIRMASI - GÜNCEL FİYAT GÖSTERİMİ'. '<br>'. '<br>';
	// a101_ciceksepeti($a101_dizi,$ciceksepeti_dizi);

	/*
	$a101_all_items = array();
	$a101_all_items = array_merge($a101_item4,$a101_all_items);
	$a101_all_items = array_merge($a101_item3,$a101_all_items);
	$a101_all_items = array_merge($a101_item2,$a101_all_items);
	$a101_all_items = array_merge($a101_item,$a101_all_items);

	$other_all_items = array();
	$other_all_items = array_merge($ciceksepeti_item,$other_all_items);
	$other_all_items = array_merge($n11_item,$other_all_items);
	$other_all_items = array_merge($amazon_item,$other_all_items);
	$other_all_items = array_merge($trendyol_item,$other_all_items);

	$all_tables = array();
	$all_tables = array_merge($table_ciceksepeti,$all_tables);
	$all_tables = array_merge($table_n11,$all_tables);
	$all_tables = array_merge($table_amazon,$all_tables);
	$all_tables = array_merge($table_trendyol,$all_tables);

	for ($i=0; $i < sizeof($a101_all_items) ; $i++) {
		$first_item = $a101_all_items[$i]; 
		$second_item = $other_all_items[$i]; 
		$tables = $all_tables[$i]; 
		$object = new Obj;
		$object->first_item = $first_item;
		$object->first_item_tables = 'a101_items';
		$object->second_item = $second_item;
		$object->second_item_tables = $tables;
		//$object->create("match_products");
	}
	*/

	// YAYLA PİRİNÇ ÜRÜNÜ TRENDYOL-AMAZON BENZERLİK KARŞILAŞTIRMASI - GÜNCEL FİYAT GÖSTERİMİ //
	//echo 'YAYLA PİRİNÇ ÜRÜNÜ TRENDYOL-AMAZON BENZERLİK KARŞILAŞTIRMASI - GÜNCEL FİYAT GÖSTERİMİ'. '<br>'. '<br>';
	//trendyol_amazon($trendyol_dizi,$amazon_dizi,$trendyol_item_name);
	
	// YAYLA PİRİNÇ ÜRÜNÜ TRENDYOL-N11 BENZERLİK KARŞILAŞTIRMASI - GÜNCEL FİYAT GÖSTERİMİ //
	//echo 'YAYLA PİRİNÇ ÜRÜNÜ TRENDYOL-N11 BENZERLİK KARŞILAŞTIRMASI - GÜNCEL FİYAT GÖSTERİMİ'. '<br>'. '<br>';
	//trendyol_n11($trendyol_dizi,$n11_dizi,$trendyol_item_name);

	// YAYLA PİRİNÇ ÜRÜNÜ TRENDYOL-CİCEKSEPETİ BENZERLİK KARŞILAŞTIRMASI - GÜNCEL FİYAT GÖSTERİMİ //
	//echo 'YAYLA PİRİNÇ ÜRÜNÜ TRENDYOL-CİCEKSEPETİ BENZERLİK KARŞILAŞTIRMASI - GÜNCEL FİYAT GÖSTERİMİ'. '<br>'. '<br>';
	//trendyol_ciceksepeti($trendyol_dizi,$ciceksepeti_dizi,$trendyol_item_name);
	/*
	$trendyol_all_items = array();
	$trendyol_all_items = array_merge($trendyol_item4,$trendyol_all_items);
	$trendyol_all_items = array_merge($trendyol_item3,$trendyol_all_items);
	$trendyol_all_items = array_merge($trendyol_item2,$trendyol_all_items);
	
	$other_all_items2 = array();
	$other_all_items2 = array_merge($ciceksepeti_item2,$other_all_items2);
	$other_all_items2 = array_merge($n11_item2,$other_all_items2);
	$other_all_items2 = array_merge($amazon_item2,$other_all_items2);

	$all_tables = array();
	$all_tables = array_merge($table_ciceksepeti,$all_tables);
	$all_tables = array_merge($table_n11,$all_tables);
	$all_tables = array_merge($table_amazon,$all_tables);

	for ($i=0; $i < sizeof($trendyol_all_items) ; $i++) {
		$first_item = $trendyol_all_items[$i]; 
		$second_item = $other_all_items2[$i]; 
		$tables = $all_tables[$i]; 
		$object = new Obj;
		$object->first_item = $first_item;
		$object->first_item_tables = 'trendyol_items';
		$object->second_item = $second_item;
		$object->second_item_tables = $tables;
		//$object->create("match_products");
	}
	*/
	
	// YAYLA PİRİNÇ ÜRÜNÜ N11-CİCEKSEPETİ BENZERLİK KARŞILAŞTIRMASI - GÜNCEL FİYAT GÖSTERİMİ //
	//echo 'YAYLA PİRİNÇ ÜRÜNÜ N11-CİCEKSEPETİ BENZERLİK KARŞILAŞTIRMASI - GÜNCEL FİYAT GÖSTERİMİ'. '<br>'. '<br>';
	//n11_ciceksepeti($n11_dizi,$ciceksepeti_dizi);
	/*
	$n11_all_items = array();
	$n11_all_items = array_merge($n11_item4,$n11_all_items);
	
	$other_all_items4 = array();
	$other_all_items4 = array_merge($ciceksepeti_item4,$other_all_items4);
	
	$all_tables = array();
	$all_tables = array_merge($table_ciceksepeti,$all_tables);
	//$all_tables = array_merge($table_n11,$all_tables);
	//$all_tables = array_merge($table_amazon,$all_tables);
	//$all_tables = array_merge($table_trendyol,$all_tables);

	for ($i=0; $i < sizeof($n11_all_items) ; $i++) {
		$first_item = $n11_all_items[$i]; 
		$second_item = $other_all_items4[$i]; 
		$tables = $all_tables[$i]; 
		$object = new Obj;
		$object->first_item = $first_item;
		$object->first_item_tables = 'n11_items';
		$object->second_item = $second_item;
		$object->second_item_tables = $tables;
		//$object->create("match_products");
	}
	*/
	// YAYLA PİRİNÇ ÜRÜNÜ N11-AMAZON BENZERLİK KARŞILAŞTIRMASI - GÜNCEL FİYAT GÖSTERİMİ //
	//echo 'YAYLA PİRİNÇ ÜRÜNÜ N11-AMAZON BENZERLİK KARŞILAŞTIRMASI - GÜNCEL FİYAT GÖSTERİMİ'. '<br>'. '<br>';
	//amazon_n11($amazon_dizi,$n11_dizi);

	// YAYLA PİRİNÇ ÜRÜNÜ AMAZON-CİCEKSEPETİ BENZERLİK KARŞILAŞTIRMASI - GÜNCEL FİYAT GÖSTERİMİ //
	//echo 'YAYLA PİRİNÇ ÜRÜNÜ AMAZON-CİCEKSEPETİ BENZERLİK KARŞILAŞTIRMASI - GÜNCEL FİYAT GÖSTERİMİ'. '<br>'. '<br>';
	//amazon_ciceksepeti($amazon_dizi,$ciceksepeti_dizi);
	/*
	$amazon_all_items = array();
	$amazon_all_items = array_merge($amazon_item3,$amazon_all_items);
	$amazon_all_items = array_merge($amazon_item4,$amazon_all_items);
	
	$other_all_items3 = array();
	$other_all_items3 = array_merge($n11_item3,$other_all_items3);
	$other_all_items3 = array_merge($ciceksepeti_item3,$other_all_items3);

	$all_tables = array();	
	$all_tables = array_merge($table_n11,$all_tables);	
	$all_tables = array_merge($table_ciceksepeti,$all_tables);	
	
	for ($i=0; $i < sizeof($amazon_all_items) ; $i++) {
		$first_item = $amazon_all_items[$i]; 
		$second_item = $other_all_items3[$i]; 
		$tables = $all_tables[$i]; 
		$object = new Obj;
		$object->first_item = $first_item;
		$object->first_item_tables = 'amazon_items';
		$object->second_item = $second_item;
		$object->second_item_tables = $tables;
		//$object->create("match_products");
	}
	*/


?>