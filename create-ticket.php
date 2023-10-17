<?php 
include('authentication_cus.php');
include('header-back-create-ticket.php');
?>

<?php 
$customerId= $_SESSION['auth_user']['userid'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create a new Ticket</title>
    <link rel="stylesheet" href="login.css">
</head>
<style>

</style>

<body>
    <main class="form-signin w-400 m-auto">
        <form action="table-data-add.php" method="post">
            <h1 class="h3 mb-3 fw-bold">Create a Ticket</h1>
            
            <div class="form-floating">
                <input type="text" class="form-control" id="userID" name="userID" value="<?php echo $customerId ?>" disabled required>
                <label for="userID">Customer ID</label>
            </div>
            <div class="form-floating">
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter a valid email address" required>
                <label for="floatingRegno">Email Address</label>
            </div>
            <div class="form-floating">
                <select class="form-select" name="repairment" id="repairment" required>
                    <option value="" selected disabled>- - - - - - - - - Select a issue type - - - - - - - - - </option>
                    <option value="Motherboard and CPU issues">Motherboard and CPU issues </option>
                    <option value="Memory(RAM) problems">Memory(RAM) problems</option>
                    <option value="Graphics card and Display issues">Graphics card and Display issues</option>
                    <option value="Storage Device Problems">Storage Device Problems</option>
                    <option value="Power Supply Unit and Power Issues">Power Supply Unit and Power Issues</option>
                    <option value="Connectivity Issues">Connectivity Issues</option>
                    <option value="Physical damages">Physical damages</option>
                    <option value="Other">Other</option>
                </select>
                <label for="repairment">Issue Type</label>
            </div>
            <div class="form-floating">
                <input type="tel" class="form-control" name="telephone" id="floatingTel" placeholder="0123456789" required>
                <label for="floatingTel">Mobile Number</label>
            </div>
            <div class="form-floating">
                <textarea name="description" class="form-control" placeholder="Explain your requirment" id="floatingTextarea" style="height: 80px;"></textarea>
                <label for="floatingTextarea">Description</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="0" id="prioritylevel" name="prioritylevel">
                <label class="form-check-label" for="prioritylevel">
                    Mark as a priority
                </label>
            </div>

            <button class="btn btn-primary w-100 py-2 btn-css" type="submit">Create Ticket</button>

        </form>
    </main>
    
    <script>
    const checkbox = document.getElementById('prioritylevel');

    checkbox.addEventListener('change', function() {
        if (this.checked) {
            this.value = "1"; // Set the value to 1 when checked
        } else {
            this.value = "0"; // Set the value to 0 when not checked
        }
    });
    </script>

</body>
</html>