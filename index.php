<?php
//Starts the session
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Grimsby and Clee Sells</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="bg-light">

<?php include 'includes/header.php'; ?>
<?php include 'includes/navigation.php'; ?>

<main>
        <div class="row">
            <div class="col-md-8 offset-md-2 text-center">
                <br>
                <h1 class="display-4 mb-4"><strong>Welcome to Grimsby & Clee Sells</strong></h1>
                <h4> Discover the best deals in the Grimsby and Cleethorpes area. Your go-to platform for buying and selling.<h4>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-6 offset-md-3">
                <img class="img-fluid rounded" src="images/grimsbyandcleesells.png" alt="Grimsby & Clee Sells" style="height: 350px;">
            </div>
</main>

<?php include 'includes/footer.php'; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>