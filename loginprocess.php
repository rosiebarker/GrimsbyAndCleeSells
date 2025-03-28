<?php 
include 'includes/connection.php'; 

//Starts the session
session_start();

echo $username = $_POST['username'];
echo "<br>";
echo $password = $_POST['password'];

try {
    // Statement to check the users details
    $sql = "SELECT * FROM user LEFT JOIN account on account.user_id = user.user_id WHERE user_username = :username AND user_password = :uspassword";
    $stmt = $conn->prepare($sql);

    $stmt->bindValue(':username', $username, PDO::PARAM_STR);
    $stmt->bindValue(':uspassword', $password, PDO::PARAM_STR);

    $stmt->execute();
    $user = $stmt->fetchAll(PDO::FETCH_ASSOC);

    //Checks if the user is in the database
    if ($stmt->rowCount() > 0) {
        //User is authenticated, store the username in the session
        echo $_SESSION['username'] = $username;
        
        //create foreach loop to go through the user row, and save the account id
        foreach ($user as $account) {
            echo $_SESSION['accountid'] = $account['account_id'];
        }
        
        //Direct to the account page
        header('Location: account.php');
        exit();
    } else {
        //Invalid user details
        echo "Invalid User Details Try again";
    }
} catch (PDOException $e) {
    echo "Error";
    echo $e->getMessage();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
<body class="bg-light">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>userloginprocess</title>
</head>
<body>
    
</body>
</html>