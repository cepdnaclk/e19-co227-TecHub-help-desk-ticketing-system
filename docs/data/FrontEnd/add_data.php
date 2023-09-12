<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create a new ticket</title>
</head>
<body>
    <div class="title">
        Create a new Ticket
    </div>
    <div class="content">
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Get form data
            $userID = $_POST["user_id"];
            $name = $_POST["name"];
            $email = $_POST["email"];
            $repairmentType = $_POST["repairment"];
            $telephone = $_POST["telephone"];
            $isPriority = isset($_POST["checkbox"]) ? "Yes" : "No";
            $subject = $_POST["subject"];
            $notes = $_POST["notes"];

            // Display the submitted data
            echo "<p class='topic'>User-ID: $userID</p>";
            echo "<p class='topic'>Name: $name</p>";
            echo "<p class='topic'>Email: $email</p>";
            echo "<p class='topic'>Repairment Type: $repairmentType</p>";
            echo "<p class='topic'>Telephone: $telephone</p>";
            echo "<p class='topic'>Priority: $isPriority</p>";
            echo "<p class='topic'>Subject: $subject</p>";
            echo "<p class='topic'>Notes: $notes</p>";
        }
        ?>
    </div>
    <a href="ticket-creation.html">Go back</a> <!-- Replace "your_form_page.html" with the actual path to your form page -->
</body>
</html>
