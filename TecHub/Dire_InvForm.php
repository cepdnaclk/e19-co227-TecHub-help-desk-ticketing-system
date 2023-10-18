<?php 
    include 'db_conn.php';
    include('authentication_director.php');
    include('header.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <style>
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

    <title>Invoice Details</title>
</head>
<body>
    <section>
        <h2 class="m-4 p-3 titleSt">Invoice Details</h2>
        <div class="container">
            <div class="row">
                <?php       
                    $status = "Repair Completed";
                    $sql1 = "SELECT * FROM ticket WHERE TStatus=?";
                    $stmt = mysqli_prepare($conn, $sql1);
                    mysqli_stmt_bind_param($stmt, "s", $status);
                    mysqli_stmt_execute($stmt);
                    $result1 = mysqli_stmt_get_result($stmt);
                    $resultcheck1 = mysqli_num_rows($result1);
            
                    if ($resultcheck1 > 0) {
                        $trow = mysqli_fetch_assoc($result1);
                        $ticketID = $trow['TicketId'];                                      

                        $sql = "SELECT * FROM invoice";
                        $result = mysqli_query($conn,$sql);

                        if($result){
                            $num = mysqli_num_rows($result);
                            if($num>0){
                                while($row = mysqli_fetch_assoc($result)){
                                    echo '<div class="col-lg-3 mb-3">';
                                    echo '<div class="card">';
                                    echo '<div class="card-border">';
                                    echo '<div class="card-body p-3 cardSt">';
                                    echo '<p class="card-text">Invoice ID: '.$row['InvoiceId'].'</p>';                                  
                                    echo '<p class="card-text">Description: '.$row['InvoiceDes'].'</p>';
                                    echo '<p class="card-text">Amount: '.$row['Amount'].'</p>';
                                    echo '<form action="Dire_updateStatus.php" method = "post">';
                                    echo '<input type="hidden" name="ticketId" value="'. $ticketID .'">';
                                    echo '<button class="btn btn-success m-2 border rounded border-2" name="accept">Accept</button>'; 
                                    echo '<button class="btn btn-danger m-2 border rounded border-2" name="reject">Reject</button>'; 
                                    echo '</form>';                                    
                                    echo '</div>';
                                    echo '</div>';
                                    echo '</div>';
                                    echo '</div>';
                                }
                            } else {
                                echo '<div class="col-12"><h4 class="m-4">No Invoices.</h4></div>';
                            }
                        } else {
                            echo '<div class="col-12"><h4 class="m-4">Error fetching data.</h4></div>';
                        }
                    } else {
                        echo '<div class="col-12"><h4 class="m-4">No invoices for Pending Tickets.</h4></div>';
                    }
                ?>
            </div>
        </div>
    </section>
    <script>
        document.addEventListener('DOMContentLoaded', function (e) {
            var acceptButtons = document.querySelectorAll('.btn-success');
            var rejectButtons = document.querySelectorAll('.btn-danger');

            acceptButtons.forEach(function (button) {
                button.addEventListener('click', function (event) {
                    var card = this.closest('.card');
                    card.style.display = 'none';
                    //event.preventDefault();
                });
            });

            rejectButtons.forEach(function (button) {
                button.addEventListener('click', function () {
                    var card = this.closest('.card');
                    card.style.display = 'none';
                    //event.preventDefault();
                });
                button.preventDefault();
            });
            //e.preventDefault();
        });
    </script>
</body>
</html>
