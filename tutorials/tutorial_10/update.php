<?php

include 'connection.php';

$id = $_GET['edit'];
if (isset($_POST['update_user'])) {
    $user_name = $_POST['user_name'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    if (empty($user_name) || empty($password) || empty($email) || empty($phone)) {
        $message[] = 'Please fill out all!';    
    } else {
        $update_data = "UPDATE users SET user_name='$user_name', password='$password', email='$email', phone='$phone'  WHERE id = '$id'";
        $upload = mysqli_query($conn, $update_data);

        if ($upload) {
            header('location:signup.php');
        } else {
            $message[] = 'Please fill out all!'; 
        }
    }
};

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="design.css">
    <title>Update Password</title>
</head>
<body>

    <?php
    if (isset($message)) {
        foreach ($message as $message) {
            echo '<span class="message">'.$message.'</span>';
        }
    }
    ?>

    <div class="container">
        <?php
            $select = mysqli_query($conn, "SELECT * FROM users WHERE id = '$id'");
            while ($row = mysqli_fetch_assoc($select)) {
        ?>
        
        <form action="" method="post" enctype="multipart/form-data">
            <h3 class="title">update the user information</h3>
            <input type="text" name="user_name" value="<?php echo $row['user_name']; ?>" placeholder="enter username">
            <input type="password" name="password" value="<?php echo $row['password']; ?>" placeholder="enter password">
            <input type="email" name="email" value="<?php echo $row['email']; ?>" placeholder="enter email">
            <input type="text" name="phone" value="<?php echo $row['phone']; ?>" placeholder="enter phone number">
            <input type="submit" value="update user information" name="update_user">
            <a class="goback-btn" href="signup.php">go back!</a>
        </form>
        
        <?php }; ?>
    </div>
</body>
</html>