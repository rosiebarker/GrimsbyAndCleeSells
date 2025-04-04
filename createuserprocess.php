<?php 
include 'includes/connection.php'; 

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$dateofbirth = $_POST['dateofbirth'];
$email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];

try 
{
    // SQL statement to create a new user
    $sql = "INSERT INTO user (user_fname, user_lname, user_dob, user_email, user_username, user_password) 
            VALUES (:firstname, :lastname, :dateofbirth, :email, :username, :password)";

    $stmt = $conn->prepare($sql);

    $stmt->bindValue(':firstname', $firstname, PDO::PARAM_STR);
    $stmt->bindValue(':lastname', $lastname, PDO::PARAM_STR);
    $stmt->bindValue(':dateofbirth', $dateofbirth);
    $stmt->bindValue(':email', $email, PDO::PARAM_STR);
    $stmt->bindValue(':username', $username, PDO::PARAM_STR);
    $stmt->bindValue(':password', $password, PDO::PARAM_STR);

    $runstatementuser = $stmt->execute();
    $userId = $conn->lastInsertId();

    if ($runstatementuser) {
        // SQL statement to create a new account
        $accountSql = "INSERT INTO account (user_id) VALUES (:userId)";

        $accountStmt = $conn->prepare($accountSql);
        $accountStmt->bindValue(':userId', $userId, PDO::PARAM_INT);

        $runStatementaccount = $accountStmt->execute();

        if ($runStatementaccount) {
            // Redirect to success page when the user signs up
            header('Location: signupsuccess.php');
            exit();
        } else {
            echo "Error creating account";
        }
    } else {
        echo "Error creating user";
    }
} catch (PDOException $e) {
    echo "An error happened";
    echo $e->getMessage();
}
?>