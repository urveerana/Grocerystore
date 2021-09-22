<?php
require_once('functions.php');
session_start();


require_once "config.php";





?>
<?=template_header('TransactionHistory')?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap 4 Striped Table</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        .bs-example{
            margin: 20px;
        }
    </style>
</head>
    <div class="bs-example">
        <table class="table table-striped">    <thead>
    <tr>
        <th>Customer_Number</th>
        <th>Total_Bill</th>
        <th>Order_number</th>
        <th>Date Of Purchase</th>


    </tr>
    </thead>
    <tbody>
    <?php
    $username =  htmlspecialchars($_SESSION["username"]);

    $sqlSelect1 = "SELECT * FROM `customerorder` WHERE  username = '$username'";
    $resultSelect1 = mysqli_query($link, $sqlSelect1);
    if (mysqli_num_rows($resultSelect1) > 0) {

        while ($rowSelect1 = mysqli_fetch_assoc($resultSelect1)) {
            ?>
            <tr>
                <td><?php echo $rowSelect1['customerid']; ?></td>
                <td><?php echo ucfirst($rowSelect1['Total_Bill']); ?></td>
                <td><?php echo $rowSelect1['order_number']; ?></td>
                <td><?php echo $rowSelect1['Date']; ?></td>



            </tr>
            <?php
        }
    }
    else{
        echo "<tr style='color:orange;'><td colspan='8'>No Order...!</td></tr>";
    }
    ?>

    </tbody>
</table>
    </div>
<div><a  href="index.php"><p style="text-align:center">Back To HomePage</p> </a>
</div>

<?=template_footer()?>
