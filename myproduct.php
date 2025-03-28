<?php
include 'includes/connection.php';

//starts session
session_start();
$_SESSION['username'];
$_SESSION['accountid'];



//check if the username is in the session
if (isset($_SESSION['username'])) {#
        //get the products associated with the signed in user
         $sql = "SELECT product.*, category.category_name 
            FROM product 
            JOIN category ON product.category_id = category.category_id
            WHERE product.account_id = :accountid";
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':accountid', $_SESSION['accountid']);
        $stmt->execute();
        $products = $stmt->fetchAll();

        $loggedinaccountid = $_SESSION['accountid'];
    
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My Products</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body class="bg-light">

<?php include 'includes/header.php'; ?>
<?php include 'includes/navigation.php'; ?>

<main class="container mt-4">
    <?php if (isset($products) && !empty($products)) : ?>
        <div class="row">
            <?php foreach ($products as $product) : ?>
                <div class="col-lg-4 mb-4">
                    <div class="card shadow">
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

                            <!-- Delete Product button -->
                            <form action="deleteproductprocess.php" method="post">
                                <input type="hidden" name="product_id" value="<?= $product['product_id'] ?>">
                                <button type="submit" class="btn btn-danger">Delete Product</button>
                            </form>

                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else : ?>
        <h2><p class="text-center">You have no products listed</p></h2>
    <?php endif; ?>
</main>

<!--button to listing item for sale-->
<div class="d-flex justify-content-center mt-4">
    <button type="button" class="btn btn-dark btn-lg" data-bs-toggle="modal" data-bs-target="#listitem">
        List Item(s) for Sale
    </button>
</div>



<!--modal to list items for sale-->
<div class="modal fade" id="listitem" tabindex="-1" aria-labelledby="listitemLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header text-center">
            <h5 class="modal-title w-100" id="listitem">List an item for Sale</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <!--form to submit to the process page -->
                <form action="includes/upload.php" method="post" enctype="multipart/form-data">
                    
                    <!--productname-->
                    <div class="mb-3">
                        <label for="product_name" class="form-label">Product Name</label>
                        <input type="text" class="form-control" id="product_name" name="product_name" required>
                    </div>

                    <!-- description-->
                    <div class="mb-3">
                        <label for="product_description" class="form-label">Description</label>
                        <input type="text" class="form-control" id="product_description" name="product_description" required>
                    </div>

                    <!--category-->
                    <div class="mb-3">
                        <label for="category_id" class="form-label">Category</label>
                        <select class="form-select" id="category_id" name="category_id">
                            <option value="" disabled selected hidden>Select Category</option> <!--hide the first option of the dropdown-->
                            <option value="1">T-Shirts</option>
                            <option value="3">Shoes</option>
                            <option value="2">Jeans</option>
                            <option value="4">Jackets</option>
                            <option value="6">Coats</option>
                            <option value="5">Accessories</option>
                        </select>
                    </div>

                    <!--Function to hide first option-->
                    <script>
                        document.getElementById('category_id').addEventListener('click', function () {
                            this.options[0].style.display = 'none';
                        });
                    </script>     
                    

                    <!-- price-->
                    <div class="mb-3">
                        <label for="product_price" class="form-label">Price</label>
                        <div class="input-group">
                            <span class="input-group-text">£</span>
                            <input type="number" min="1" step="0.01" class="form-control" id="product_price" name="product_price" required>
                        </div>
                    </div>

                    <!--quantity-->
                    <div class="mb-3">
                        <label for="product_quantity" class="form-label">Quantity</label>
                        <input type="number" class="form-control" id="product_quantity" name="product_quantity" required>
                    </div>

                    <!--product image-->
                    <div class="mb-3">
                        <label for="product_image" class="form-label">Upload Image</label>
                        <input type="file" class="form-control" id="product_image" name="product_image" accept="image/*" required>
                    </div>

                    <button type="submit" class="btn btn-success ms-auto">Submit</button>
                    <button type="button" class="btn btn-danger me-auto" data-bs-dismiss="modal">Close</button>
                </form>
            </div>
        </div>
    </div>
</div>

</main>






<?php include 'includes/footer.php'; ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>