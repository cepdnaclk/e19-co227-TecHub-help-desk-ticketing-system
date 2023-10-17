<?php
    include 'db_conn.php';
  
    if (isset($_POST['ticketId'])) {
        $ticketID = $_POST['ticketId'];
    } else {
        echo 'Error fetching ID';
        exit(); // Exit the script if ticketId is not set
    }

    if(isset($_POST['accept'])){
        $status= 'In Progress';

        $sql = "UPDATE ticket SET TStatus=? WHERE TicketId=?";
        $stmt = mysqli_stmt_init($conn);
    }

    if(isset($_POST['reject'])){
        $status= 'Completed';

        $sql = "UPDATE ticket SET TStatus=? WHERE TicketId=?";
        $stmt = mysqli_stmt_init($conn);
    }


    if (!mysqli_stmt_prepare($stmt, $sql)) {
        die(mysqli_error($conn));
    }
    mysqli_stmt_bind_param($stmt, "si", $status, $ticketID);
    if (mysqli_stmt_execute($stmt)) {
        mysqli_commit($conn);
        header("Location: Dire_InvForm.php");
        exit(); // Exit the script after redirecting
    } else {
        mysqli_rollback($conn);
        echo "Error: " . mysqli_stmt_error($stmt);
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
?>
