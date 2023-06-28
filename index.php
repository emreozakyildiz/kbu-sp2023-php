
<?php include_once("lib/simple_html_dom.php"); ?>

<?php include("get_products/get_products_CICEKSEPETI.php"); ?>
<?php include("get_products/get_products_AMAZON.php"); ?>
<?php include("get_products/get_products_A101.php"); ?>
<?php include("get_products/get_products_TRENDYOL.php"); ?>
<?php include("get_products/get_products_N11.php"); ?>


<?php
//$a = php index.php
//Write-Output $a
?>

<?php
// Database connection configuration
$servername = "localhost";
$username = "root";
$password = "anan123";
$database = "prs";
$table = "product";

$keywords = ["nutella çikolata", "yayla pirinç"];
$products_CICEKSEPETI = array();
$products_AMAZON = array();
$products_A101 = array();
$products_TRENDYOL = array();
$products_N11 = array();

try {
    // Create a PDO instance
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    
    // Set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
	// Fetch items from the database
    $get_ciceksepeti_products = "SELECT * FROM $table WHERE marketid = 1";
    $stmt = $conn->query($get_ciceksepeti_products);
    
    // Check if any items are found
    if ($stmt->rowCount() > 0) {
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$products_CICEKSEPETI[] = $row["product_name"];
        }
    } else {
        echo "Ciceksepeti Database is Empty.". "\r\n";
    }

	// Fetch items from the database
    $get_amazon_products = "SELECT * FROM $table WHERE marketid = 2";
    $stmt = $conn->query($get_amazon_products);
    
    // Check if any items are found
    if ($stmt->rowCount() > 0) {
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$products_AMAZON[] = $row["product_name"];
        }
    } else {
        echo "Amazon Database is Empty.". "\r\n";
    }

    // Fetch items from the database
    $get_a101_products = "SELECT * FROM $table WHERE marketid = 3";
    $stmt = $conn->query($get_a101_products);
    
    // Check if any items are found
    if ($stmt->rowCount() > 0) {
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$products_A101[] = $row["product_name"];
        }
    } else {
        echo "A101 Database is Empty.". "\r\n";
    }

	// Fetch items from the database
    $get_trendyol_products = "SELECT * FROM $table WHERE marketid = 4";
    $stmt = $conn->query($get_trendyol_products);
    
    // Check if any items are found
    if ($stmt->rowCount() > 0) {
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$products_TRENDYOL[] = $row["product_name"];
        }
    } else {
        echo "Trendyol Database is Empty.". "\r\n";
    }

	// Fetch items from the database
    $get_n11_products = "SELECT * FROM $table WHERE marketid = 5";
    $stmt = $conn->query($get_n11_products);
    
    // Check if any items are found
    if ($stmt->rowCount() > 0) {
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$products_N11[] = $row["product_name"];
        }
    } else {
        echo "N11 Database is Empty.". "\r\n";
    }

	
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage() . "\r\n";
}

foreach($keywords as $keyword){
	
	echo '-------------------------CICEKSEPETI---------------------' . "\r\n";
	get_products_CICEKSEPETI($conn, $keyword, $products_CICEKSEPETI);
	echo '-------------------------AMAZON---------------------' . "\r\n";
	//get_products_AMAZON($conn, $keyword, $products_AMAZON);
	echo '-------------------------A101---------------------' . "\r\n";
	get_products_A101($conn, $keyword, $products_A101);
	echo '-------------------------TRENDYOL---------------------' . "\r\n";
	get_products_TRENDYOL($conn, $keyword, $products_TRENDYOL);
	echo '-------------------------N11---------------------' . "\r\n";
	get_products_N11($conn, $keyword, $products_N11);
	
	exit;
}

$conn = null;
?>
