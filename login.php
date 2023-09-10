<?php
    include 'connection.php';

    session_start();

    if(isset($_POST['submit'])){
        $email = $_POST['email'];
        $password = md5($_POST['password']);

        $select_users = mysqli_query($conn,"SELECT * FROM `techofficer` where Email = '$email' AND TOPassword = '$password'") or die('query failed!');

        if(mysqli_num_rows($select_users)>0){
            $row_user = mysqli_fetch_assoc($select_users);

            $_SESSION['user_name'] = $row_user['TechOfficerName'];
            $_SESSION['user_email'] = $row_user['Email'];
            $_SESSION['user_id'] = $row_user['TechOfficerID'];
            header('home.php');
        }else{
            $message[] = 'Incorrect email or password!';
        }
    }
?>

<html>
    <head>
        <title> Login page</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>

        <?php
            if(isset($message)){
                foreach($message as $new_message){
                    echo '
                        <div class = "message">
                        <span>'.$new_message.'</span>
                        </div>
                    ';
                }
            }
        ?>

        <form action="" method="post">
            <h2>Login Now</h2>
            <label for="email">Email </label><br>
            <input type="email" name="email" placeholder = "Enter your email" required class = "box"><br>
            <label for="password">Password </label><br>
            <input type="password" name="password" placeholder = "Enter your password" required class = "box"><br>
            <input type="submit" name = "submit" value="Login" class = "btn">
        </form>
    </body>
</html>