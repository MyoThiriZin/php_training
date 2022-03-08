<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>login</title>
</head>
<body>
<?php
session_start();

include 'connection.php';

if (isset($_POST['email']) && isset($_POST['password'])) {
  
    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $email = validate($_POST['email']);
    $password = validate($_POST['password']);

    if (empty($password) || empty($email)) {
        header("Location: index.php?error=please fill out all");
        die;    
    } else {
    $sql = "select * from users where email='$email' AND password='$password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);

        if ($row['email'] === $email && $row['password'] === $password) {
            $_SESSION['email'] = $row['email'];
            $_SESSION['user_name'] = $row['user_name'];
            $_SESSION['id'] = $row['id'];

            header("Location: home.php");
            die; 
        } else {
            header("Location: index.php?error=Incorrect email or password");
            die;     
        }
    } else {
        header("Location: index.php?error=Incorrect email or password");
        die;     
    }
    }
} else {
header("Location: index.php");
die;
}
?>
</body>
</html>


