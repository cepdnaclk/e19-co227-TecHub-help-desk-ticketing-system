<?php
try {
    $conn = new PDO("mysql:host=localhost;dbname=techub", "root", "");

    foreach ($_POST['Inv_des'] as $key => $value) {
        $sql = "INSERT INTO invoice(InvoiceDes, Amount) VALUES (:Inv_des, :Amountt)";
        $stmt = $conn->prepare($sql);

        $stmt->execute([
            "Inv_des" => $value,
            "Amountt" => $_POST["Amountt"][$key],
        ]);

        // Retrieve the generated invoice ID
        $invoiceId = $conn->lastInsertId();

        // Update the ticket table with the invoice ID
        $sql = "UPDATE ticket SET InvoiceId = :invoiceId WHERE TicketId = :ticketID";
        $stmt = $conn->prepare($sql);

        $stmt->execute([
            "invoiceId" => $invoiceId,
            "ticketID" => $_POST['ticketID'][$key],
        ]);
    }
    echo "Invoices created and ticket table updated successfully.";
} 
catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>
