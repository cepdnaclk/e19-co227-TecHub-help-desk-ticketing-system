<?php
try {
    $conn = new PDO("mysql:host=localhost;dbname=techub", "root", "");

    foreach ($_POST['Inv_des'] as $key => $value) {
        $status= "pending";
        $sql = "INSERT INTO invoice(InvoiceDes, Amount, InvoiceStatus) VALUES (:Inv_des, :Amountt, :status)";
        $stmt = $conn->prepare($sql);

        $stmt->execute([
            "Inv_des" => $value,
            "Amountt" => $_POST["Amountt"][$key],
            "status"=>$status,
        ]);

        // Retrieve the generated invoice ID
        $invoiceId = $conn->lastInsertId();
        $ticketStatus = "inAcPen";
        // Update the ticket table with the invoice ID
        $sql = "UPDATE ticket SET InvoiceId = :invoiceId, TStatus = :status  WHERE TicketId = :ticketID";
        $stmt = $conn->prepare($sql);

        $stmt->execute([
            "invoiceId" => $invoiceId,
            "ticketID" => $_POST['ticketID'][$key],
            "status" =>$ticketStatus,
        ]);
    }
    header('Location: to-home.php');
} 
catch (Exception $e) {
    echo "Error: " . $e->getMessage();
    
}
?>
