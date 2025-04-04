<?php
//Starts the session
session_start();
?>


<!doctype html>
<html lang="en">
<head>
<body class="bg-light">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My Account</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>

<?php include 'includes/header.php' ?>

<?php include 'includes/navigation.php' ?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6 text-center shadow">
            <br>
                <h2>Account Details</h2>
                <br>
                <form method="POST" action="accountprocess.php">
                    
                    <!--account type-->
                    <div class="mb-3">
                        <label for="account_type" class="form-label">Account Type</label>
                        <select class="form-select" id="Account_type" name="account_type" required>
                            <option value="" disabled selected hidden style="text-align: center;">Select Account Type</option>
                            <option value="User">User</option>
                            <option value="Administrator">Administrator</option>
                        </select>
                    </div>

                    <script>
                        document.getElementById('category_id').addEventListener('click', function () { //functionality for hiding the first dropdown
                            this.options[0].style.display = 'none';
                        });
                    </script>    

                    <br>

                    <!--address -->
                    <div class="form-group text-center">
                        <label for="accountaddress">Account Address</label>
                        <input type="text" class="form-control text-center" id="accountaddress" name="account_address" placeholder="Address">
                    </div>

                    <br>

                    <!--postcode -->
                    <div class="form-group text-center">
                        <label for="accountpostcode">Account Postcode</label>
                        <input type="text" class="form-control text-center" id="accountpostcode" name="account_postcode" placeholder="Postcode">
                    </div>

                    <br>

                    <!--town-->
                    <div class="form-group text-center">
                        <label for="accounttown">Account Town</label>
                        <input type="text" class="form-control text-center" id="accounttown" name="account_town" placeholder="Town">
                    </div>

                    <br>

                    <!--submit form-->
                    <button type="submit" class="btn btn-dark">Submit</button>
                </form>
                
                <br>
        </div>
    </div>
</div>



<?php include 'includes/footer.php' ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>