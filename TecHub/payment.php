<?php 

include('db_conn.php');
include('authentication_cus.php');
include('header-back.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>payment Gateway</title>
</head>
<body>
    <div class="container">
        <h2 class="m-4 p-3 titleSt">Payment Gateway</h2>
                <button class="btn btn-primary w-50 py-2 btn-css" name="reg-btn" onclick="paymentGateway();">Make Payment</button>
    </div>
    <script src="script.js"></script>
    <script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>
</body>
</html>