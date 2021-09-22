<?php
function pdo_connect_mysql(): PDO
{
 
    $DATABASE_HOST = 'localhost';
    $DATABASE_USER = 'root';
    $DATABASE_PASS = '';
    $DATABASE_NAME = 'shoppingcart';
    try {
    	return new PDO('mysql:host=' . $DATABASE_HOST . ';dbname=' . $DATABASE_NAME . ';charset=utf8', $DATABASE_USER, $DATABASE_PASS);
    } catch (PDOException $exception) {
    	
    	exit('Failed to connect to database!');
    }
}

function template_header($title)
{
$num_items_in_cart = isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0;


    if(session_status()!=PHP_SESSION_ACTIVE)
        session_start();


if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

    $user = htmlspecialchars($_SESSION["username"]);
    echo <<<EOT
<!DOCTYPE html>

<html>
	<head>
		<meta charset="utf-8">
		<title>$title</title>
    <link rel="stylesheet" type="text/css" href="style1.css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
		
	</head>
	<body>
        <header >
            <div class="content-wrapper" >
                <a href="index.php"><h1 >Easyday Grocery Store </h1></a>
                <nav >
                    <a href="index.php">Home</a>
                    
                    <a href="index.php?page=products" id="product">Products</a>
                            
                                                <a href="orderhistory.php" >Transaction History</a>
                                                                            <a href="resetpassword.php" >Reset Password</a>

                                                 <a href="logout.php" >Logout</a>
                    
                <div class="link-icons">
                    <a href="index.php?page=cart">
						<i class="fas fa-shopping-cart"></i>
						<span>$num_items_in_cart</span>
					 </a>
					
                </div>
                <div class="link-icons">
                 <div style="text-align: end">

                      <b style="text-transform:uppercase"> $user  </b>
                    
                           
                       
                    
                </div>
            </div>
        </header>
        
        <main>
EOT;
}

function template_footer() {
$year = date('Y');
echo <<<EOT
        </main>
        <footer>
            <div class="content-wrapper">
                <p>&copy; $year, Easyday grocery store</p>
            </div>
        </footer>
        <script src="script.js"></script>
    </body>
</html>
EOT;
}

