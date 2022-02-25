<?php
session_start();

include 'connection.php';

if (isset($_POST['signup'])) {
    $user_name = $_POST['user_name'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $age = $_POST['age'];

    if (empty($user_name) || empty($password) || empty($email) || empty($phone) || empty($age)) {
        $message[] = 'Please fill out all';
    } else {
        $insert = "INSERT INTO users(user_name, password, email, phone, age) VALUES('$user_name', '$password', '$email', '$phone', '$age')";
        $upload = mysqli_query($conn,$insert);
        if ($upload) {
            $message[] = 'New user added successfully';
        } else {
            $message[] = 'Could not add the user';
        }
    }
};

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM users WHERE id = $id");
    header('location:signup.php');
};

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="design.css">
    <title>Signup Page</title>
</head>
<body>
    <div class="container">
        <div class="form-sec">
            <h3>Signup</h3>
            <?php
            if (isset($message)) {
                foreach ($message as $message) {
                    echo '<span class="message" style="color:red">'.$message.'</span>';
                }
            }
            ?>
            <form action="signup.php" method="post" enctype="multipart/form-data">
                <input type="text" placeholder="Enter username" name="user_name"><br><br>
                <input type="password" placeholder="Enter password" name="password"><br><br>
                <input type="email" placeholder="Enter email" name="email"><br><br>
                <input type="text" placeholder="Enter phone number" name="phone"><br><br>
                <input type="text" placeholder="Enter age" name="age"><br><br>
                <input type="submit" name="signup" value="Signup"><br><br>
                <div>
                    <p>Already have an account? <a href="index.php">Login</a></p>
                </div>
            </form>
        </div>
    </div>
</body>
</html>