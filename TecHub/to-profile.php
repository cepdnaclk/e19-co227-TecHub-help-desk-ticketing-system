<?php
    include 'db_conn.php';
    include('authentication_to.php');
    include('header-to-back.php');
?>
<?php 
$user_id= $_SESSION['auth_user']['userid'];
?>
<?php if (isset($_SESSION['status'])) { ?>
    <p class="status"><?php echo $_SESSION['status']; 
    unset($_SESSION['status']) ?></p>
    <?php }
?>

<html>
    <head>
        <title>My Profile</title>
        <style>
            *{
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }
            .section{
                width: 22%;
                height: 100vh;
                float: left;
            }
            #section1{
                background-color: #add8e6;
                
            }
            #section1::after {
                content: "";
                display: table;
                clear: both;
            }
            #section1 p{
                font-weight: bold;
                font-size: 18px;
                margin-left: 25px;
                margin-right: 25px;
                padding-bottom: 10px;
            }
            #section1 img {
                width: 200px;
                height: 220px;
                border-radius: 50%;
                
            }
            #section2 .box-container{
            
            display: flex;
            grid-template-columns: repeat(auto-fit, minmax(25rem, 1fr));
            gap:1.5rem;
            max-width: 1200px;
            margin: 50px 50px auto;
            align-items: flex-start;
            float: left;
            }

            #section2 .box-container .box{
            border-radius: .5rem;
            padding:2rem;
            background-color: #E4F1FF;
            box-shadow: var(--box-shadow);
            border:var(--border);
            text-align: center;
            border: none;
            width: 350px;
            height: 200px;
            }

            #section2 .box-container .box h5{
            font-size: 26px;
            color:black; 
            }

            #section2 .box-container .box p{
            margin-top: 1.5rem;
            padding:1.5rem;
            background-color: var(--light-bg);
            color:black;
            font-size: 26px;
            border-radius: .5rem;
            border:var(--border);
            
            }
            .dp{
                display: flex;
                flex-direction: column;
                align-items: center;
                margin-top: 30px;
                margin-bottom: 30px;

            }
            .btn{
                margin-top: 30px;
                display: flex;
                flex-direction: column;
                align-items: center;
            }
            button{
                background-color: transparent;
                font-weight: bold;
                border-width: 0.5px;
                font-size: 16px;
                padding: 5px 5px;
                border-radius: 5px;
            }
            
        </style>
    </head>
    <body>
        <?php
            $data_query = mysqli_query($conn,"SELECT * FROM `techofficer` WHERE TechOfficerID = '$user_id'");
            $profile_data = mysqli_fetch_assoc($data_query);
        
        ?>

        <div class="section" id="section1">
            <div class="dp">
                <img src="images/dp1.jpg"  alt="Profile Photo">
            </div>
            
            <p>ID:<span><?php echo $profile_data['TechOfficerID'];?></span></p>
            <p>Name: <span><?php echo $profile_data['TechOfficerName'];?></span></p>    
            <p>Email: <span><?php echo $profile_data['Email'];?></span></p>
            <p>Contact Number: <span><?php echo $profile_data['ContactNo'];?></span></p>
            <p>Registration Number: <span><?php echo $profile_data['RegNo'];?></span></p>
            <div class="btn">
                <a href="update_details.php"><button> Update Details</button></a>
            </div> 
        </div>
        <div class="section" id="section2">
            <div class="box-container">

                <div class="box">
                <?php
                    $select_In_Progress = mysqli_query($conn, "SELECT COUNT(*) FROM `ticket` WHERE TStatus = 'In Progress' AND TechOfficerID = '$user_id'") or die('query failed');
                    if($select_In_Progress){
                        $count = mysqli_fetch_row($select_In_Progress)[0];    
                    }
                ?>
                <h5><?php echo $count; ?></h5>
                <p>Ticket In Progress</p>
                </div>

                <div class="box">
                <?php
                    $select_Due_Payment = mysqli_query($conn, "SELECT COUNT(*) FROM `ticket` WHERE TStatus = 'Due Payment'") or die('query failed');
                    if($select_Due_Payment){
                        $count = mysqli_fetch_row($select_Due_Payment)[0];    
                    }
                ?>
                <h5><?php echo $count; ?></h5>
                <p>Ticket With Due Payments</p>
                </div>

                <div class="box">
                <?php
                    $select_completed = mysqli_query($conn, "SELECT COUNT(*) FROM `ticket` WHERE TStatus = 'completed'") or die('query failed');
                    if($select_completed){
                        $completed_count = mysqli_fetch_row($select_completed)[0];
                    }
                ?>
                <h5><?php echo $completed_count; ?></h5>
                <p>Completed Tickets</p>
                </div>

            </div>
        </div>
        
    </body>
</html>