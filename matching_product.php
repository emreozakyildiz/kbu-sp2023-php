<?php include_once("functions/class.php"); ?>
<?php include_once("functions/query_yayla.php"); ?>


<?php 

	require __DIR__ . '/../vendor/autoload.php';
	use FuzzyWuzzy\Fuzz;
	use FuzzyWuzzy\Process;

	function a101_trendyol($a101_dizi,$trendyol_dizi,$trendyol_item_name){	

		$fuzz = new Fuzz();
		$process = new Process($fuzz);

		global $a101_item;
		global $trendyol_item;
		global $table_trendyol;
		global $table_a101;

		$a101_item = array();
		$trendyol_item = array();
		$table_trendyol = array();
		$table_a101 = array();

		$a101_explode = array();
		$a101_value_left = array();
		$trendyol_explode = array();

		for ($i=0; $i <sizeof($trendyol_dizi); $i++) { 
			$trendyol_explode = explode(" ", $trendyol_dizi[$i]);
			$trendyol_explode = array_filter($trendyol_explode);
			for ($j=0; $j <sizeof($a101_dizi); $j++) { 
				$a101_explode = explode(" ", $a101_dizi[$j]);

				$keywords = ["Maden","Suyu"];				
				$key_1 = array_search($keywords[0], $a101_explode);
				$key_2 = array_search($keywords[1], $a101_explode);

				if(isset($key_1) && $key_1 >= 1){
					$a101_explode = array_filter($a101_explode);
					$value_left = $key_1+1;			
					$a101_explode[$value_left] = $a101_explode[$value_left] ?? "?";	
					array_push($a101_value_left, $a101_explode[$value_left]);
				}elseif(isset($key_2) && $key_2 >= 1){
					$a101_explode = array_filter($a101_explode);
					$value_left = $key_2+1;				
					$a101_explode[$value_left] = $a101_explode[$value_left] ?? "?";
					array_push($a101_value_left, $a101_explode[$value_left]);
				}
				else{
					$a101_explode = array_filter($a101_explode);
					$value_left = 1;
					$a101_explode[$value_left] = $a101_explode[$value_left] ?? "?";
					array_push($a101_value_left, $a101_explode[$value_left]);
				}

				$result = $fuzz->tokenSortRatio($trendyol_dizi[$i], $a101_dizi[$j]);
				if(($result >= 75) && (strpos($trendyol_dizi[$i],$a101_value_left[$j]) == true)){
					array_push($trendyol_item,$trendyol_dizi[$i]);
					array_push($a101_item,$a101_dizi[$j]);
					array_push($table_trendyol,'trendyol_items');
					echo $trendyol_dizi[$i] . '-' . $a101_dizi[$j]. ' ürünleri benzerlik oranı:' . $result. '<br>';
					echo '<br>';
				}
			}
		}
	}
	
	function a101_amazon($a101_dizi,$amazon_dizi){

		$fuzz = new Fuzz();
		$process = new Process($fuzz);

		global $a101_item2;
		global $amazon_item;
		global $table_amazon;
		global $table_a101;

		$a101_item2 = array();
		$amazon_item = array();
		$table_amazon = array();
		$table_a101 = array();

		$a101_explode = array();
		$a101_value_left = array();
		$amazon_explode = array();

		for ($i=0; $i <sizeof($amazon_dizi); $i++) { 
			$amazon_explode = explode(" ", $amazon_dizi[$i]);
			$amazon_explode = array_filter($amazon_explode);			
			array_push($table_a101,'a101_items');

			for ($j=0; $j <sizeof($a101_dizi); $j++) { 

				$a101_explode = explode(" ", $a101_dizi[$j]);
				$keywords = ["Maden","Suyu"];						
				$key_1 = array_search($keywords[0], $a101_explode);
				$key_2 = array_search($keywords[1], $a101_explode);

				if(isset($key_1) && $key_1 >= 1){
					$a101_explode = array_filter($a101_explode);
					$value_left = $key_1+1;						
					$a101_explode[$value_left] = $a101_explode[$value_left] ?? "?";			
					array_push($a101_value_left, $a101_explode[$value_left]);
				}elseif(isset($key_2) && $key_2 >= 1){
					$a101_explode = array_filter($a101_explode);
					$value_left = $key_2+1;							
					$a101_explode[$value_left] = $a101_explode[$value_left] ?? "?";		
					array_push($a101_value_left, $a101_explode[$value_left]);
				}
				else{
					$a101_explode = array_filter($a101_explode);
					$value_left = 1;
					$a101_explode[$value_left] = $a101_explode[$value_left] ?? "?";
					array_push($a101_value_left, $a101_explode[$value_left]);
				}
				
				$result = $fuzz->tokenSortRatio($amazon_dizi[$i], $a101_dizi[$j]);
				if(($result >= 75) && (strpos($amazon_dizi[$i],$a101_value_left[$j]) == true)){
					array_push($amazon_item,$amazon_dizi[$i]);
					array_push($a101_item2,$a101_dizi[$j]);
					array_push($table_amazon,'amazon_items');
					echo $amazon_dizi[$i] . '-' . $a101_dizi[$j]. ' ürünleri benzerlik oranı:' . $result. '<br>';
					echo '<br>';
				}
			}
		}
	}		

	function a101_n11($a101_dizi,$n11_dizi){

		$fuzz = new Fuzz();
		$process = new Process($fuzz);

		global $a101_item3;
		global $n11_item;
		global $table_n11;
		global $table_a101;

		$a101_item3 = array();
		$n11_item = array();
		$table_n11 = array();
		$table_a101 = array();

		$a101_explode = array();
		$a101_value_left = array();
		$n11_explode = array();

		for ($i=0; $i <sizeof($n11_dizi); $i++) { 

			$n11_explode = explode(" ", $n11_dizi[$i]);
			$n11_explode = array_filter($n11_explode);			
			array_push($table_a101,'a101_items');
			
			for ($j=0; $j <sizeof($a101_dizi); $j++) { 

				$a101_explode = explode(" ", $a101_dizi[$j]);
				$keywords = ["Maden","Suyu"];						
				$key_1 = array_search($keywords[0], $a101_explode);
				$key_2 = array_search($keywords[1], $a101_explode);
				if(isset($key_1) && $key_1 >= 1){
					$a101_explode = array_filter($a101_explode);
					$value_left = $key_1+1;			
					$a101_explode[$value_left] = $a101_explode[$value_left] ?? "?";	
					array_push($a101_value_left, $a101_explode[$value_left]);
				}elseif(isset($key_2) && $key_2 >= 1){
					$a101_explode = array_filter($a101_explode);
					$value_left = $key_2+1;	
					$a101_explode[$value_left] = $a101_explode[$value_left] ?? "?";			
					array_push($a101_value_left, $a101_explode[$value_left]);
				}
				else{
					$a101_explode = array_filter($a101_explode);
					$value_left = 1;
					$a101_explode[$value_left] = $a101_explode[$value_left] ?? "?";
					array_push($a101_value_left, $a101_explode[$value_left]);
				}
				
				$result = $fuzz->tokenSortRatio($n11_dizi[$i], $a101_dizi[$j]);
				if(($result >= 75) && (strpos($n11_dizi[$i],$a101_value_left[$j]) == true)){
					array_push($n11_item,$n11_dizi[$i]);
					array_push($a101_item3,$a101_dizi[$j]);
					array_push($table_n11,'n11_items');
					echo $n11_dizi[$i] . '-' . $a101_dizi[$j]. ' ürünleri benzerlik oranı:' . $result. '<br>';
					echo '<br>';
				}
			}
		}
	}

	function a101_ciceksepeti($a101_dizi,$ciceksepeti_dizi){

		$fuzz = new Fuzz();
		$process = new Process($fuzz);

		global $a101_item4;
		global $ciceksepeti_item;
		global $table_ciceksepeti;
		global $table_a101;

		$a101_item4 = array();
		$ciceksepeti_item = array();
		$a101_explode = array();
		$a101_value_left = array();
		$ciceksepeti_explode = array();
		$table_ciceksepeti = array();
		$table_a101 = array();
		

		for ($i=0; $i <sizeof($ciceksepeti_dizi); $i++) { 

			$ciceksepeti_explode = explode(" ", $ciceksepeti_dizi[$i]);
			$ciceksepeti_explode = array_filter($ciceksepeti_explode);			
			array_push($table_a101,'a101_items');
			
			for ($j=0; $j <sizeof($a101_dizi); $j++) { 

				$a101_explode = explode(" ", $a101_dizi[$j]);
				$keywords = ["Maden","Suyu"];						
				$key_1 = array_search($keywords[0], $a101_explode);
				$key_2 = array_search($keywords[1], $a101_explode);
				if(isset($key_1) && $key_1 >= 1){
					$a101_explode = array_filter($a101_explode);
					$value_left = $key_1+1;			
					$a101_explode[$value_left] = $a101_explode[$value_left] ?? "?";	
					array_push($a101_value_left, $a101_explode[$value_left]);
				}elseif(isset($key_2) && $key_2 >= 1){
					$a101_explode = array_filter($a101_explode);
					$value_left = $key_2+1;		
					$a101_explode[$value_left] = $a101_explode[$value_left] ?? "?";		
					array_push($a101_value_left, $a101_explode[$value_left]);
				}
				else{
					$a101_explode = array_filter($a101_explode);
					$value_left = 1;
					$a101_explode[$value_left] = $a101_explode[$value_left] ?? "?";
					array_push($a101_value_left, $a101_explode[$value_left]);
				}
				

				$value_1 =  $ciceksepeti_dizi[$i];
				$value_2 =  $a101_dizi[$j];
				$value_1 = html_entity_decode(preg_replace("/U\+([0-9A-F]{4})/", "&#x\\1;", $value_1), ENT_NOQUOTES, 'UTF-8');
				$value_2 = html_entity_decode(preg_replace("/U\+([0-9A-F]{4})/", "&#x\\1;", $value_2), ENT_NOQUOTES, 'UTF-8');
				
				$result = $fuzz->tokenSortRatio($value_1,$value_2);

				if(($result > 75)  && (strpos($value_1,$a101_value_left[$j]) == true)){
					array_push($ciceksepeti_item,$ciceksepeti_dizi[$i]);
					array_push($a101_item4,$a101_dizi[$j]);
					array_push($table_ciceksepeti,"ciceksepeti_items");
					echo $value_1. '-' . $a101_dizi[$j]. ' ürünleri benzerlik oranı:' . $result. '<br>';
					echo '<br>';
				}
			}
		}
	}

	function trendyol_amazon($trendyol_dizi,$amazon_dizi,$trendyol_item_name){
		$fuzz = new Fuzz();
		$process = new Process($fuzz);

		$fuzz = new Fuzz();
		global $amazon_item2;
		global $trendyol_item2;
		global $table_amazon;
		global $table_trendyol;

		$amazon_item2 = array();
		$trendyol_item2 = array();
		$table_amazon = array();
		$table_trendyol = array();

		$amazon_explode = array();
		$amazon_value_left = array();
		$trendyol_explode = array();

		for ($i=0; $i <sizeof($trendyol_dizi); $i++) { 
			$trendyol_explode = explode(" ", $trendyol_dizi[$i]);
			$trendyol_explode = array_filter($trendyol_explode);
			
			for ($j=0; $j <sizeof($amazon_dizi); $j++) { 
				$amazon_explode = explode(" ", $amazon_dizi[$j]);

				$keywords = ["Yağ","Yağı"];	
				$key_1 = array_search($keywords[0], $amazon_explode);
				$key_2 = array_search($keywords[1], $amazon_explode);
				if(isset($key_1) && $key_1 >= 1){
					$amazon_explode = array_filter($amazon_explode);
					$value_left = $key_1+1;				
					$amazon_explode[$value_left] = $amazon_explode[$value_left] ?? "?";
					array_push($amazon_value_left, $amazon_explode[$value_left]);
				}elseif(isset($key_2) && $key_2 >= 1){
					$amazon_explode = array_filter($amazon_explode);
					$value_left = $key_2+1;				
					$amazon_explode[$value_left] = $amazon_explode[$value_left] ?? "?";
					array_push($amazon_value_left, $amazon_explode[$value_left]);
				}
				else{
					$amazon_explode = array_filter($amazon_explode);
					$value_left = 1;
					$amazon_explode[$value_left] = $amazon_explode[$value_left] ?? "?";
					array_push($amazon_value_left, $amazon_explode[$value_left]);
				}
				
				$result = $fuzz->tokenSortRatio($trendyol_dizi[$i], $amazon_dizi[$j]);
				if(($result >= 75) && (strpos($trendyol_dizi[$i],$amazon_value_left[$j]) == true)){
					array_push($trendyol_item2,$trendyol_dizi[$i]);
					array_push($amazon_item2,$amazon_dizi[$j]);
					array_push($table_amazon,'amazon_items');
					array_push($table_trendyol,'trendyol_items');
					echo $trendyol_dizi[$i] . '-' . $amazon_dizi[$j]. ' ürünleri benzerlik oranı:' . $result. '<br>';
				}
			}
		}
	}

	function trendyol_n11($trendyol_dizi,$n11_dizi,$trendyol_item_name){
		$fuzz = new Fuzz();
		$process = new Process($fuzz);

		$fuzz = new Fuzz();
		global $n11_item2;
		global $trendyol_item3;
		global $table_n11;
		global $table_trendyol;

		$n11_item2 = array();
		$trendyol_item3 = array();
		$table_n11 = array();
		$table_trendyol = array();

		$n11_explode = array();
		$n11_value_left = array();
		$trendyol_explode = array();

		for ($i=0; $i <sizeof($trendyol_dizi); $i++) { 
			$trendyol_explode = explode(" ", $trendyol_dizi[$i]);
			$trendyol_explode = array_filter($trendyol_explode);			
			
			for ($j=0; $j <sizeof($n11_dizi); $j++) { 
				$n11_explode = explode(" ", $n11_dizi[$j]);

				$keywords = ["Yağ","Yağı"];				
				$key_1 = array_search($keywords[0], $n11_explode);
				$key_2 = array_search($keywords[1], $n11_explode);
				if(isset($key_1) && $key_1 >= 1){
					$n11_explode = array_filter($n11_explode);
					$value_left = $key_1+1;				
					$n11_explode[$value_left] = $n11_explode[$value_left] ?? "?";
					array_push($n11_value_left, $n11_explode[$value_left]);
				}elseif(isset($key_2) && $key_2 >= 1){
					$n11_explode = array_filter($n11_explode);
					$value_left = $key_2+1;	
					$n11_explode[$value_left] = $n11_explode[$value_left] ?? "?";		
					array_push($n11_value_left, $n11_explode[$value_left]);
				}
				else{
					$n11_explode = array_filter($n11_explode);
					$value_left = 1;
					$n11_explode[$value_left] = $n11_explode[$value_left] ?? "?";
					array_push($n11_value_left, $n11_explode[$value_left]);
				}

				$result = $fuzz->tokenSortRatio($trendyol_dizi[$i], $n11_dizi[$j]);

				if(($result >= 75) && (strpos($trendyol_dizi[$i],$n11_value_left[$j]) == true)){
					array_push($trendyol_item3,$trendyol_dizi[$i]);
					array_push($n11_item2,$n11_dizi[$j]);
					array_push($table_n11,'n11_items');
					array_push($table_trendyol,'trendyol_items');
					echo $trendyol_dizi[$i] . '-' . $n11_dizi[$j]. ' ürünleri benzerlik oranı:' . $result. '<br>'. '<br>';
				}
			}
		}
	}

	function trendyol_ciceksepeti($trendyol_dizi,$ciceksepeti_dizi,$trendyol_item_name){
		$fuzz = new Fuzz();
		$process = new Process($fuzz);
		$fuzz = new Fuzz();

		global $ciceksepeti_item2;
		global $trendyol_item4;
		global $table_trendyol;
		global $table_ciceksepeti;

		$ciceksepeti_item2 = array();
		$trendyol_item4 = array();
		$table_trendyol = array();
		$table_ciceksepeti = array();

		$ciceksepeti_explode = array();
		$ciceksepeti_value_left = array();
		$trendyol_explode = array();

		for ($i=0; $i <sizeof($trendyol_dizi); $i++) { 
			$trendyol_explode = explode(" ", $trendyol_dizi[$i]);
			$trendyol_explode = array_filter($trendyol_explode);

			for ($j=0; $j <sizeof($ciceksepeti_dizi); $j++) { 
				$ciceksepeti_explode = explode(" ", $ciceksepeti_dizi[$j]);

				$keywords = ["Yağ","Yağı"];				
				$key_1 = array_search($keywords[0], $ciceksepeti_explode);
				$key_2 = array_search($keywords[1], $ciceksepeti_explode);
				if(isset($key_1) && $key_1 >= 1){
					$ciceksepeti_explode = array_filter($ciceksepeti_explode);
					$value_left = $key_1 + 1;		
					$ciceksepeti_explode[$value_left] = $ciceksepeti_explode[$value_left] ?? "?";		
					array_push($ciceksepeti_value_left, $ciceksepeti_explode[$value_left]);
				}elseif(isset($key_2) && $key_2 >= 1){
					$ciceksepeti_explode = array_filter($ciceksepeti_explode);
					$value_left = $key_2 + 1;	
					$ciceksepeti_explode[$value_left] = $ciceksepeti_explode[$value_left] ?? "?";			
					array_push($ciceksepeti_value_left, $ciceksepeti_explode[$value_left]);
				}
				else{
					$ciceksepeti_explode = array_filter($ciceksepeti_explode);
					$value_left = 1;
					$ciceksepeti_explode[$value_left] = $ciceksepeti_explode[$value_left] ?? "?";
					array_push($ciceksepeti_value_left, $ciceksepeti_explode[$value_left]);
				}

				$value_1 =  $trendyol_dizi[$i];
				$value_2 =  $ciceksepeti_dizi[$j];
				$value_1 = html_entity_decode(preg_replace("/U\+([0-9A-F]{4})/", "&#x\\1;", $value_1), ENT_NOQUOTES, 'UTF-8');
				$value_2 = html_entity_decode(preg_replace("/U\+([0-9A-F]{4})/", "&#x\\1;", $value_2), ENT_NOQUOTES, 'UTF-8');

				$result = $fuzz->tokenSortRatio($value_1, $value_2);


				if(($result >= 75) && (strpos($value_1,$ciceksepeti_value_left[$j]) == true)){
					array_push($trendyol_item4,$trendyol_dizi[$i]);
					array_push($ciceksepeti_item2,$ciceksepeti_dizi[$j]);
					array_push($table_ciceksepeti,'ciceksepeti_items');
					array_push($table_trendyol,'trendyol_items');
					echo $trendyol_dizi[$i] . '-' . $ciceksepeti_dizi[$j]. ' ürünleri benzerlik oranı:' . $result. '<br>';
				}
			}
		}
	}

	function amazon_n11($amazon_dizi,$n11_dizi){
		$fuzz = new Fuzz();
		$process = new Process($fuzz);

		$fuzz = new Fuzz();
		global $n11_item3;
		global $amazon_item3;
		global $table_n11;
		global $table_amazon;

		$n11_item3 = array();
		$amazon_item3 = array();
		$table_n11 = array();
		$table_amazon = array();

		$n11_explode = array();
		$n11_value_left = array();
		$amazon_explode = array();

		for ($i=0; $i <sizeof($amazon_dizi); $i++) { 
			$amazon_explode = explode(" ", $amazon_dizi[$i]);
			$amazon_explode = array_filter($amazon_explode);
			
			for ($j=0; $j <sizeof($n11_dizi); $j++) { 
				$n11_explode = explode(" ", $n11_dizi[$j]);

				$keywords = ["Yağ","Yağı"];				
				$key_1 = array_search($keywords[0], $n11_explode);
				$key_2 = array_search($keywords[1], $n11_explode);

				if(isset($key_1) && $key_1 >= 1){
					$n11_explode = array_filter($n11_explode);
					$value_left = $key_1+1;				
					$n11_explode[$value_left] = $n11_explode[$value_left] ?? "?";
					array_push($n11_value_left, $n11_explode[$value_left]);
				}elseif(isset($key_2) && $key_2 >= 1){
					$n11_explode = array_filter($n11_explode);
					$value_left = $key_2+1;
					$n11_explode[$value_left] = $n11_explode[$value_left] ?? "?";		
					array_push($n11_value_left, $n11_explode[$value_left]);
				}
				else{
					$n11_explode = array_filter($n11_explode);
					$value_left = 1;
					$n11_explode[$value_left] = $n11_explode[$value_left] ?? "?";
					array_push($n11_value_left, $n11_explode[$value_left]);
				}
				
				$result = $fuzz->tokenSortRatio($amazon_dizi[$i], $n11_dizi[$j]);
				if(($result >= 75) && (strpos($amazon_dizi[$i],$n11_value_left[$j]) == true)){
					array_push($amazon_item3,$amazon_dizi[$i]);
					array_push($n11_item3,$n11_dizi[$j]);
					array_push($table_n11,'n11_items');
					array_push($table_amazon,'amazon_items');
					
					echo $amazon_dizi[$i] . '-' . $n11_dizi[$j]. ' ürünleri benzerlik oranı:' . $result. '<br>';
					
					echo '<br>';
				}
			}
		}
	}

	function amazon_ciceksepeti($amazon_dizi,$ciceksepeti_dizi){
		$fuzz = new Fuzz();
		$process = new Process($fuzz);

		$fuzz = new Fuzz();
		global $ciceksepeti_item3;
		global $amazon_item4;
		global $table_ciceksepeti;
		global $table_amazon;

		$ciceksepeti_item3 = array();
		$amazon_item4 = array();
		$table_ciceksepeti = array();
		$table_amazon = array();

		$ciceksepeti_explode = array();
		$ciceksepeti_left_value = array();
		$amazon_explode = array();

		for ($i=0; $i <sizeof($amazon_dizi); $i++) { 
			$amazon_explode = explode(" ", $amazon_dizi[$i]);
			$amazon_explode = array_filter($amazon_explode);		
			
			for ($j=0; $j <sizeof($ciceksepeti_dizi); $j++) { 
				$ciceksepeti_explode = explode(" ", $ciceksepeti_dizi[$j]);

				$keywords = ["Yağ","Yağı"];	

				$key_1 = array_search($keywords[0], $ciceksepeti_explode);
				$key_2 = array_search($keywords[1], $ciceksepeti_explode);
				if(isset($key_1) && $key_1 >= 1){
					$ciceksepeti_explode = array_filter($ciceksepeti_explode);
					$value_left = $key_1 + 1;		
					$ciceksepeti_explode[$value_left] = $ciceksepeti_explode[$value_left] ?? "?";		
					array_push($ciceksepeti_left_value, $ciceksepeti_explode[$value_left]);
				}elseif(isset($key_2) && $key_2 >= 1){
					$ciceksepeti_explode = array_filter($ciceksepeti_explode);
					$value_left = $key_2 + 1;	
					$ciceksepeti_explode[$value_left] = $ciceksepeti_explode[$value_left] ?? "?";			
					array_push($ciceksepeti_left_value, $ciceksepeti_explode[$value_left]);
				}
				else{
					$ciceksepeti_explode = array_filter($ciceksepeti_explode);
					$value_left = 1;
					$ciceksepeti_explode[$value_left] = $ciceksepeti_explode[$value_left] ?? "?";
					array_push($ciceksepeti_left_value, $ciceksepeti_explode[$value_left]);
				}

				$value_1 =  $amazon_dizi[$i];
				$value_2 =  $ciceksepeti_dizi[$j];
				$value_1 = html_entity_decode(preg_replace("/U\+([0-9A-F]{4})/", "&#x\\1;", $value_1), ENT_NOQUOTES, 'UTF-8');
				$value_2 = html_entity_decode(preg_replace("/U\+([0-9A-F]{4})/", "&#x\\1;", $value_2), ENT_NOQUOTES, 'UTF-8');

				$result = $fuzz->tokenSortRatio($value_1, $value_2);
				
				if(($result >= 75) && (strpos($value_1,$ciceksepeti_left_value[$j]) == true)){
					array_push($amazon_item4,$amazon_dizi[$i]);
					array_push($ciceksepeti_item3,$ciceksepeti_dizi[$j]);
					array_push($table_amazon,'amazon_items');			
					array_push($table_ciceksepeti,'ciceksepeti_items');						
					echo $amazon_dizi[$i] . '-' . $ciceksepeti_dizi[$j]. ' ürünleri benzerlik oranı:' . $result. '<br>';
					echo '<br>';
				}
			}
		}
	}

	function n11_ciceksepeti($n11_dizi,$ciceksepeti_dizi){
		$fuzz = new Fuzz();
		$process = new Process($fuzz);

		$fuzz = new Fuzz();
		global $n11_item4;
		global $ciceksepeti_item4;
		global $table_ciceksepeti;
		global $table_n11;

		$n11_item4 = array();
		$ciceksepeti_item4 = array();
		$table_ciceksepeti = array();
		$table_n11 = array();

		$ciceksepeti_explode = array();
		$ciceksepeti_left_value = array();
		$n11_explode = array();

		for ($i=0; $i <sizeof($n11_dizi); $i++) { 
			$n11_explode = explode(" ", $n11_dizi[$i]);
			$n11_explode = array_filter($n11_explode);
			array_push($table_n11,'n11_items');
			
			
			for ($j=0; $j <sizeof($ciceksepeti_dizi); $j++) { 
				$ciceksepeti_explode = explode(" ", $ciceksepeti_dizi[$j]);

				$keywords = ["Yağ","Yağı"];	
							
				$key_1 = array_search($keywords[0], $ciceksepeti_explode);
				$key_2 = array_search($keywords[1], $ciceksepeti_explode);
				if(isset($key_1) && $key_1 >= 1){
					$ciceksepeti_explode = array_filter($ciceksepeti_explode);
					$value_left = $key_1 + 1;		
					$ciceksepeti_explode[$value_left] = $ciceksepeti_explode[$value_left] ?? "?";		
					array_push($ciceksepeti_left_value, $ciceksepeti_explode[$value_left]);
				}elseif(isset($key_2) && $key_2 >= 1){
					$ciceksepeti_explode = array_filter($ciceksepeti_explode);
					$value_left = $key_2 + 1;	
					$ciceksepeti_explode[$value_left] = $ciceksepeti_explode[$value_left] ?? "?";			
					array_push($ciceksepeti_left_value, $ciceksepeti_explode[$value_left]);
				}
				else{
					$ciceksepeti_explode = array_filter($ciceksepeti_explode);
					$value_left = 1;
					$ciceksepeti_explode[$value_left] = $ciceksepeti_explode[$value_left] ?? "?";
					array_push($ciceksepeti_left_value, $ciceksepeti_explode[$value_left]);
				}

				$value_1 =  $n11_dizi[$i];
				$value_2 =  $ciceksepeti_dizi[$j];
				$value_1 = html_entity_decode(preg_replace("/U\+([0-9A-F]{4})/", "&#x\\1;", $value_1), ENT_NOQUOTES, 'UTF-8');
				$value_2 = html_entity_decode(preg_replace("/U\+([0-9A-F]{4})/", "&#x\\1;", $value_2), ENT_NOQUOTES, 'UTF-8');

				$result = $fuzz->tokenSortRatio($value_1, $value_2);

				if(($result >= 75) && (strpos($value_1,$ciceksepeti_left_value[$j]) == true)){
					array_push($n11_item4,$n11_dizi[$i]);
					array_push($ciceksepeti_item4,$ciceksepeti_dizi[$j]);
					array_push($table_ciceksepeti,'ciceksepeti_items');
					echo $n11_dizi[$i] . '-' . $ciceksepeti_dizi[$j]. ' ürünleri benzerlik oranı:' . $result. '<br>';
					echo '<br>';
				}
			}
		}
	}
?>	