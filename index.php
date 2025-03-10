<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Login</title>
</head>
<body>
    <div class="container">
        <div class="box form-box">
            <?php
            include "php/config.php";
            if(isset($_POST['submit'])){
                $email = mysqli_real_escape_string($con, $_POST['email']);
                $password = mysqli_real_escape_string($con, $_POST['password']);
            
                $result = mysqli_query($con, "SELECT * FROM users WHERE email = '$email' AND password = '$password'");
                if(mysqli_num_rows($result) > 0){
                    $row = mysqli_fetch_assoc($result);
                    $_SESSION['username'] = $row['Username'];
                    $_SESSION['email'] = $row['Email'];
                    $_SESSION['age'] = $row['Age'];
                    $_SESSION['id'] = $row['Id'];
                }else{  
                    echo "<div class='message'>
                            <span>Wrong Username or Password</span>
                        </div><br>";
                        echo "<a href='index.php'><button class='button'>Go Back</button></a>";
            }
            if(isset($_SESSION['username'])){
                header("Location: home.php");
            }
            }else{
            ?>
            <header>Login</header>
            <form action="" method="post">
                <div class="field input">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" autocomplete="off" required>
                </div>
                <div class="field input">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" autocomplete="off" required>
                </div>
                <button type="submit" name="submit">Login</button>
                <div class="text-center">
                    <a href="register.php">Register</a>
                </div>
            </form>
        </div>
        <?php } ?>
    </div>
    
</body>
</html>