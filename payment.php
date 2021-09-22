<?php
require_once('functions.php');


require_once "config.php";

$user = htmlspecialchars($_SESSION["username"]);

$products_in_cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : array();
$products = array();
$subtotal = 0.00;

if ($products_in_cart) {

    $array_to_question_marks = implode(',', array_fill(0, count($products_in_cart), '?'));
    $stmt = $pdo->prepare('SELECT * FROM products WHERE id IN (' . $array_to_question_marks . ')');

    $stmt->execute(array_keys($products_in_cart));
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach ($products as $product) {
        $subtotal += (float)$product['price'] * (int)$products_in_cart[$product['id']];
    }
}

if (isset($_POST['payment'])) {




    $username =  htmlspecialchars($_SESSION["username"]);
    $prod = htmlspecialchars($_SESSION["product_id"]);
    $name =($_SESSION["name"]);
    $total = "$subtotal";

    $amount = 100;
    $previousValues = array();
    for ($i = 0; $i < $amount; $i++){
        $rand = rand(0,9999);
        while (in_array($rand, $previousValues)){
            $rand = rand(0, 9999);
        }
        $previousValues[] = $rand;
        $today = date("Ymd");
        $unique = $today.$rand;
    }

    $today1 = date("Y-m-d-h-i-s");

    $str1 = date("Ymdhms") + 1;
    $sql = "INSERT INTO customerorder (customerid, username , Total_Bill, order_number,Date)
  VALUES ('$prod', '$username','$total', '$unique','$today1')";
    $stmt = $pdo->prepare($sql);

    $stmt->execute();



    header('Location: index.php?page=placeorder');
    exit;
}


?>
<?=template_header('Payment')?>

<head>
    <meta charset="UTF-8">
    <title>Payment</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href=" https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css
   <link rel="stylesheet" href=" https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
   <link rel="stylesheet" href=" https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    <link rel="script" href="payment.js">
    <link rel="stylesheet" href="payment.css">
    <style>
        body{background-color: white;}
    </style>
</head>

    <div class="container-fluid px-0" id="bg-div">

        <div class="row justify-content-center">
            <div class="col-lg-9 col-12">
                <div class="card card0">
                    <div class="d-flex" id="wrapper">
                        <!-- Sidebar -->
                        <div class="bg-light border-right" id="sidebar-wrapper">
                            <div class="sidebar-heading pt-5 pb-4"><strong>PAY WITH</strong></div>
                            <div class="list-group list-group-flush"> <a data-toggle="tab" href="#menu1" id="tab1" class="tabs list-group-item bg-light">

                                </a> <a data-toggle="tab" href="#menu2" id="tab2" class="tabs list-group-item active1">
                                    <div class="list-div my-2">
                                        <div class="fa fa-credit-card"></div> &nbsp;&nbsp; Card
                                    </div>
                                </a> <a data-toggle="tab" href="#menu3" id="tab3" class="tabs list-group-item bg-light">

                                </a> </div>
                        </div> <!-- Page Content -->
                        <div id="page-content-wrapper">
                            <div class="row pt-3" id="border-btm">
                                <div class="col-4"> <button class="btn btn-success mt-4 ml-3 mb-3" id="menu-toggle">
                                        <div class="bar4"></div>
                                        <div class="bar4"></div>
                                        <div class="bar4"></div>
                                    </button> </div>
                                <div class="col-8">
                                    <div class="row justify-content-right">
                                        <div class="col-12">
                                            <p class="mb-0 mr-4 mt-4 text-right"> </p>
                                        </div>
                                    </div>
                                    <div class="row justify-content-right">
                                        <div class="col-12">
                                            <p class="mb-0 mr-4 text-right">Pay <span class="top-highlight">$ <?php echo $subtotal?></span> </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="text-center" id="test">Pay</div>
                            </div>
                            <div class="tab-content">

                                <form action="index.php?page=payment" method="post">

                                <div id="menu2" class="tab-pane in active">
                                    <div class="row justify-content-center">
                                        <div class="col-11">
                                            <div class="form-card">
                                                <h3 class="mt-0 mb-4 text-center">Enter your card details to pay</h3>
                                                <form onsubmit="event.preventDefault()">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="input-group"> <input type="text" id="cr_no" placeholder="0000 0000 0000 0000" minlength="19" maxlength="19" required> <label>CARD NUMBER</label> </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <div class="input-group"> <input type="text" name="exp" id="exp" placeholder="MM/YY" minlength="5" maxlength="5" required> <label>CARD EXPIRY</label> </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="input-group"> <input type="password" name="cvcpwd" placeholder="&#9679;&#9679;&#9679;" class="placeicon" minlength="3" maxlength="3" required> <label>CVV</label> </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                    </div>
                                                        <div class="col-md-12">  <input type="submit" value="Payment "  name="payment"  class="btn btn-success placeicon"> </div>
                                                    </form>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


<?=template_footer()?>
