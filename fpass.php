<?php
session_start();


require_once "config.php";

$username=$new_password = $confirm_password = "";
$username_err=$new_password_err = $confirm_password_err = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){


    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }


    $_SESSION["username"] = $username;
        $sqlU = "SELECT id FROM users WHERE username = ?";

        if($stmt = mysqli_prepare($link, $sqlU))
        {
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            $param_username = trim($_POST["username"]);

            if (mysqli_stmt_execute($stmt)) {
                mysqli_stmt_store_result($stmt);

                if (mysqli_stmt_num_rows($stmt) != 1) {
                    $username_err = "No User Found";
                }
            }
        }
        if (empty(trim($_POST["new_password"]))) {
            $new_password_err = "Please enter the new password.";
        } elseif (strlen(trim($_POST["new_password"])) < 6  ) {

            $new_password_err = "Password must have at least 6 characters.";

        } else {
            $new_password = trim($_POST["new_password"]);
        }

        if (empty(trim($_POST["confirm_password"]))) {
            $confirm_password_err = "Please confirm the password.";
        } else {
            $confirm_password = trim($_POST["confirm_password"]);
            if (empty($new_password_err) && ($new_password != $confirm_password)) {
                $confirm_password_err = "Password did not match.";
            }
        }

        if (empty($new_password_err) && empty($confirm_password_err)) {
            $sql = "UPDATE users SET password = ? WHERE username = ? ";

            if ($stmt = mysqli_prepare($link, $sql)) {
                mysqli_stmt_bind_param($stmt, "ss", $param_password, $param_username);

                $param_password = password_hash($new_password, PASSWORD_DEFAULT);
                $param_username = $_SESSION["username"];

                if (mysqli_stmt_execute($stmt)) {
                    session_destroy();
                    header("location: login.php");
                    exit();
                } else {
                    echo "Oops! Something went wrong. Please try again later.";
                }

                mysqli_stmt_close($stmt);
            }
        }


    mysqli_close($link);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reset Password</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body{
            font-family: sans-serif;
            background-image: url(bg2.jpg);
            background-repeat: no-repeat;
            overflow: hidden;
            background-size: cover; }

        .wrapper{ width: 380px;
            margin:7% auto;
            border-radius: 25px;
            background-color: white;
            box-shadow: 0 0 17px #333;text-align: center;
            padding-top: 50px; }

        input[type=text],[type=password]{
            width:100%;
            border:2px solid #aaa;
            border-radius:4px;
            margin:8px 0;
            outline:none;
            padding:8px;
            box-sizing:border-box;
            transition:.3s;
        }

        .wrapper h2{
            color: #333;
            font-size: 35px;
            margin-bottom: -10px;
            margin-top: -30px;
        }

        .wrapper p{
            margin-top: 20px;
        }

        .wrapper form-group
        {
            position: absolute;
            left: 15px;
            color: #333;
            font-size: 16px;
            top: -7px;
        }
    </style>
</head>
<body>

<div style="background-color: white;text-align: center"><h1 >Welcome To EasyDay Grocery Store</h1>
    <p>To Begin login or register below</p>
</div>
<div class="wrapper">
    <h2>Forgot Password</h2>
    <p>Please fill out this form to reset your password.</p>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div class="form-group">
            <label>Username</label>
            <input type="text" id="ForgotUsername" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>" placeholder="Username">
            <span class="invalid-feedback"><?php echo $username_err; ?></span>
        </div>
        <div class="form-group">
            <label>New Password</label>
            <input type="password" id="ForgotPassword" name="new_password" class="form-control <?php echo (!empty($new_password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $new_password; ?>"placeholder="Password" >
            <span class="invalid-feedback"><?php echo $new_password_err; ?></span>
        </div>
        <div class="form-group">
            <label>Confirm Password</label>
            <input type="password" id="ForgotConfPassword" name="confirm_password" class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>"placeholder="Confirm Password">
            <span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
        </div>
        <div class="form-group">
            <input type="submit" id="ForgotSubmit" class="btn btn-primary" value="Submit">
            <a class="btn btn-link ml-2" href="home.php">Cancel</a>
        </div>
    </form>
</div>
</body>
</html>