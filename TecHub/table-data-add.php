<?php
    include 'db_conn.php';
    include('authentication_cus.php');

    date_default_timezone_set('Asia/Kolkata');

    $userid= $_SESSION['auth_user']['userid'];
    $email = $_POST["email"];
    $issuetype = $_POST["repairment"];
    $phoneNo = $_POST["telephone"];
    
    if (isset($_POST["prioritylevel"]) && $_POST["prioritylevel"] == "1") {
        $priority = 1; // Set priority to 1 when checked
    } else {
        $priority = 0; // Set priority to 0 when not checked or not provided
    }
    
    $description = $_POST["description"];
    $openDate = date("Y-m-d H:i:s");
    $closedDate = null;
    $status= "Pending";

    if(mysqli_connect_errno()){
        die("connection error: ".mysqli_connect_error());
    }

    $sql = "INSERT INTO ticket (OpenDateTime, ClosedDateTime,TStatus,TPriority, ticketDes, customerEmail, IssueType, Telephone,CustomerId)
    
    VALUES(?,?,?,?,?,?,?,?,?)
    ";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        die(mysqli_error($conn));
    }
    mysqli_stmt_bind_param($stmt,"sssissssi",
    $openDate,
    $closedDate,
    $status,
    $priority,
    $description,
    $email,
    $issuetype,
    $phoneNo,
    $userid
    
    


    
);
if (mysqli_stmt_execute($stmt)) {
    // Commit the transaction
    mysqli_commit($conn);
    echo "Record saved successfully.";
    // header("Location: send-email.php");\
    header("Location: customer-home.php");
} else {
    // Rollback the transaction if there's an error
    mysqli_rollback($conn);
    echo "Error: " . mysqli_stmt_error($stmt);
}

// Close the prepared statement and the database connection
mysqli_stmt_close($stmt);


mysqli_close($conn);