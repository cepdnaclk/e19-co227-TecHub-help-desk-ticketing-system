<?php
    try{
        $conn = new PDO("mysql:host=localhost;dbname=techub","root","");

        foreach($_POST['Inv_num'] as $key => $value){
            $sql = "INSERT INTO invoice(Inv_num, Inv_des, Amount) VALUES (:Inv_num, :Inv_des, :Amountt)";
            $stmt = $conn->prepare($sql);
            
            $stmt -> execute([
                "Inv_num"=> $value,
                "Inv_des"=> $_POST["Inv_des"][$key],                                
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

