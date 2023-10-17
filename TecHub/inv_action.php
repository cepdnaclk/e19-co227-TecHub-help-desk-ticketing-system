<?php
    try{
        $conn = new PDO("mysql:host=localhost;dbname=techub","root","");

        foreach($_POST['Inv_des'] as $key => $value){
            $sql = "INSERT INTO invoice(InvoiceDes, Amount) VALUES (:Inv_des, :Amountt)";
            $stmt = $conn->prepare($sql);
            
            $stmt -> execute([
                "Inv_des"=> $value,
                "Amountt"=> $_POST["Amountt"][$key],
            ]);
        }
        echo "Invoice created successfully.";
    } 
    catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }

    /* print_r($_POST); */
?>

