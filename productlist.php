<?php
//Starts the session
session_start();
?>

<?php 
include 'includes/connection.php'; 


$sql = "SELECT product.*, category.category_name 
        FROM product 
        JOIN category ON product.category_id = category.category_id";
$stmt = $conn->prepare($sql);
$stmt->execute();
$products = $stmt->fetchAll();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Product List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body class="bg-light">
<body>
    <?php include 'includes/header.php' ?>
    <?php include 'includes/navigation.php' ?>

    <br>
    <h1 class="text-center">Items For Sale</h1>
    <br> 

    <main class="container mt-4">
        <div class="row">
            <?php foreach ($products as $product) : ?>
                <div class="col-lg-4 mb-4">

                    <!--create a div class for the products add a shadow to it-->
                    <div class="card shadow">

                        <!--displays the image associated with the product-->
                        <?php
                        $imageData = base64_encode($product["product_image"]);
                        echo "<img src='" . $product['product_image']."' class='card-img-top img-fluid' style='height: 350px;'>"; 
                        ?>

                        <div class="card-body">
                            <h5 class="card-title"><?= $product["product_name"] ?></h5>
                            <p class="card-text text-muted"><?= $product["product_description"] ?></p>
                            <hr>
                            <p class="card-text h6">Price: £<?= $product["product_price"] ?></p>
                            <p class="card-text h6">Category: <?= $product["category_name"] ?></p>

                             <!-- message seller button -->
                            <form action="messageprocess.php" method="post">
                            <input type="hidden" name="message_id" value="">
                            <input type="submit" class="btn btn-dark" value="Message Seller">
                            </form>  

                            <br>

                            <!--Add to basket button linked to addtobasket.php -->
                            <form action="addtobasket.php" method="POST">
                            <!--create hidden input field that sets the name as product_id retreiving the id from the $product array-->
                            <input type="hidden" name="product_id" value="<?= $product['product_id'] ?>">
                            <input type="submit" class="btn btn-dark" value="Add to Basket">
                            </form>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>



    <?php include 'includes/footer.php' ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>