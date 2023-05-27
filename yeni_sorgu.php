<?php include_once("functions/class.php"); ?>
<?php 
	
	function yeni_sorgu($sorgu){

    	$sorgu2 = new Obj();
    	$sorgu2->list($sorgu);
    	global $market_id;
    	global $item_name;
    	global $item_price;
    	global $healthcare;
    	global $food;
    	global $office;
    	global $cleaning;
    	global $car;
    	global $electronic;
    	global $accessories;
    	global $fashion;
    	$market_id = array();
    	$item_name = array();
    	$item_price = array();
    	$healthcare = array();
    	$food = array();
    	$office = array();
    	$cleaning = array();
    	$car = array();
    	$electronic = array();
    	$accessories = array();
    	$fashion = array();
    	if(isset($sorgu2->list)){
				foreach ($sorgu2->list as $sorgu2) {
					$array = json_decode( json_encode($sorgu2), true);
					array_push($market_id,$array['market_id']);
					array_push($item_name,$array['item_name']);
					array_push($item_price,$array['item_price']);
					array_push($healthcare,$array['healthcare']);
					array_push($food,$array['food']);
					array_push($office,$array['office']);
					array_push($cleaning,$array['cleaning']);
					array_push($car,$array['car']);
					array_push($electronic,$array['electronic']);
					array_push($accessories,$array['accessories']);
					array_push($fashion,$array['fashion']);
					//echo 'N11 ürün güncel fiyatı: ';
					//print_r($array['price']);
					//echo '<br>';
				}
			}else{
				echo "Böyle bir ürün bulunamadı" . '<br>' . '<br>';
			}
	}

?>
