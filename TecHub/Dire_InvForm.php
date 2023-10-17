<?php 
    include 'Connect227.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
    <!-- Include your CSS and other head elements here -->

    <style>
        body{
            background-color: #8abae6;
        }
        .searchBtn{
            background-color: #022b51;
            color: white;
        }
        .titleSt{
            color: #053B50;
            text-align: center;
        }
        .cardSt{
            background-color: #FAF1E4;
        }
        
    </style>

    <title>Document</title>
</head>
<body>
    <section>
        <h2 class="m-4 p-3 titleSt">Invoice Details</h2>
        <pre></pre>

        <div class="container">
            <div class="row">
                <?php                
                    $sql = "SELECT * FROM invoice";
                    $result = mysqli_query($conn,$sql);

                    if($result){
                        $num = mysqli_num_rows($result);
                        if($num>0){
                            while($row = mysqli_fetch_assoc($result)){
                                echo '<div class="col-lg-3 mb-3">';
                                echo '<div class="card">';
                                echo '<div class="card-border" style="background-color: #083e71;">';
                                echo '<div class="card-body p-3 cardSt">';
                                echo '<h5 class="card-title text-center mb-2">Invoice No: '.$row['Inv_num'].' </h5>';
                                echo '<p class="card-text">Invoice ID: '.$row['InvoiceId'].'</p>';                                  
                                echo '<p class="card-text">Description: '.$row['Inv_des'].'</p>';
                                echo '<p class="card-text">Amount: '.$row['Amount'].'</p>';
                                echo '<button class="btn btn-success m-2 border rounded border-2" id="accept">Accept</button>'; 
                                echo '<button class="btn btn-danger m-2 border rounded border-2">Reject</button>'; 
                                echo '</div>';
                                echo '</div>';
                                echo '</div>';
                                echo '</div>';
                            }
                        }else{
                            echo '<div class="col-12"><h4 class="m-4">No Invoices.</h4></div>';
                        }
                    } else {
                        echo '<div class="col-12"><h4 class="m-4">Error fetching data.</h4></div>';
                    }
                ?>
            </div>
        </div>
    </section>
</body>
</html>
