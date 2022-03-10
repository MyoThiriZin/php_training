<?php

session_start();
$error = array();

include 'connection.php';
include 'mail.php';

$mode="enter_email";
if (isset($_GET['mode'])) {
    $mode = $_GET['mode'];
}

if (count($_POST)>0) {
    switch ($mode) {
        case 'enter_email':
        $email = $_POST['email'];

        if (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
            $error[] = "Please enter a valid email";
        } elseif (!valid_email($email)) {
            $error[] = "That email was not found";
        } else {
            $_SESSION['forgot']['email'] = $email;
            send_email($email);
            header("Location: forgot.php?mode=enter_code");
            die;
        }
        break;

        case 'enter_code':
        $code = $_POST['code'];
        $result = is_code_correct($code);
        if ($result == "the code is correct") {
            $_SESSION['forgot']['code'] = $code;
            header("Location: forgot.php?mode=enter_password");
            die;
        } else {
            $error[] = $result;
        }
        break;

        case 'enter_password':
        $password = $_POST['password'];
        $password2 = $_POST['password2'];

        if ($password !== $password2) {
            $error[] = "Passwords do not match";
        } elseif (!isset($_SESSION['forgot']['email']) || !isset($_SESSION['forgot']['code'])) {
            header("Location: forgot.php");
            die;
        } else {
            save_password($password);
            if (isset($_SESSION['forgot'])) {
            unset($_SESSION['forgot']);
            }
            header("Location: index.php");
            die;
        }
        break;

        default:
        break;
    }
}

function send_email($email)
{
    global $conn;
    $expire = time() + (60 * 1);
    $code = rand(1000,99999);
    $email = addslashes($email);
    $query = "insert into codes (email, code, expire) value ('$email', '$code', '$expire')";
    mysqli_query($conn,$query);
    send_mail($email,'Password Reset',"Your code is ".$code);
}

function is_code_correct($code)
{
    global $conn;
    $code = addslashes($code);
    $expire = time();
    $email = addslashes($_SESSION['forgot']['email']);
    $query = "select * from codes where code='$code' && email='$email' order by id desc limit 1";
    $result = mysqli_query($conn,$query);
    if ($result) {
        if (mysqli_num_rows($result)>0) {
        $row = mysqli_fetch_assoc($result);
        if ($row['expire']>$expire) {
            return "the code is correct";
        } else {
            return "the code is expired";
        }
        } else {
            return "the code is incorrect";
        }
    }
    return "the code is incorrect";
}

function save_password($password)
{
    global $conn;
    $password = addslashes($password);
    $email = addslashes($_SESSION['forgot']['email']);
    $query = "update users set password='$password' where email='$email' limit 1";
    mysqli_query($conn,$query);
}

function valid_email($email)
{
    global $conn;
    $email = addslashes($email);
    $query = "select * from users where email='$email' limit 1";
    $result = mysqli_query($conn,$query);
    if ($result) {
        if (mysqli_num_rows($result)>0) {
        return true;
        }
    }
    return false;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="fontawesome-free-6.0.0-beta3-web/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Forgot Password</title>
</head>
<body>

    <?php
        switch ($mode) {
        case 'enter_email':
    ?>

<section class="vh-100 gradient-custom">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card bg-dark text-white" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">

            <div class="mb-md-5 mt-md-4 pb-5">
            <form method="post" action="forgot.php?mode=enter_email">
            <h2 class="fw-bold mb-2 text-uppercase">Reset Password</h2>
              <p class="text-white-50 mb-5">Enter your email below</p>
                <span style="color:red;">
                    <?php
                        foreach ($error as $err) {
                            echo $err. "<br>";
                        }
                    ?>
                </span>
                <div class="form-outline form-white mb-4">
                <input type="email" placeholder="Enter email" name="email" id="typeEmailX" class="form-control form-control-lg" />
                <label class="form-label" for="typeEmailX">Email</label>
              </div>
              <button class="btn btn-outline-light btn-lg px-5" type="submit" name="next" value="Next">Next</button>
            </form>
        </div>
    </div>

    <?php
      break;
      case 'enter_code':
    ?>

    <div class="container">
        <div class="form-sec">
            <form method="post"  action="forgot.php?mode=enter_code">
                <h2>Forgot Password</h2>
                <h3>Enter the code sent to your email below</h3>
                <span style="color:red;">
                    <?php
                        foreach ($error as $err) {
                            echo $err. "<br>";
                        }
                    ?>
                </span>
                <input type="text" placeholder="Enter code" name="code"><br><br>
                <input type="submit" value="Next">
                <a href="forgot.php"><input type="button" value="Restart"></a><br><br>
                <div><a href="index.php">Login</a></div>
            </form>
        </div>
    </div>

    <?php
      break;
      case 'enter_password':
    ?>

    <div class="container">
        <div class="form-sec">
            <form method="post"  action="forgot.php?mode=enter_password">
                <h2>Forgot Password</h2>
                <h3>Enter your new password</h3>
                <span style="color:red;">
                    <?php
                        foreach ($error as $err) {
                            echo $err. "<br>";
                        }
                    ?>
                </span>
                <input type="text" placeholder="Password" name="password"><br><br>
                <input type="text" placeholder="Retype Password" name="password2"><br><br>
                <input type="submit" value="Next">
                <a href="forgot.php"><input type="button" value="Restart"></a><br><br>
                <div><a href="index.php">Login</a></div>
            </form>
        </div>
    </div>

    <?php
        break;
        default:
        break;
    }
    ?>

</body>
</html>