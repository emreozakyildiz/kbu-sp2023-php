
<?php include_once("functions/class.php"); ?>

<?php 
	/*
	trendyol_name_list_item("SELECT DISTINCT trendyol_item_name, CONCAT (trendyol_item_brand_name,' ',trendyol_item_name) as name FROM trendyol_items WHERE trendyol_item_brand_name= 'Yayla' AND trendyol_item_name != '0'");

	a101_list_item("SELECT DISTINCT a101_item_name FROM a101_items WHERE a101_item_name LIKE '%Yayla%' AND a101_item_name LIKE '%Pirinç%'");

	amazon_name_list_item("SELECT DISTINCT amazon_item_name as name FROM amazon_items WHERE amazon_item_name LIKE '%Yayla%' AND amazon_item_name LIKE '%Pirinç%'");

	n11_name_list_item("SELECT DISTINCT n11_item_name as name FROM n11_items WHERE n11_item_name LIKE '%Yayla%' AND n11_item_name != '0'");

	ciceksepeti_name_list_item("SELECT DISTINCT ciceksepeti_item_name as name FROM ciceksepeti_items WHERE ciceksepeti_item_name LIKE '%Yayla%' AND `ciceksepeti_item_name` != '0'");

	trendyol_name_list_item("SELECT DISTINCT trendyol_item_name, CONCAT (trendyol_item_brand_name,' ',trendyol_item_name) as name FROM trendyol_items WHERE trendyol_item_brand_name= 'Fairy' AND trendyol_item_name != '0'");

	a101_list_item("SELECT DISTINCT a101_item_name FROM a101_items WHERE a101_item_name LIKE '%Fairy%' AND a101_item_name LIKE '%Bulaşık%'");

	amazon_name_list_item("SELECT DISTINCT amazon_item_name as name FROM amazon_items WHERE amazon_item_name LIKE '%Fairy%' AND amazon_item_name LIKE '%Bulaşık%'");

	n11_name_list_item("SELECT DISTINCT n11_item_name as name FROM n11_items WHERE n11_item_name LIKE '%Fairy%' AND n11_item_name != '0'");

	ciceksepeti_name_list_item("SELECT DISTINCT ciceksepeti_item_name as name FROM ciceksepeti_items WHERE ciceksepeti_item_name LIKE '%Fairy%' AND `ciceksepeti_item_name` != '0'");

	trendyol_name_list_item("SELECT DISTINCT trendyol_item_name, CONCAT (trendyol_item_brand_name,' ',trendyol_item_name) as name FROM trendyol_items WHERE trendyol_item_brand_name= 'Tat ' AND trendyol_item_name != '0'");

	a101_list_item("SELECT DISTINCT a101_item_name FROM a101_items WHERE a101_item_name LIKE '%Tat %' AND a101_item_name LIKE '%Salça%'");

	amazon_name_list_item("SELECT DISTINCT amazon_item_name as name FROM amazon_items WHERE amazon_item_name LIKE '%Tat %' AND amazon_item_name LIKE '%Salça%'");

	n11_name_list_item("SELECT DISTINCT n11_item_name as name FROM n11_items WHERE n11_item_name LIKE '%Tat %' AND n11_item_name != '0'");

	ciceksepeti_name_list_item("SELECT DISTINCT ciceksepeti_item_name as name FROM ciceksepeti_items WHERE ciceksepeti_item_name LIKE '%Tat %' AND `ciceksepeti_item_name` != '0'");

	trendyol_name_list_item("SELECT DISTINCT trendyol_item_name, CONCAT (trendyol_item_brand_name,' ',trendyol_item_name) as name FROM trendyol_items WHERE trendyol_item_brand_name= 'Sensodyne ' AND trendyol_item_name != '0'");

	a101_list_item("SELECT DISTINCT a101_item_name FROM a101_items WHERE a101_item_name LIKE '%Sensodyne %' AND a101_item_name LIKE '%Macun%'");

	amazon_name_list_item("SELECT DISTINCT amazon_item_name as name FROM amazon_items WHERE amazon_item_name LIKE '%Sensodyne %' AND amazon_item_name LIKE '%Macun%'");

	n11_name_list_item("SELECT DISTINCT n11_item_name as name FROM n11_items WHERE n11_item_name LIKE '%Sensodyne %' AND n11_item_name != '0'");

	ciceksepeti_name_list_item("SELECT DISTINCT ciceksepeti_item_name as name FROM ciceksepeti_items WHERE ciceksepeti_item_name LIKE '%Sensodyne %' AND `ciceksepeti_item_name` != '0'");

	
	trendyol_name_list_item("SELECT DISTINCT trendyol_item_name, CONCAT (trendyol_item_brand_name,' ',trendyol_item_name) as name FROM trendyol_items WHERE trendyol_item_brand_name= 'Komili ' AND trendyol_item_name != '0'");

	a101_list_item("SELECT DISTINCT a101_item_name FROM a101_items WHERE a101_item_name LIKE '%Komili %' AND a101_item_name LIKE '%Yağ%'");

	amazon_name_list_item("SELECT DISTINCT amazon_item_name as name FROM amazon_items WHERE amazon_item_name LIKE '%Komili %' AND amazon_item_name LIKE '%Yağ%'");

	n11_name_list_item("SELECT DISTINCT n11_item_name as name FROM n11_items WHERE n11_item_name LIKE '%Komili %' AND n11_item_name != '0'");

	ciceksepeti_name_list_item("SELECT DISTINCT ciceksepeti_item_name as name FROM ciceksepeti_items WHERE ciceksepeti_item_name LIKE '%Komili %' AND `ciceksepeti_item_name` != '0'");
	
	

	function a101_all_items(){
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
	}


	function trendyol_all_items(){
		$trendyol_all_items = array();
		//$trendyol_all_items = array_merge($trendyol_item4,$trendyol_all_items);
		$trendyol_all_items = array_merge($trendyol_item3,$trendyol_all_items);
		$trendyol_all_items = array_merge($trendyol_item2,$trendyol_all_items);
		
		$other_all_items2 = array();
		//$other_all_items2 = array_merge($ciceksepeti_item2,$other_all_items2);
		$other_all_items2 = array_merge($n11_item2,$other_all_items2);
		$other_all_items2 = array_merge($amazon_item2,$other_all_items2);

		$all_tables = array();
		//$all_tables = array_merge($table_ciceksepeti,$all_tables);
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
	}
	global $keyword_value1;
	$keyword_value1 = "Yağ";
	global $keyword_value2_yudum;
 	$keyword_value2_yudum = "Yağı";

	trendyol_name_list_item("SELECT DISTINCT trendyol_item_name, CONCAT (trendyol_item_brand_name,' ',trendyol_item_name) as name FROM trendyol_items WHERE trendyol_item_brand_name= 'Yudum ' AND trendyol_item_name != '0'");

	a101_list_item("SELECT DISTINCT a101_item_name FROM a101_items WHERE a101_item_name LIKE '%Yudum %' AND a101_item_name LIKE '%Yağ%'");

	amazon_name_list_item("SELECT DISTINCT amazon_item_name as name FROM amazon_items WHERE amazon_item_name LIKE '%Yudum %' AND amazon_item_name LIKE '%Yağ%'");

	n11_name_list_item("SELECT DISTINCT n11_item_name as name FROM n11_items WHERE n11_item_name LIKE '%Yudum %' AND n11_item_name != '0'");

	ciceksepeti_name_list_item("SELECT DISTINCT ciceksepeti_item_name as name FROM ciceksepeti_items WHERE ciceksepeti_item_name LIKE '%Yudum%' AND `ciceksepeti_item_name` != '0'");
	
	//a101_trendyol($a101_dizi,$trendyol_dizi,$trendyol_item_name);
	//a101_amazon($a101_dizi,$amazon_dizi);
	//a101_n11($a101_dizi,$n11_dizi);
	//a101_ciceksepeti($a101_dizi,$ciceksepeti_dizi);

	//echo 'YAYLA PİRİNÇ ÜRÜNÜ TRENDYOL-AMAZON BENZERLİK KARŞILAŞTIRMASI - GÜNCEL FİYAT GÖSTERİMİ'. '<br>'. '<br>';
	//trendyol_amazon($trendyol_dizi,$amazon_dizi,$trendyol_item_name);

	//echo 'YAYLA PİRİNÇ ÜRÜNÜ TRENDYOL-N11 BENZERLİK KARŞILAŞTIRMASI - GÜNCEL FİYAT GÖSTERİMİ'. '<br>'. '<br>';
	//trendyol_n11($trendyol_dizi,$n11_dizi,$trendyol_item_name);

	//echo 'YAYLA PİRİNÇ ÜRÜNÜ TRENDYOL-CİCEKSEPETİ BENZERLİK KARŞILAŞTIRMASI - GÜNCEL FİYAT GÖSTERİMİ'. '<br>'. '<br>';
	//trendyol_ciceksepeti($trendyol_dizi,$ciceksepeti_dizi,$trendyol_item_name);

*/

?>