<?php
require_once('functions.php');


require_once "config.php";

?>

<?=template_header('Place Order')?>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<div class="container" style="margin-top:5%;">
    <div class="row">
        <div class="jumbotron" style="box-shadow: 2px 2px 4px #000000;">
            <h2 class="text-center">YOUR ORDER HAS BEEN RECEIVED</h2>
            <h3 class="text-center">Thank you for your payment</h3>

            <p class="text-center">You will receive an order confirmation email with details of your order and a link to track your process.</p>
            <center><div class="btn-group" style="margin-top:50px;">
                    <a href="index.php" class="btn btn-lg btn-warning">Return to Homepage</a>
                </div></center>
        </div>
    </div>
</div>

<?=template_footer()?>
