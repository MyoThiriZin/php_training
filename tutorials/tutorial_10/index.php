<?php

include 'connection.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="design.css">
    <title>Login Page</title>
</head>
<body>
    <div class="container">
        <div class="form-sec">
            <h2>Login Here</h2>
            <form method="post" action="login.php">
                <?php if (isset($_GET['error'])) { ?>
                <p style="color:red;"><?php echo $_GET['error']; ?></p>
                <?php } ?>

                <input type="email" placeholder="Enter email" name="email"><br><br>
                <input type="password" placeholder="Enter password" name="password"><br><br>
                <input type="submit" name="login" value="Login"><br><br>
                <div><a href="forgot.php">Forgot password?</a></div>
                <div><p>Are you a new user? Please <a href="signup.php">register</a></p></div>
            </form>
        </div>
    </div>
</body>
</html>