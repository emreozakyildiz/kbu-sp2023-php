<?php include_once("functions/class.php"); ?>
<?php include_once("simple_html_dom.php"); ?>
<?php include("functions/n11_get_item.php"); ?>
<?php include("functions/n11_name_list_item.php"); ?>
<?php include("functions/n11_price_list_item.php"); ?>

<?php include("functions/ciceksepeti_get_item.php"); ?>
<?php include("functions/ciceksepeti_name_list_item.php"); ?>
<?php include("functions/ciceksepeti_price_list_item.php"); ?>


<?php include("functions/amazon_get_item.php"); ?>
<?php include("functions/amazon_name_list_item.php"); ?>
<?php include("functions/amazon_price_list_item.php"); ?>
<?php include("functions/trendyol_get_item.php"); ?>
<?php include("functions/trendyol_name_list_item.php"); ?>
<?php include("functions/trendyol_brand_name_list_item.php"); ?>
<?php include("functions/trendyol_price_list_item.php"); ?>
<?php include("functions/a101_get_item.php"); ?>
<?php include("functions/a101_list_item.php"); ?>
<?php include("functions/a101_price_list_item.php"); ?>


<?php include("functions/query_yayla.php"); ?>
<?php include("functions/matching_product.php"); ?>
<?php include("functions/matching_product_list_item.php"); ?>
<?php include("functions/list_last_item.php"); ?>
<?php include("functions/list_trendyol_last_item.php"); ?>


<?php include("functions/all_queries.php"); ?>
<?php include("functions/yeni_sorgu.php"); ?>
<?php include("functions/trendyol_date_item.php"); ?>
<?php include("functions/trendyol_list_item.php"); ?>


<?php
	ini_set('max_execution_time', 99999900000);

	$a101_items = a101_list_item("SELECT DISTINCT `product_name` FROM `product` WHERE `marketid` = 3");

	$keywords = ["nutella çikolata", "yayla pirinç"];

	foreach($keywords as $keyword){
		//echo '-------------------------TRENDYOL---------------------' . '<br>';
		//trendyol_get_item($keyword);
		echo '-------------------------A101---------------------' . '<br>';
		a101_get_item($keyword, $a101_items);
		//echo '-------------------------N11---------------------' . '<br>';
		//n11_get_item($keyword);
		//echo '-------------------------AMAZON---------------------' . '<br>';
		//amazon_get_item($keyword);
		//echo '-------------------------ÇİÇEKSEPETİ---------------------' . '<br>';
		//ciceksepeti_get_item($keyword);
		exit;
	}
	
?>

	

		
<?php
	
    // -------------------------------- TRENDYOL ÜRÜNLER --------------------------------
	
	//SENSODYNE DİŞ MACUNU TRENDYOL
	
	//trendyol_get_item('https://www.trendyol.com/sensodyne-dis-macunu-x-b101761-c101398','span[class="prdct-desc-cntnr-ttl"]', 'span[class="prdct-desc-cntnr-name hasRatings"]','div[class="prc-box-dscntd"]','span[class="ratingCount"]','div[class="unit-info"]','div[class="stmp rd"]','div[class="stmp fc"]','div[class="stmp sds"]','div[class="low-price-in-last-month with-basket"]','span[class="cross-promotion-title"]','span[class="promotion-title"]','span[class="coupon-amount-text"]');

	// PINAR SÜT TRENDYOL
	
	//trendyol_get_item('https://www.trendyol.com/pinar-sut-x-b148572-c104008?os=1','span[class="prdct-desc-cntnr-ttl"]', 'span[class="prdct-desc-cntnr-name hasRatings"]','div[class="prc-box-dscntd"]','span[class="ratingCount"]','div[class="unit-info"]','div[class="stmp rd"]','div[class="stmp fc"]','div[class="stmp sds"]','div[class="low-price-in-last-month with-basket"]','span[class="cross-promotion-title"]','span[class="promotion-title"]','span[class="coupon-amount-text"]');
	
	// SELPAK TUVALET KAĞIDI TRENDYOL
	
	//trendyol_get_item('https://www.trendyol.com/selpak-tuvalet-kagidi-x-b107797-c104188?os=1','span[class="prdct-desc-cntnr-ttl"]', 'span[class="prdct-desc-cntnr-name hasRatings"]','div[class="prc-box-dscntd"]','span[class="ratingCount"]','div[class="unit-info"]','div[class="stmp rd"]','div[class="stmp fc"]','div[class="stmp sds"]','div[class="low-price-in-last-month with-basket"]','span[class="cross-promotion-title"]','span[class="promotion-title"]','span[class="coupon-amount-text"]');
/*
	// COPIER BOND A4 FOTOKOPİ KAĞIDI TRENDYOL

	trendyol_get_item('https://www.trendyol.com/copierbond-fotokopi-kagidi-x-b110276-c106552?os=1','span[class="prdct-desc-cntnr-ttl"]', 'span[class="prdct-desc-cntnr-name hasRatings"]','div[class="prc-box-dscntd"]','span[class="ratingCount"]','div[class="unit-info"]','div[class="stmp rd"]','div[class="stmp fc"]','div[class="stmp sds"]','div[class="low-price-in-last-month with-basket"]','span[class="cross-promotion-title"]','span[class="promotion-title"]','span[class="coupon-amount-text"]');

	// FAIRY BULAŞIK MAKİNESİ TABLETİ

	trendyol_get_item('https://www.trendyol.com/fairy-bulasik-makinesi-deterjani-x-b104892-c103803?os=1','span[class="prdct-desc-cntnr-ttl"]', 'span[class="prdct-desc-cntnr-name hasRatings"]','div[class="prc-box-dscntd"]','span[class="ratingCount"]','div[class="unit-info"]','div[class="stmp rd"]','div[class="stmp fc"]','div[class="stmp sds"]','div[class="low-price-in-last-month with-basket"]','span[class="cross-promotion-title"]','span[class="promotion-title"]','span[class="coupon-amount-text"]');

	// LİPTON ÇAY

	trendyol_get_item('https://www.trendyol.com/lipton-cay-x-b107760-c104000?os=1','span[class="prdct-desc-cntnr-ttl"]', 'span[class="prdct-desc-cntnr-name hasRatings"]','div[class="prc-box-dscntd"]','span[class="ratingCount"]','div[class="unit-info"]','div[class="stmp rd"]','div[class="stmp fc"]','div[class="stmp sds"]','div[class="low-price-in-last-month with-basket"]','span[class="cross-promotion-title"]','span[class="promotion-title"]','span[class="coupon-amount-text"]');

	// ÇAYKUR ÇAY

	trendyol_get_item('https://www.trendyol.com/caykur-cay-x-b107748-c104000?os=1','span[class="prdct-desc-cntnr-ttl"]', 'span[class="prdct-desc-cntnr-name hasRatings"]','div[class="prc-box-dscntd"]','span[class="ratingCount"]','div[class="unit-info"]','div[class="stmp rd"]','div[class="stmp fc"]','div[class="stmp sds"]','div[class="low-price-in-last-month with-basket"]','span[class="cross-promotion-title"]','span[class="promotion-title"]','span[class="coupon-amount-text"]');

	// DOĞUŞ ÇAY

	trendyol_get_item('https://www.trendyol.com/dogus-cay-x-b107751-c104000?os=1','span[class="prdct-desc-cntnr-ttl"]', 'span[class="prdct-desc-cntnr-name hasRatings"]','div[class="prc-box-dscntd"]','span[class="ratingCount"]','div[class="unit-info"]','div[class="stmp rd"]','div[class="stmp fc"]','div[class="stmp sds"]','div[class="low-price-in-last-month with-basket"]','span[class="cross-promotion-title"]','span[class="promotion-title"]','span[class="coupon-amount-text"]');


	// JACOBS KAHVE

	trendyol_get_item('https://www.trendyol.com/jacobs-kahve-x-b107757-c104004?os=1','span[class="prdct-desc-cntnr-ttl"]', 'span[class="prdct-desc-cntnr-name hasRatings"]','div[class="prc-box-dscntd"]','span[class="ratingCount"]','div[class="unit-info"]','div[class="stmp rd"]','div[class="stmp fc"]','div[class="stmp sds"]','div[class="low-price-in-last-month with-basket"]','span[class="cross-promotion-title"]','span[class="promotion-title"]','span[class="coupon-amount-text"]');

	// BABY TURCO ISLAK MENDİL

	trendyol_get_item('https://www.trendyol.com/baby-turco-islak-mendil-x-b109299-c101411?os=1','span[class="prdct-desc-cntnr-ttl"]', 'span[class="prdct-desc-cntnr-name hasRatings"]','div[class="prc-box-dscntd"]','span[class="ratingCount"]','div[class="unit-info"]','div[class="stmp rd"]','div[class="stmp fc"]','div[class="stmp sds"]','div[class="low-price-in-last-month with-basket"]','span[class="cross-promotion-title"]','span[class="promotion-title"]','span[class="coupon-amount-text"]');

	// LA ROCHE POSAY GÜNEŞ KREMİ

	trendyol_get_item('https://www.trendyol.com/la-roche-posay-yuz-gunes-kremi-x-b601-c1061?os=1','span[class="prdct-desc-cntnr-ttl"]', 'span[class="prdct-desc-cntnr-name hasRatings"]','div[class="prc-box-dscntd"]','span[class="ratingCount"]','div[class="unit-info"]','div[class="stmp rd"]','div[class="stmp fc"]','div[class="stmp sds"]','div[class="low-price-in-last-month with-basket"]','span[class="cross-promotion-title"]','span[class="promotion-title"]','span[class="coupon-amount-text"]');

	// PALMOLİVE DUŞ JELİ

	trendyol_get_item('https://www.trendyol.com/palmolive-dus-jeli-ve-kremleri-x-b102824-c101401?os=1','span[class="prdct-desc-cntnr-ttl"]', 'span[class="prdct-desc-cntnr-name hasRatings"]','div[class="prc-box-dscntd"]','span[class="ratingCount"]','div[class="unit-info"]','div[class="stmp rd"]','div[class="stmp fc"]','div[class="stmp sds"]','div[class="low-price-in-last-month with-basket"]','span[class="cross-promotion-title"]','span[class="promotion-title"]','span[class="coupon-amount-text"]');

	// YAYLA PİRİNÇ
	
	trendyol_get_item('https://www.trendyol.com/sr?wc=145098&wb=110987&qt=pirin%C3%A7&st=pirin%C3%A7&os=1','span[class="prdct-desc-cntnr-ttl"]', 'span[class="prdct-desc-cntnr-name hasRatings"]','div[class="prc-box-dscntd"]','span[class="ratingCount"]','div[class="unit-info"]','div[class="stmp rd"]','div[class="stmp fc"]','div[class="stmp sds"]','div[class="low-price-in-last-month with-basket"]','span[class="cross-promotion-title"]','span[class="promotion-title"]','span[class="coupon-amount-text"]','a');

	// DURU PİRİNÇ

	trendyol_get_item('https://www.trendyol.com/sr?wc=145098&wb=105234&qt=pirin%C3%A7&st=pirin%C3%A7&os=1','span[class="prdct-desc-cntnr-ttl"]', 'span[class="prdct-desc-cntnr-name hasRatings"]','div[class="prc-box-dscntd"]','span[class="ratingCount"]','div[class="unit-info"]','div[class="stmp rd"]','div[class="stmp fc"]','div[class="stmp sds"]','div[class="low-price-in-last-month with-basket"]','span[class="cross-promotion-title"]','span[class="promotion-title"]','span[class="coupon-amount-text"]');

	// TAT SALÇA

	trendyol_get_item('https://www.trendyol.com/sr?wc=103981&wb=107778&qt=sal%C3%A7a&st=sal%C3%A7a&os=1','span[class="prdct-desc-cntnr-ttl"]', 'span[class="prdct-desc-cntnr-name hasRatings"]','div[class="prc-box-dscntd"]','span[class="ratingCount"]','div[class="unit-info"]','div[class="stmp rd"]','div[class="stmp fc"]','div[class="stmp sds"]','div[class="low-price-in-last-month with-basket"]','span[class="cross-promotion-title"]','span[class="promotion-title"]','span[class="coupon-amount-text"]');

	// ÖNCÜ SALÇA

	trendyol_get_item('https://www.trendyol.com/sr?wc=103981&wb=146650&qt=sal%C3%A7a&st=sal%C3%A7a&os=1','span[class="prdct-desc-cntnr-ttl"]', 'span[class="prdct-desc-cntnr-name hasRatings"]','div[class="prc-box-dscntd"]','span[class="ratingCount"]','div[class="unit-info"]','div[class="stmp rd"]','div[class="stmp fc"]','div[class="stmp sds"]','div[class="low-price-in-last-month with-basket"]','span[class="cross-promotion-title"]','span[class="promotion-title"]','span[class="coupon-amount-text"]');

	// BEYPAZARI MADEN SUYU

	trendyol_get_item('https://www.trendyol.com/sr?wc=109245&wb=145562&qt=maden%20suyu&st=maden%20suyu&os=1','span[class="prdct-desc-cntnr-ttl"]', 'span[class="prdct-desc-cntnr-name hasRatings"]','div[class="prc-box-dscntd"]','span[class="ratingCount"]','div[class="unit-info"]','div[class="stmp rd"]','div[class="stmp fc"]','div[class="stmp sds"]','div[class="low-price-in-last-month with-basket"]','span[class="cross-promotion-title"]','span[class="promotion-title"]','span[class="coupon-amount-text"]');

	// KIZILAY MADEN SUYU

	trendyol_get_item('https://www.trendyol.com/sr?q=maden%20suyu%20k%C4%B1z%C4%B1lay&qt=maden%20suyu%20k%C4%B1z%C4%B1lay&st=maden%20suyu%20k%C4%B1z%C4%B1lay&os=1','span[class="prdct-desc-cntnr-ttl"]', 'span[class="prdct-desc-cntnr-name hasRatings"]','div[class="prc-box-dscntd"]','span[class="ratingCount"]','div[class="unit-info"]','div[class="stmp rd"]','div[class="stmp fc"]','div[class="stmp sds"]','div[class="low-price-in-last-month with-basket"]','span[class="cross-promotion-title"]','span[class="promotion-title"]','span[class="coupon-amount-text"]');

	// DOMESTOS ÇAMAŞIR SUYU

	trendyol_get_item('https://www.trendyol.com/sr?wc=103812&wb=107787&qt=%C3%A7ama%C5%9F%C4%B1r%20suyu&st=%C3%A7ama%C5%9F%C4%B1r%20suyu&os=1','span[class="prdct-desc-cntnr-ttl"]', 'span[class="prdct-desc-cntnr-name hasRatings"]','div[class="prc-box-dscntd"]','span[class="ratingCount"]','div[class="unit-info"]','div[class="stmp rd"]','div[class="stmp fc"]','div[class="stmp sds"]','div[class="low-price-in-last-month with-basket"]','span[class="cross-promotion-title"]','span[class="promotion-title"]','span[class="coupon-amount-text"]');

	// ACE ÇAMAŞIR SUYU

	trendyol_get_item('https://www.trendyol.com/sr?wc=103812&wb=107781&qt=%C3%A7ama%C5%9F%C4%B1r%20suyu&st=%C3%A7ama%C5%9F%C4%B1r%20suyu&os=1','span[class="prdct-desc-cntnr-ttl"]', 'span[class="prdct-desc-cntnr-name hasRatings"]','div[class="prc-box-dscntd"]','span[class="ratingCount"]','div[class="unit-info"]','div[class="stmp rd"]','div[class="stmp fc"]','div[class="stmp sds"]','div[class="low-price-in-last-month with-basket"]','span[class="cross-promotion-title"]','span[class="promotion-title"]','span[class="coupon-amount-text"]');

	// NUTELLA SÜRÜLEBİLİR ÇİKOLATA

	trendyol_get_item('https://www.trendyol.com/nutella-surulebilir-cikolata-x-b107764-c145140?os=1','span[class="prdct-desc-cntnr-ttl"]', 'span[class="prdct-desc-cntnr-name hasRatings"]','div[class="prc-box-dscntd"]','span[class="ratingCount"]','div[class="unit-info"]','div[class="stmp rd"]','div[class="stmp fc"]','div[class="stmp sds"]','div[class="low-price-in-last-month with-basket"]','span[class="cross-promotion-title"]','span[class="promotion-title"]','span[class="coupon-amount-text"]');

	// TORKU SÜRÜLEBİLİR ÇİKOLATA

	trendyol_get_item('https://www.trendyol.com/torku-surulebilir-cikolata-x-b108261-c145140?os=1','span[class="prdct-desc-cntnr-ttl"]', 'span[class="prdct-desc-cntnr-name hasRatings"]','div[class="prc-box-dscntd"]','span[class="ratingCount"]','div[class="unit-info"]','div[class="stmp rd"]','div[class="stmp fc"]','div[class="stmp sds"]','div[class="low-price-in-last-month with-basket"]','span[class="cross-promotion-title"]','span[class="promotion-title"]','span[class="coupon-amount-text"]');

	// YUDUM AYÇİÇEK YAĞI

	trendyol_get_item('https://www.trendyol.com/yudum-sivi-yaglar-x-b110454-c103982?os=1','span[class="prdct-desc-cntnr-ttl"]', 'span[class="prdct-desc-cntnr-name hasRatings"]','div[class="prc-box-dscntd"]','span[class="ratingCount"]','div[class="unit-info"]','div[class="stmp rd"]','div[class="stmp fc"]','div[class="stmp sds"]','div[class="low-price-in-last-month with-basket"]','span[class="cross-promotion-title"]','span[class="promotion-title"]','span[class="coupon-amount-text"]');

	// KOMİLİ AYÇİÇEK YAĞI

	trendyol_get_item('https://www.trendyol.com/komili-sivi-yaglar-x-b107759-c103982?os=1','span[class="prdct-desc-cntnr-ttl"]', 'span[class="prdct-desc-cntnr-name hasRatings"]','div[class="prc-box-dscntd"]','span[class="ratingCount"]','div[class="unit-info"]','div[class="stmp rd"]','div[class="stmp fc"]','div[class="stmp sds"]','div[class="low-price-in-last-month with-basket"]','span[class="cross-promotion-title"]','span[class="promotion-title"]','span[class="coupon-amount-text"]');

	// FELLAS GRANOLA

	trendyol_get_item('https://www.trendyol.com/fellas-musli-ve-granola-x-b110472-c144221','span[class="prdct-desc-cntnr-ttl"]', 'span[class="prdct-desc-cntnr-name hasRatings"]','div[class="prc-box-dscntd"]','span[class="ratingCount"]','div[class="unit-info"]','div[class="stmp rd"]','div[class="stmp fc"]','div[class="stmp sds"]','div[class="low-price-in-last-month with-basket"]','span[class="cross-promotion-title"]','span[class="promotion-title"]','span[class="coupon-amount-text"]');

	// ETİ GRANOLA

	trendyol_get_item('https://www.trendyol.com/eti-musli-ve-granola-x-b107752-c144221','span[class="prdct-desc-cntnr-ttl"]', 'span[class="prdct-desc-cntnr-name hasRatings"]','div[class="prc-box-dscntd"]','span[class="ratingCount"]','div[class="unit-info"]','div[class="stmp rd"]','div[class="stmp fc"]','div[class="stmp sds"]','div[class="low-price-in-last-month with-basket"]','span[class="cross-promotion-title"]','span[class="promotion-title"]','span[class="coupon-amount-text"]');

	

	// -------------------------------- ÇİÇEK SEPETİ ÜRÜNLER --------------------------------

	//SENSODYNE DİŞ MACUNU ÇİÇEK SEPETİ

	
 	ciceksepeti_get_item('https://www.ciceksepeti.com/sensodyne-dis-macunu?c=14463','p[class="products__item-title"]','div[class="price price--now"]','span[class="products-stars__review-count"]');

 	//NESQUIK SÜT ÇİÇEK SEPETİ

 	ciceksepeti_get_item('https://www.ciceksepeti.com/nesquik?c=13834','p[class="products__item-title"]','div[class="price price--now"]','span[class="products-stars__review-count"]');

 	// SELPAK TUVALET KAĞIDI ÇİÇEK SEPETİ

 	ciceksepeti_get_item('https://www.ciceksepeti.com/selpak?c=13739','p[class="products__item-title"]','div[class="price price--now"]','span[class="products-stars__review-count"]');

 	// COPIER BOND A4 FOTOKOPİ KAĞIDI

 	ciceksepeti_get_item('https://www.ciceksepeti.com/arama?c=12749&choice=2&query=copier%20bond','p[class="products__item-title"]','div[class="price price--now"]','span[class="products-stars__review-count"]');

 	// FAIRY BULAŞIK MAKİNESİ TABLETİ

 	ciceksepeti_get_item('https://www.ciceksepeti.com/fairy?c=13712','p[class="products__item-title"]','div[class="price price--now"]','span[class="products-stars__review-count"]');

 	// LİPTON ÇAY

 	ciceksepeti_get_item('https://www.ciceksepeti.com/lipton?c=12917','p[class="products__item-title"]','div[class="price price--now"]','span[class="products-stars__review-count"]');

	// ÇAYKUR ÇAY

 	ciceksepeti_get_item('https://www.ciceksepeti.com/arama?choice=1&df=2076380&query=%C3%A7ay','p[class="products__item-title"]','div[class="price price--now"]','span[class="products-stars__review-count"]');

 	// DOĞUŞ ÇAY

 	ciceksepeti_get_item('https://www.ciceksepeti.com/arama?query=do%C4%9Fu%C5%9F%20%C3%A7ay&qt=do%C4%9Fu%C5%9F%20%C3%A7ay&choice=1','p[class="products__item-title"]','div[class="price price--now"]','span[class="products-stars__review-count"]');

 	// JACOBS KAHVE

 	ciceksepeti_get_item('https://www.ciceksepeti.com/jacobs?c=13880','p[class="products__item-title"]','div[class="price price--now"]','span[class="products-stars__review-count"]');

    // BABY TURCO ISLAK MENDİL

    ciceksepeti_get_item('https://www.ciceksepeti.com/baby-turco?c=13578','p[class="products__item-title"]','div[class="price price--now"]','span[class="products-stars__review-count"]');

    // LA ROCHE POSAY GÜNEŞ KREMİ

    ciceksepeti_get_item('https://www.ciceksepeti.com/la-roche-posay?c=13557,14506','p[class="products__item-title"]','div[class="price price--now"]','span[class="products-stars__review-count"]');

    // PALMOLİVE DUŞ JELİ

    ciceksepeti_get_item('https://www.ciceksepeti.com/palmolive?c=14487','p[class="products__item-title"]','div[class="price price--now"]','span[class="products-stars__review-count"]');

    // YAYLA PİRİNÇ

    ciceksepeti_get_item('https://www.ciceksepeti.com/arama?query=yayla%20pirin%C3%A7&qt=yayla%20pirin%C3%A7&choice=2','p[class="products__item-title"]','div[class="price price--now"]','span[class="products-stars__review-count"]');

	// DURU PİRİNÇ

	ciceksepeti_get_item('https://www.ciceksepeti.com/arama?query=duru%20%20pirin%C3%A7&qt=duru%20%20pirin%C3%A7&choice=2','p[class="products__item-title"]','div[class="price price--now"]','span[class="products-stars__review-count"]');

	// TAT SALÇA

	ciceksepeti_get_item('https://www.ciceksepeti.com/salca?df=2076415','p[class="products__item-title"]','div[class="price price--now"]','span[class="products-stars__review-count"]');

	// ÖNCÜ SALÇA

	ciceksepeti_get_item('https://www.ciceksepeti.com/salca?df=2210207','p[class="products__item-title"]','div[class="price price--now"]','span[class="products-stars__review-count"]');

	// BEYPAZARI MADEN SUYU

	ciceksepeti_get_item('https://www.ciceksepeti.com/arama?query=beypazar%C4%B1%20maden%20suyu&qt=beypazar%C4%B1%20maden%20suyu&choice=2','p[class="products__item-title"]','div[class="price price--now"]','span[class="products-stars__review-count"]');

	// KIZILAY MADEN SUYU

	ciceksepeti_get_item('https://www.ciceksepeti.com/arama?query=k%C4%B1z%C4%B1lay%20maden%20suyu&qt=k%C4%B1z%C4%B1lay%20maden%20suyu&choice=2','p[class="products__item-title"]','div[class="price price--now"]','span[class="products-stars__review-count"]');

	// DOMESTOS ÇAMAŞIR SUYU

	ciceksepeti_get_item('https://www.ciceksepeti.com/domestos-camasir-suyu?qt=domestos%20%C3%A7ama%C5%9F%C4%B1r%20suyu&qcat=kategori-domestos%20%C3%A7ama%C5%9F%C4%B1r%20suyu&suggest=1%7Cdomestos%20%C3%A7a','p[class="products__item-title"]','div[class="price price--now"]','span[class="products-stars__review-count"]');

	// ACE ÇAMAŞIR SUYU

	ciceksepeti_get_item('https://www.ciceksepeti.com/arama?query=ace%20%C3%A7ama%C5%9F%C4%B1r%20suyu&qt=ace%20%C3%A7ama%C5%9F%C4%B1r%20suyu&choice=2','p[class="products__item-title"]','div[class="price price--now"]','span[class="products-stars__review-count"]');

	// NUTELLA SÜRÜLEBİLİR ÇİKOLATA

	ciceksepeti_get_item('https://www.ciceksepeti.com/arama?query=nutella%20&qt=nutella%20&choice=2','p[class="products__item-title"]','div[class="price price--now"]','span[class="products-stars__review-count"]');

	// TORKU SÜRÜLEBİLİR ÇİKOLATA

	ciceksepeti_get_item('https://www.ciceksepeti.com/arama?c=13778&choice=2&query=torku','p[class="products__item-title"]','div[class="price price--now"]','span[class="products-stars__review-count"]');

	// YUDUM AYÇİÇEK YAĞI

	ciceksepeti_get_item('https://www.ciceksepeti.com/arama?query=ay%C3%A7i%C3%A7ek%20ya%C4%9F%C4%B1%20yudum&qt=ay%C3%A7i%C3%A7ek%20ya%C4%9F%C4%B1%20yudum&choice=1','p[class="products__item-title"]','div[class="price price--now"]','span[class="products-stars__review-count"]'); 

	// KOMİLİ AYÇİÇEK YAĞI

	ciceksepeti_get_item('https://www.ciceksepeti.com/arama?query=ay%C3%A7i%C3%A7ek%20ya%C4%9F%C4%B1%20komili&qt=ay%C3%A7i%C3%A7ek%20ya%C4%9F%C4%B1%20komili&choice=1','p[class="products__item-title"]','div[class="price price--now"]','span[class="products-stars__review-count"]');

	// FELLAS GRANOLA

	ciceksepeti_get_item('https://www.ciceksepeti.com/granola?df=2145039','p[class="products__item-title"]','div[class="price price--now"]','span[class="products-stars__review-count"]');

	// ETİ GRANOLA

	ciceksepeti_get_item('https://www.ciceksepeti.com/arama?query=eti%20granola&qt=eti%20granola&choice=1','p[class="products__item-title"]','div[class="price price--now"]','span[class="products-stars__review-count"]');

 
	
	// -------------------------------- AMAZON ÜRÜNLER --------------------------------
	//SENSODYNE DİŞ MACUNU AMAZON
	
	amazon_get_item('https://www.amazon.com.tr/s?k=sensodyne+di%C5%9F+macunu&sprefix=sens%2Caps%2C545&ref=nb_sb_ss_ts-doa-p_1_4','span[class="a-size-base-plus a-color-base a-text-normal"]','span[class="a-offscreen"]','span[class="a-size-base a-color-secondary"]',  'span[class="a-size-base s-underline-text"]','div[class="a-row a-size-base a-color-secondary"]','div[class="a-row a-size-base a-color-secondary s-align-children-center"]','span[class="a-size-small s-variation-options-text s-variations-options-justify-content"]');


 	// NESQUIK SÜT AMAZON

 	amazon_get_item('https://www.amazon.com.tr/s?k=nesquik+s%C3%BCt&__mk_tr_TR=%C3%85M%C3%85%C5%BD%C3%95%C3%91&crid=2SBA7YTCWERGY&sprefix=nesuik+s%C3%BCt%2Caps%2C220&ref=nb_sb_noss','span[class="a-size-base-plus a-color-base a-text-normal"]','span[class="a-offscreen"]','span[class="a-size-base a-color-secondary"]',  'span[class="a-size-base s-underline-text"]','div[class="a-row a-size-base a-color-secondary"]','div[class="a-row a-size-base a-color-secondary s-align-children-center"]','span[class="a-size-small s-variation-options-text s-variations-options-justify-content"]');

 	// SELPAK TUVALET KAĞIDI AMAZON

 	amazon_get_item('https://www.amazon.com.tr/s?bbn=20991308031&rh=n%3A20991308031%2Cp_89%3ASelpak&dc&qid=1670066280&rnid=13493765031&ref=lp_20991308031_nr_p_89_1','span[class="a-size-base-plus a-color-base a-text-normal"]','span[class="a-offscreen"]','span[class="a-size-base a-color-secondary"]',  'span[class="a-size-base s-underline-text"]','div[class="a-row a-size-base a-color-secondary"]','div[class="a-row a-size-base a-color-secondary s-align-children-center"]','span[class="a-size-small s-variation-options-text s-variations-options-justify-content"]');

 	// COPIER BOND A4 FOTOKOPİ KAĞIDI

    amazon_get_item('https://www.amazon.com.tr/s?k=copier+bond+a4&rh=n%3A12467009031%2Cp_89%3ACopier+Bond&dc&ds=v1%3AgMmAXx2pk9cet1hGzBspK0BsgfWtbuJ9fyP0MRWNiqY&crid=N9UEOGBKPN0O&qid=1671124072&rnid=13493765031&sprefix=copier+%2Caps%2C260&ref=sr_nr_p_89_1','span[class="a-size-base-plus a-color-base a-text-normal"]','span[class="a-offscreen"]','span[class="a-size-base a-color-secondary"]',  'span[class="a-size-base s-underline-text"]','div[class="a-row a-size-base a-color-secondary"]','div[class="a-row a-size-base a-color-secondary s-align-children-center"]','span[class="a-size-small s-variation-options-text s-variations-options-justify-content"]');

	// FAIRY BULAŞIK MAKİNESİ TABLETİ AMAZON

	amazon_get_item('https://www.amazon.com.tr/s?bbn=20991272031&rh=n%3A20991272031%2Cp_89%3AFAIRY&dc&qid=1670067510&rnid=13493765031&ref=lp_20991272031_nr_p_89_1','span[class="a-size-base-plus a-color-base a-text-normal"]','span[class="a-offscreen"]','span[class="a-size-base a-color-secondary"]',  'span[class="a-size-base s-underline-text"]','div[class="a-row a-size-base a-color-secondary"]','div[class="a-row a-size-base a-color-secondary s-align-children-center"]','span[class="a-size-small s-variation-options-text s-variations-options-justify-content"]');

 	// ÇAYKUR ÇAY

 	amazon_get_item('https://www.amazon.com.tr/s?k=%C3%A7aykur&rh=n%3A22380529031&__mk_tr_TR=%C3%85M%C3%85%C5%BD%C3%95%C3%91&ref=nb_sb_noss','span[class="a-size-base-plus a-color-base a-text-normal"]','span[class="a-offscreen"]','span[class="a-size-base a-color-secondary"]',  'span[class="a-size-base s-underline-text"]','div[class="a-row a-size-base a-color-secondary"]','div[class="a-row a-size-base a-color-secondary s-align-children-center"]','span[class="a-size-small s-variation-options-text s-variations-options-justify-content"]');

 	// LİPTON ÇAY

 	amazon_get_item('https://www.amazon.com.tr/s?k=lipton+%C3%A7ay&rh=n%3A21680147031%2Cp_89%3ALipton&dc&ds=v1%3AGSatH0pxhxTqy9LhCGu4MCuW9r0yk9knI21CmhBSjcs&__mk_tr_TR=%C3%85M%C3%85%C5%BD%C3%95%C3%91&crid=2520CZQ0G8ZO1&qid=1673096776&rnid=13493765031&sprefix=lipton+%C3%A7ay+%2Caps%2C270&ref=sr_nr_p_89_1','span[class="a-size-base-plus a-color-base a-text-normal"]','span[class="a-offscreen"]','span[class="a-size-base a-color-secondary"]',  'span[class="a-size-base s-underline-text"]','div[class="a-row a-size-base a-color-secondary"]','div[class="a-row a-size-base a-color-secondary s-align-children-center"]','span[class="a-size-small s-variation-options-text s-variations-options-justify-content"]');
 	

 	// DOĞUŞ ÇAY

 	amazon_get_item('https://www.amazon.com.tr/s?k=do%C4%9Fu%C5%9F+%C3%A7ay&i=grocery&__mk_tr_TR=%C3%85M%C3%85%C5%BD%C3%95%C3%91&crid=PU49ONUQ6CW1&sprefix=do%C4%9Fu+%C3%A7ay%2Cgrocery%2C207&ref=nb_sb_noss','span[class="a-size-base-plus a-color-base a-text-normal"]','span[class="a-offscreen"]','span[class="a-size-base a-color-secondary"]',  'span[class="a-size-base s-underline-text"]','div[class="a-row a-size-base a-color-secondary"]','div[class="a-row a-size-base a-color-secondary s-align-children-center"]','span[class="a-size-small s-variation-options-text s-variations-options-justify-content"]');

 	

 	// JACOBS KAHVE

 	amazon_get_item('https://www.amazon.com.tr/s?bbn=22380655031&rh=n%3A22380655031%2Cp_89%3AJacobs&dc&qid=1670070385&rnid=13493765031&ref=lp_22380655031_nr_p_89_2','span[class="a-size-base-plus a-color-base a-text-normal"]','span[class="a-offscreen"]','span[class="a-size-base a-color-secondary"]',  'span[class="a-size-base s-underline-text"]','div[class="a-row a-size-base a-color-secondary"]','div[class="a-row a-size-base a-color-secondary s-align-children-center"]','span[class="a-size-small s-variation-options-text s-variations-options-justify-content"]');

 	// BABY TURCO ISLAK MENDİL

 	amazon_get_item('https://www.amazon.com.tr/s?bbn=12793195031&rh=n%3A12793195031%2Cp_89%3ABaby+Turco&dc&qid=1670070732&rnid=13493765031&ref=lp_12793195031_nr_p_89_2','span[class="a-size-base-plus a-color-base a-text-normal"]','span[class="a-offscreen"]','span[class="a-size-base a-color-secondary"]',  'span[class="a-size-base s-underline-text"]','div[class="a-row a-size-base a-color-secondary"]','div[class="a-row a-size-base a-color-secondary s-align-children-center"]','span[class="a-size-small s-variation-options-text s-variations-options-justify-content"]');

 	// NIVEA GÜNEŞ KREMİ

 	amazon_get_item('https://www.amazon.com.tr/s?bbn=12571856031&rh=n%3A12571856031%2Cp_89%3ANIVEA&dc&qid=1670071284&rnid=13493765031&ref=lp_12571856031_nr_p_89_0','span[class="a-size-base-plus a-color-base a-text-normal"]','span[class="a-offscreen"]','span[class="a-size-base a-color-secondary"]',  'span[class="a-size-base s-underline-text"]','div[class="a-row a-size-base a-color-secondary"]','div[class="a-row a-size-base a-color-secondary s-align-children-center"]','span[class="a-size-small s-variation-options-text s-variations-options-justify-content"]');

 	// PALMOLİVE DUŞ JELİ

 	amazon_get_item('https://www.amazon.com.tr/s?k=palmolive&i=beauty&rh=n%3A12571829031%2Cp_89%3APalmolive&dc&ds=v1%3AVEKS1neetYGH8F4Xb6rMRPejnbOugxQQwjHzhbUX%2B4E&__mk_tr_TR=%C3%85M%C3%85%C5%BD%C3%95%C3%91&qid=1670072549&rnid=13493765031&ref=sr_nr_p_89_1','span[class="a-size-base-plus a-color-base a-text-normal"]','span[class="a-offscreen"]','span[class="a-size-base a-color-secondary"]',  'span[class="a-size-base s-underline-text"]','div[class="a-row a-size-base a-color-secondary"]','div[class="a-row a-size-base a-color-secondary s-align-children-center"]','span[class="a-size-small s-variation-options-text s-variations-options-justify-content"]');

 	// YAYLA PİRİNÇ

 	amazon_get_item('https://www.amazon.com.tr/s?k=pirin%C3%A7&rh=n%3A21680147031%2Cp_89%3AYayla+G%C4%B1da&dc&ds=v1%3AipNTxumN%2BuByxaTAkjKy9djdeHcGRW58pHMojtgtstY&qid=1673094100&rnid=13493765031&sprefix=pirin%2Caps%2C298&ref=sr_nr_p_89_1','span[class="a-size-base-plus a-color-base a-text-normal"]','span[class="a-offscreen"]','span[class="a-size-base a-color-secondary"]',  'span[class="a-size-base s-underline-text"]','div[class="a-row a-size-base a-color-secondary"]','div[class="a-row a-size-base a-color-secondary s-align-children-center"]','span[class="a-size-small s-variation-options-text s-variations-options-justify-content"]');
 	
	// DURU PİRİNÇ

	amazon_get_item('https://www.amazon.com.tr/s?k=duru+pirin%C3%A7&i=grocery&__mk_tr_TR=%C3%85M%C3%85%C5%BD%C3%95%C3%91&crid=WDNWQCDUIFS0&sprefix=durupirin%C3%A7%2Cgrocery%2C420&ref=nb_sb_noss','span[class="a-size-base-plus a-color-base a-text-normal"]','span[class="a-offscreen"]','span[class="a-size-base a-color-secondary"]',  'span[class="a-size-base s-underline-text"]','div[class="a-row a-size-base a-color-secondary"]','div[class="a-row a-size-base a-color-secondary s-align-children-center"]','span[class="a-size-small s-variation-options-text s-variations-options-justify-content"]');

	// TAT SALÇA

	amazon_get_item('https://www.amazon.com.tr/s?k=sal%C3%A7a&rh=n%3A21680147031%2Cp_89%3ATat&dc&ds=v1%3AbJ0znChWVHkaD3ZGFMBaw5J%2Fpr7aYRjxzPO%2F7wqmMYU&__mk_tr_TR=%C3%85M%C3%85%C5%BD%C3%95%C3%91&crid=D1B6KOPPSQ15&qid=1673096231&rnid=13493765031&sprefix=sal%C3%A7a%2Caps%2C329&ref=sr_nr_p_89_1','span[class="a-size-base-plus a-color-base a-text-normal"]','span[class="a-offscreen"]','span[class="a-size-base a-color-secondary"]',  'span[class="a-size-base s-underline-text"]','div[class="a-row a-size-base a-color-secondary"]','div[class="a-row a-size-base a-color-secondary s-align-children-center"]','span[class="a-size-small s-variation-options-text s-variations-options-justify-content"]');

	// ÖNCÜ SALÇA

	amazon_get_item('https://www.amazon.com.tr/s?k=%C3%B6nc%C3%BC+sal%C3%A7a&__mk_tr_TR=%C3%85M%C3%85%C5%BD%C3%95%C3%91&crid=2WFKWBMTI6AC1&sprefix=%C3%B6nc%C3%BC+sal%C3%A7a%2Caps%2C214&ref=nb_sb_noss_1','span[class="a-size-base-plus a-color-base a-text-normal"]','span[class="a-offscreen"]','span[class="a-size-base a-color-secondary"]',  'span[class="a-size-base s-underline-text"]','div[class="a-row a-size-base a-color-secondary"]','div[class="a-row a-size-base a-color-secondary s-align-children-center"]','span[class="a-size-small s-variation-options-text s-variations-options-justify-content"]');

	// BEYPAZARI MADEN SUYU

	amazon_get_item('https://www.amazon.com.tr/s?k=beypazar%C4%B1+maden+suyu&rh=n%3A22523379031&__mk_tr_TR=%C3%85M%C3%85%C5%BD%C3%95%C3%91&ref=nb_sb_noss','span[class="a-size-base-plus a-color-base a-text-normal"]','span[class="a-offscreen"]','span[class="a-size-base a-color-secondary"]',  'span[class="a-size-base s-underline-text"]','div[class="a-row a-size-base a-color-secondary"]','div[class="a-row a-size-base a-color-secondary s-align-children-center"]','span[class="a-size-small s-variation-options-text s-variations-options-justify-content"]');


	// FREŞA MADEN SUYU

	amazon_get_item('https://www.amazon.com.tr/s?k=beypazar%C4%B1+maden+suyu&i=grocery&rh=n%3A22523379031%2Cp_89%3AFRE%C5%9EA&dc&ds=v1%3Aa87w2lFOI9K7UBcMeOCDNYya%2FbzWAS5z%2FqvVZVwVvXU&__mk_tr_TR=%C3%85M%C3%85%C5%BD%C3%95%C3%91&crid=1UK20IO2SNGH1&qid=1673096407&rnid=13493765031&sprefix=beypazar%C4%B1+maden+suyu%2Caps%2C225&ref=sr_nr_p_89_1','span[class="a-size-base-plus a-color-base a-text-normal"]','span[class="a-offscreen"]','span[class="a-size-base a-color-secondary"]',  'span[class="a-size-base s-underline-text"]','div[class="a-row a-size-base a-color-secondary"]','div[class="a-row a-size-base a-color-secondary s-align-children-center"]','span[class="a-size-small s-variation-options-text s-variations-options-justify-content"]');

	// DOMESTOS ÇAMAŞIR SUYU

	amazon_get_item('https://www.amazon.com.tr/s?k=%C3%A7ama%C5%9F%C4%B1r+suyu&rh=n%3A12466610031%2Cp_89%3ADomestos&dc&ds=v1%3Aydy2CU5W%2F2uhK%2BnLjY42ds%2BYG%2Btq2AxlmW79KJFukXA&qid=1673096448&rnid=13493765031&sprefix=%C3%A7ama%2Caps%2C515&ref=sr_nr_p_89_1','span[class="a-size-base-plus a-color-base a-text-normal"]','span[class="a-offscreen"]','span[class="a-size-base a-color-secondary"]',  'span[class="a-size-base s-underline-text"]','div[class="a-row a-size-base a-color-secondary"]','div[class="a-row a-size-base a-color-secondary s-align-children-center"]','span[class="a-size-small s-variation-options-text s-variations-options-justify-content"]');

	// ACE ÇAMAŞIR SUYU

	amazon_get_item('https://www.amazon.com.tr/s?k=%C3%A7ama%C5%9F%C4%B1r+suyu&i=hpc&bbn=12466610031&rh=n%3A12466610031%2Cp_89%3AACE&dc&qid=1673096499&rnid=13493765031&sprefix=%C3%A7ama%2Caps%2C515&ref=sr_nr_p_89_3&ds=v1%3AUPuQWRKBSXDmneOXfSBTEtRVWSHFQAyT%2FhaAKarn0Lw','span[class="a-size-base-plus a-color-base a-text-normal"]','span[class="a-offscreen"]','span[class="a-size-base a-color-secondary"]',  'span[class="a-size-base s-underline-text"]','div[class="a-row a-size-base a-color-secondary"]','div[class="a-row a-size-base a-color-secondary s-align-children-center"]','span[class="a-size-small s-variation-options-text s-variations-options-justify-content"]');

	// NUTELLA SÜRÜLEBİLİR ÇİKOLATA

	amazon_get_item('https://www.amazon.com.tr/s?k=nutella&__mk_tr_TR=%C3%85M%C3%85%C5%BD%C3%95%C3%91&crid=1CUZRXL3EVJ6O&sprefix=nutella+s%C3%BCr%C3%BClebilir+%C3%A7ikolata%2Caps%2C356&ref=nb_sb_noss','span[class="a-size-base-plus a-color-base a-text-normal"]','span[class="a-offscreen"]','span[class="a-size-base a-color-secondary"]',  'span[class="a-size-base s-underline-text"]','div[class="a-row a-size-base a-color-secondary"]','div[class="a-row a-size-base a-color-secondary s-align-children-center"]','span[class="a-size-small s-variation-options-text s-variations-options-justify-content"]');

	// TORKU SÜRÜLEBİLİR ÇİKOLATA

	amazon_get_item('https://www.amazon.com.tr/s?k=torku+banada&rh=n%3A21680147031%2Cp_89%3ATorku&dc&ds=v1%3A2%2BXYIJ4%2F3VW%2BrG4h6z0jIdo2thvHoGxdq7VRGkdw2A0&crid=21GVRRV862TYW&qid=1673096580&rnid=13493765031&sprefix=torku+b%2Caps%2C229&ref=sr_nr_p_89_3','span[class="a-size-base-plus a-color-base a-text-normal"]','span[class="a-offscreen"]','span[class="a-size-base a-color-secondary"]',  'span[class="a-size-base s-underline-text"]','div[class="a-row a-size-base a-color-secondary"]','div[class="a-row a-size-base a-color-secondary s-align-children-center"]','span[class="a-size-small s-variation-options-text s-variations-options-justify-content"]');


	// YUDUM AYÇİÇEK YAĞI

	amazon_get_item('https://www.amazon.com.tr/s?k=ay%C3%A7i%C3%A7ek+ya%C4%9F%C4%B1&rh=n%3A21680147031%2Cp_89%3AYudum&dc&ds=v1%3AaA3RooVv47JsH2RSClX7fdFO28MGSh8O5z8AyRxV7kI&qid=1673096598&rnid=13493765031&sprefix=ay%C3%A7i%C3%A7%2Caps%2C244&ref=sr_nr_p_89_2','span[class="a-size-base-plus a-color-base a-text-normal"]','span[class="a-offscreen"]','span[class="a-size-base a-color-secondary"]',  'span[class="a-size-base s-underline-text"]','div[class="a-row a-size-base a-color-secondary"]','div[class="a-row a-size-base a-color-secondary s-align-children-center"]','span[class="a-size-small s-variation-options-text s-variations-options-justify-content"]');


	// KOMİLİ AYÇİÇEK YAĞI

	amazon_get_item('https://www.amazon.com.tr/s?k=ay%C3%A7i%C3%A7e%C4%9Fi+ya%C4%9F%C4%B1&rh=n%3A21680147031%2Cp_89%3AKOMILI&dc&ds=v1%3Ax0oJuF39OX17xaR3W7%2B%2BjUv6BZWeWLYj43qt9v3kJ40&qid=1673096625&rnid=13493765031&sprefix=ay%C3%A7i%C3%A7%2Caps%2C253&ref=sr_nr_p_89_1','span[class="a-size-base-plus a-color-base a-text-normal"]','span[class="a-offscreen"]','span[class="a-size-base a-color-secondary"]',  'span[class="a-size-base s-underline-text"]','div[class="a-row a-size-base a-color-secondary"]','div[class="a-row a-size-base a-color-secondary s-align-children-center"]','span[class="a-size-small s-variation-options-text s-variations-options-justify-content"]');


	// FELLAS GRANOLA

	amazon_get_item('https://www.amazon.com.tr/s?k=granola&i=grocery&rh=n%3A22380665031%2Cp_89%3AFellas&dc&__mk_tr_TR=%C3%85M%C3%85%C5%BD%C3%95%C3%91&crid=1CTB422D07DBH&qid=1673096729&rnid=13493765031&sprefix=granola%2Caps%2C219&ref=sr_nr_p_89_3&ds=v1%3As2Mp%2F7tcdiFHKhWo9tlBD7nEQ19Lcj8cyMuTAThLkzE','span[class="a-size-base-plus a-color-base a-text-normal"]','span[class="a-offscreen"]','span[class="a-size-base a-color-secondary"]',  'span[class="a-size-base s-underline-text"]','div[class="a-row a-size-base a-color-secondary"]','div[class="a-row a-size-base a-color-secondary s-align-children-center"]','span[class="a-size-small s-variation-options-text s-variations-options-justify-content"]');

	// ETİ GRANOLA

	amazon_get_item('https://www.amazon.com.tr/s?k=eti+granola&rh=n%3A21680147031%2Cp_89%3AEti&dc&ds=v1%3ARBiC463Oc5fal8GqoQpyLpF80%2FHW570TZ2pGyw%2B8l4c&__mk_tr_TR=%C3%85M%C3%85%C5%BD%C3%95%C3%91&crid=1JGZ6WX8VADZO&qid=1673096678&rnid=13493765031&sprefix=eti+gran%2Caps%2C399&ref=sr_nr_p_89_1','span[class="a-size-base-plus a-color-base a-text-normal"]','span[class="a-offscreen"]','span[class="a-size-base a-color-secondary"]',  'span[class="a-size-base s-underline-text"]','div[class="a-row a-size-base a-color-secondary"]','div[class="a-row a-size-base a-color-secondary s-align-children-center"]','span[class="a-size-small s-variation-options-text s-variations-options-justify-content"]');
	
	// --------------------------------- N11 ÜRÜNLER -----------------------------------

 	// SENSODYNE DİŞ MACUNU N11 

 	n11_get_item('https://www.n11.com/arama?q=sensodyne','h3[class="productName"]','ins','span[class="unitPrice"]','span[class="ratingText"]','span[class="cargoBadgeText"]');

 	// İÇİM SÜT N11

 	n11_get_item('https://www.n11.com/arama?q=s%C3%BCt&m=%C4%B0%C3%A7im','h3[class="productName"]','ins','span[class="unitPrice"]','span[class="ratingText"]','span[class="cargoBadgeText"]');

 	// SELPAK TUVALET KAĞIDI N11

 	n11_get_item('https://www.n11.com/arama?q=tuvalet+ka%C4%9F%C4%B1d%C4%B1&m=Selpak','h3[class="productName"]','ins','span[class="unitPrice"]','span[class="ratingText"]','span[class="cargoBadgeText"]');

 	// COPIER BOND A4 FOTOKOPİ KAĞIDI N11

 	n11_get_item('https://www.n11.com/arama?q=a4+fotokopi+ka%C4%9F%C4%B1d%C4%B1&m=Copier+Bond','h3[class="productName"]','ins','span[class="unitPrice"]','span[class="ratingText"]','span[class="cargoBadgeText"]');

	// FAIRY BULAŞIK MAKİNESİ TABLETİ N11

	n11_get_item('https://www.n11.com/arama?q=bula%C5%9F%C4%B1k+makinesi+tableti&m=Fairy','h3[class="productName"]','ins','span[class="unitPrice"]','span[class="ratingText"]','span[class="cargoBadgeText"]');

 	// LİPTON ÇAY

 	n11_get_item('https://www.n11.com/supermarket?m=Lipton','h3[class="productName"]','ins','span[class="unitPrice"]','span[class="ratingText"]','span[class="cargoBadgeText"]');

 	// ÇAYKUR ÇAY

 	n11_get_item('https://www.n11.com/arama?q=%C3%A7ay&m=%C3%87aykur','h3[class="productName"]','ins','span[class="unitPrice"]','span[class="ratingText"]','span[class="cargoBadgeText"]');

 	// DOĞUŞ ÇAY

 	n11_get_item('https://www.n11.com/arama?q=%C3%A7ay&m=Do%C4%9Fu%C5%9F','h3[class="productName"]','ins','span[class="unitPrice"]','span[class="ratingText"]','span[class="cargoBadgeText"]');

 	// NESCAFE KAHVE

 	n11_get_item('https://www.n11.com/arama?q=kahve&m=Nescafe','h3[class="productName"]','ins','span[class="unitPrice"]','span[class="ratingText"]','span[class="cargoBadgeText"]');

 	// BABY TURCO ISLAK MENDİL

 	n11_get_item('https://www.n11.com/arama?q=%C4%B1slak+mendil&m=Baby+Turco','h3[class="productName"]','ins','span[class="unitPrice"]','span[class="ratingText"]','span[class="cargoBadgeText"]');

 	// LA ROCHE POSAY GÜNEŞ KREMİ

 	n11_get_item('https://www.n11.com/arama?q=g%C3%BCne%C5%9F+kremi&m=La+Roche+Posay','h3[class="productName"]','ins','span[class="unitPrice"]','span[class="ratingText"]','span[class="cargoBadgeText"]');

 	// PALMOLİVE DUŞ JELİ

 	n11_get_item('https://www.n11.com/arama?q=du%C5%9F+jeli&m=Palmolive','h3[class="productName"]','ins','span[class="unitPrice"]','span[class="ratingText"]','span[class="cargoBadgeText"]');
 	
 	// YAYLA PİRİNÇ

 	n11_get_item('https://www.n11.com/arama?q=pirin%C3%A7&m=Yayla','h3[class="productName"]','ins','span[class="unitPrice"]','span[class="ratingText"]','span[class="cargoBadgeText"]');

	// DURU PİRİNÇ

	n11_get_item('https://www.n11.com/arama?q=pirin%C3%A7&m=Duru','h3[class="productName"]','ins','span[class="unitPrice"]','span[class="ratingText"]','span[class="cargoBadgeText"]');

	// TAT SALÇA

	n11_get_item('https://www.n11.com/arama?q=sal%C3%A7a&m=Tat','h3[class="productName"]','ins','span[class="unitPrice"]','span[class="ratingText"]','span[class="cargoBadgeText"]');

	// ÖNCÜ SALÇA

	n11_get_item('https://www.n11.com/arama?q=sal%C3%A7a&m=%C3%96nc%C3%BC','h3[class="productName"]','ins','span[class="unitPrice"]','span[class="ratingText"]','span[class="cargoBadgeText"]');

	// BEYPAZARI MADEN SUYU

	n11_get_item('https://www.n11.com/arama?q=maden+suyu&m=Beypazar%C4%B1','h3[class="productName"]','ins','span[class="unitPrice"]','span[class="ratingText"]','span[class="cargoBadgeText"]');

	// KIZILAY MADEN SUYU

	n11_get_item('https://www.n11.com/arama?q=maden+suyu&m=K%C4%B1z%C4%B1lay','h3[class="productName"]','ins','span[class="unitPrice"]','span[class="ratingText"]','span[class="cargoBadgeText"]');

	// DOMESTOS ÇAMAŞIR SUYU

	n11_get_item('https://www.n11.com/arama?q=%C3%A7ama%C5%9F%C4%B1r+suyu&m=Domestos','h3[class="productName"]','ins','span[class="unitPrice"]','span[class="ratingText"]','span[class="cargoBadgeText"]');

	// ACE ÇAMAŞIR SUYU

	n11_get_item('https://www.n11.com/arama?q=%C3%A7ama%C5%9F%C4%B1r+suyu&m=Ace','h3[class="productName"]','ins','span[class="unitPrice"]','span[class="ratingText"]','span[class="cargoBadgeText"]');

	// NUTELLA SÜRÜLEBİLİR ÇİKOLATA

	n11_get_item('https://www.n11.com/arama?q=nutella&m=Nutella','h3[class="productName"]','ins','span[class="unitPrice"]','span[class="ratingText"]','span[class="cargoBadgeText"]');

	// TORKU SÜRÜLEBİLİR ÇİKOLATA

	n11_get_item('https://www.n11.com/arama?q=torku+banada','h3[class="productName"]','ins','span[class="unitPrice"]','span[class="ratingText"]','span[class="cargoBadgeText"]');

	// YUDUM AYÇİÇEK YAĞI

	n11_get_item('https://www.n11.com/supermarket/yaglar/aycicek-yagi?m=Yudum','h3[class="productName"]','ins','span[class="unitPrice"]','span[class="ratingText"]','span[class="cargoBadgeText"]');

	// KOMİLİ AYÇİÇEK YAĞI

	n11_get_item('https://www.n11.com/supermarket/yaglar/aycicek-yagi?m=Komili','h3[class="productName"]','ins','span[class="unitPrice"]','span[class="ratingText"]','span[class="cargoBadgeText"]');

	// FELLAS GRANOLA

	n11_get_item('https://www.n11.com/arama?q=granola&m=Fellas','h3[class="productName"]','ins','span[class="unitPrice"]','span[class="ratingText"]','span[class="cargoBadgeText"]');

	// ETİ GRANOLA

	n11_get_item('https://www.n11.com/arama?q=granola&m=Eti','h3[class="productName"]','ins','span[class="unitPrice"]','span[class="ratingText"]','span[class="cargoBadgeText"]');


	// -------------------------------- A101 ÜRÜNLER --------------------------------

	// SENSODYNE DİŞ MACUNU
	

	a101_get_item('https://www.a101.com.tr/kozmetik-kisisel-bakim/dis-macunu/?recommended_by=instant_search&recommended_code=sensod&attributes_integration_brand=2630','h3[class="name"]','span[class="current"]','span[class="badge"]');

	// PINAR SÜT 

	a101_get_item('https://www.a101.com.tr/market/sut/?recommended_by=instant_search&recommended_code=s%C3%BCt&attributes_integration_brand=2462','h3[class="name"]','span[class="current"]','span[class="badge"]');

	// SELPAK TUVALET KAĞIDI

	a101_get_item('https://www.a101.com.tr/list/?search_text=tuvalet%20ka%C4%9F%C4%B1d%C4%B1&personaclick_input_query=tuva&personaclick_search_query=tuvalet%20ka%C4%9F%C4%B1d%C4%B1&recommended_by=instant_search&recommended_code=tuva&attributes_integration_brand=2623','h3[class="name"]','span[class="current"]','span[class="badge"]');

	// COPIER BOND A4 FOTOKOPİ KAĞIDI 

	a101_get_item('https://www.a101.com.tr/kitap-kirtasiye/fotokopi-kagidi/?recommended_by=instant_search&recommended_code=fotokopi%20ka%C4%9F%C4%B1d%C4%B1','h3[class="name"]','span[class="current"]','span[class="badge"]');

	// FAIRY BULAŞIK MAKİNESİ TABLETİ 

	a101_get_item('https://www.a101.com.tr/market/bulasik-tableti-parlaticisi/?attributes_integration_brand=1697','h3[class="name"]','span[class="current"]','span[class="badge"]');

	// LİPTON ÇAY

	a101_get_item('https://www.a101.com.tr/market/cay/?attributes_integration_brand=2121','h3[class="name"]','span[class="current"]','span[class="badge"]');

	// NESCAFE KAHVE

	a101_get_item('https://www.a101.com.tr/market/kahve/?attributes_integration_brand=2300','h3[class="name"]','span[class="current"]','span[class="badge"]');

	// BABY TURCO ISLAK MENDİL

	a101_get_item('https://www.a101.com.tr/kozmetik-kisisel-bakim/islak-mendil/?recommended_by=instant_search&recommended_code=%C4%B1slak&attributes_integration_brand=3815','h3[class="name"]','span[class="current"]','span[class="badge"]');

	// DEAR BODY GÜNEŞ KREMİ

	a101_get_item('https://www.a101.com.tr/list/?search_text=g%C3%BCne%C5%9F%20kremi&personaclick_input_query=g%C3%BC&personaclick_search_query=g%C3%BCne%C5%9F%20kremi&recommended_by=instant_search&recommended_code=g%C3%BC&attributes_integration_brand=1493','h3[class="name"]','span[class="current"]','span[class="badge"]');

	// PALMOLİVE DUŞ JELİ

	a101_get_item('https://www.a101.com.tr/kozmetik-kisisel-bakim/dus-jeli/?attributes_integration_brand=2409','h3[class="name"]','span[class="current"]','span[class="badge"]');

	// YAYLA PİRİNÇ

	a101_get_item('https://www.a101.com.tr/market/pirinc/?attributes_integration_brand=3028','h3[class="name"]','span[class="current"]','span[class="badge"]');

	// TAT SALÇA

	a101_get_item('https://www.a101.com.tr/list/?search_text=tat%20sal%C3%A7a&personaclick_search_query=tat%20sal%C3%A7a&personaclick_input_query=tat%20sal%C3%A7a','h3[class="name"]','span[class="current"]','span[class="badge"]');

	// ÖNCÜ SALÇA

	a101_get_item('https://www.a101.com.tr/market/konserve-salca/?attributes_integration_brand=2392&attributes_integration_brand=4028','h3[class="name"]','span[class="current"]','span[class="badge"]');

	// BEYPAZARI MADEN SUYU

	a101_get_item('https://www.a101.com.tr/market/su-maden-suyu/?attributes_integration_brand=1227','h3[class="name"]','span[class="current"]','span[class="badge"]');
	
	// KIZILAY MADEN SUYU

	a101_get_item('https://www.a101.com.tr/market/su-maden-suyu/?attributes_integration_brand=2039','h3[class="name"]','span[class="current"]','span[class="badge"]');

	// DOMESTOS ÇAMAŞIR SUYU

	a101_get_item('https://www.a101.com.tr/market/camasir-suyu/?attributes_integration_brand=1546','h3[class="name"]','span[class="current"]','span[class="badge"]');

	// ACE ÇAMAŞIR SUYU

	a101_get_item('https://www.a101.com.tr/market/camasir-suyu/?attributes_integration_brand=1008','h3[class="name"]','span[class="current"]','span[class="badge"]');

	// TORKU SÜRÜLEBİLİR ÇİKOLATA

	a101_get_item('https://www.a101.com.tr/market/krem-cikolata-ezme/?attributes_integration_brand=3987&attributes_integration_brand=2824','h3[class="name"]','span[class="current"]','span[class="badge"]');

	// YUDUM AYÇİÇEK YAĞI

	a101_get_item('https://www.a101.com.tr/market/sivi-yag/?attributes_integration_brand=3049','h3[class="name"]','span[class="current"]','span[class="badge"]');

	// KOMİLİ AYÇİÇEK YAĞI
	

	
	
	
	trendyol_get_item('https://www.trendyol.com/sensodyne-dis-macunu-x-b101761-c101398','span[class="prdct-desc-cntnr-ttl"]', 'span[class="prdct-desc-cntnr-name hasRatings"]','div[class="prc-box-dscntd"]','span[class="ratingCount"]','div[class="unit-info"]','div[class="stmp rd"]','div[class="stmp fc"]','div[class="stmp sds"]','div[class="low-price-in-last-month with-basket"]','span[class="cross-promotion-title"]','span[class="promotion-title"]','span[class="coupon-amount-text"]');


*/
	ciceksepeti_get_item('https://www.ciceksepeti.com/arama?query=duru%20%20pirin%C3%A7&qt=duru%20%20pirin%C3%A7&choice=2','p[class="products__item-title"]','div[class="price price--now"]','span[class="products-stars__review-count"]');
	exit;
	ciceksepeti_get_item('https://www.ciceksepeti.com/domestos-camasir-suyu?qt=domestos%20%C3%A7ama%C5%9F%C4%B1r%20suyu&qcat=kategori-domestos%20%C3%A7ama%C5%9F%C4%B1r%20suyu&suggest=1%7Cdomestos%20%C3%A7a','p[class="products__item-title"]','div[class="price price--now"]','span[class="products-stars__review-count"]');
	exit;
	ciceksepeti_get_item('https://www.ciceksepeti.com/arama?query=duru%20%20pirin%C3%A7&qt=duru%20%20pirin%C3%A7&choice=2','p[class="products__item-title"]','div[class="price price--now"]','span[class="products-stars__review-count"]');

	exit;
	ciceksepeti_get_item('https://www.ciceksepeti.com/domestos-camasir-suyu?qt=domestos%20%C3%A7ama%C5%9F%C4%B1r%20suyu&qcat=kategori-domestos%20%C3%A7ama%C5%9F%C4%B1r%20suyu&suggest=1%7Cdomestos%20%C3%A7a','p[class="products__item-title"]','div[class="price price--now"]','span[class="products-stars__review-count"]');

	exit;
	trendyol_get_item('https://www.trendyol.com/sensodyne-dis-macunu-x-b101761-c101398','span[class="prdct-desc-cntnr-ttl"]', 'span[class="prdct-desc-cntnr-name hasRatings"]','div[class="prc-box-dscntd"]','span[class="ratingCount"]','div[class="unit-info"]','div[class="stmp rd"]','div[class="stmp fc"]','div[class="stmp sds"]','div[class="low-price-in-last-month with-basket"]','span[class="cross-promotion-title"]','span[class="promotion-title"]','span[class="coupon-amount-text"]');
	
	ciceksepeti_get_item('https://www.ciceksepeti.com/domestos-camasir-suyu?qt=domestos%20%C3%A7ama%C5%9F%C4%B1r%20suyu&qcat=kategori-domestos%20%C3%A7ama%C5%9F%C4%B1r%20suyu&suggest=1%7Cdomestos%20%C3%A7a','p[class="products__item-title"]','div[class="price price--now"]','span[class="products-stars__review-count"]');
	
	exit;

	a101_get_item('https://www.a101.com.tr/market/sivi-yag/?attributes_integration_brand=3049','h3[class="name"]','span[class="current"]','span[class="badge"]');
	exit;
	n11_get_item('https://www.n11.com/arama?q=pirin%C3%A7&m=Yayla','h3[class="productName"]','ins','span[class="unitPrice"]','span[class="ratingText"]','span[class="cargoBadgeText"]');
	exit;
	amazon_get_item('https://www.amazon.com.tr/s?k=sal%C3%A7a&rh=n%3A21680147031%2Cp_89%3ATat&dc&ds=v1%3AbJ0znChWVHkaD3ZGFMBaw5J%2Fpr7aYRjxzPO%2F7wqmMYU&__mk_tr_TR=%C3%85M%C3%85%C5%BD%C3%95%C3%91&crid=D1B6KOPPSQ15&qid=1673096231&rnid=13493765031&sprefix=sal%C3%A7a%2Caps%2C329&ref=sr_nr_p_89_1','span[class="a-size-base-plus a-color-base a-text-normal"]','span[class="a-offscreen"]','span[class="a-size-base a-color-secondary"]',  'span[class="a-size-base s-underline-text"]','div[class="a-row a-size-base a-color-secondary"]','div[class="a-row a-size-base a-color-secondary s-align-children-center"]','span[class="a-size-small s-variation-options-text s-variations-options-justify-content"]');

	exit;
	ciceksepeti_get_item('https://www.ciceksepeti.com/domestos-camasir-suyu?qt=domestos%20%C3%A7ama%C5%9F%C4%B1r%20suyu&qcat=kategori-domestos%20%C3%A7ama%C5%9F%C4%B1r%20suyu&suggest=1%7Cdomestos%20%C3%A7a','p[class="products__item-title"]','div[class="price price--now"]','span[class="products-stars__review-count"]');
	
	


	
	ciceksepeti_get_item('https://www.ciceksepeti.com/domestos-camasir-suyu?qt=domestos%20%C3%A7ama%C5%9F%C4%B1r%20suyu&qcat=kategori-domestos%20%C3%A7ama%C5%9F%C4%B1r%20suyu&suggest=1%7Cdomestos%20%C3%A7a','p[class="products__item-title"]','div[class="price price--now"]','span[class="products-stars__review-count"]');
	
trendyol_get_item('https://www.trendyol.com/sensodyne-dis-macunu-x-b101761-c101398','span[class="prdct-desc-cntnr-ttl"]', 'span[class="prdct-desc-cntnr-name hasRatings"]','div[class="prc-box-dscntd"]','span[class="ratingCount"]','div[class="unit-info"]','div[class="stmp rd"]','div[class="stmp fc"]','div[class="stmp sds"]','div[class="low-price-in-last-month with-basket"]','span[class="cross-promotion-title"]','span[class="promotion-title"]','span[class="coupon-amount-text"]');
	exit;
	
	
	
	
	
	

	
	
	n11_get_item('https://www.n11.com/arama?q=pirin%C3%A7&m=Yayla','h3[class="productName"]','ins','span[class="unitPrice"]','span[class="ratingText"]','span[class="cargoBadgeText"]');
	



?>
