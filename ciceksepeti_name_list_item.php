<?php include_once("functions/class.php"); ?>
<?php 
	
	function ciceksepeti_name_list_item($sorgu){

    	$ciceksepeti_database_list = new Obj();
    	$ciceksepeti_database_list->list($sorgu);
    	global $ciceksepeti_dizi;
    	$ciceksepeti_dizi = array();
    	if(isset($ciceksepeti_database_list->list)){
				foreach ($ciceksepeti_database_list->list as $ciceksepeti_database_list) {
					$array = json_decode( json_encode($ciceksepeti_database_list), true);
					array_push($ciceksepeti_dizi,$array['name']);
					//echo 'Çiçeksepeti Ürün Adı: ';
					//print_r($array['name']);
					//echo '<br>';
				}
			}
	}

?>
