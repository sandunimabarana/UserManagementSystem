<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Register</title>
</head>
<body>
    <div class="container">
        <div class="box form-box">

<?php
include "php/config.php";

if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $age = $_POST['age'];
    $password = $_POST['password'];

    // verifying email is already exist or not
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($con, $sql); 
    if(mysqli_num_rows($result) > 0){
        echo "<div class='message'>
                <span>Already have an account with this email!</span>
            </div><br>";
            echo "<a href='javascript:self.history.back()'><button class='button'>Go Back</button></a>";
        exit();
    }else{
        $sql = "INSERT INTO users (username, email, age, password) VALUES ('$username', '$email', '$age', '$password')";
        $result = mysqli_query($con, $sql);
        if($result){
            header("Location: index.php");
        }else{
            echo "Error: ".mysqli_error($con);
        }

    }   
}else{
?>
            <header>Sign Up</header>
            <form action="" method="post">
                <div class="field input">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" autocomplete="off" required>
                </div>
                <div class="field input">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" autocomplete="off" required>
                </div>
                <div class="field input">
                    <label for="age">Age</label>
                    <input type="number" name="age" id="age" autocomplete="off" required>
                </div>
                <div class="field input">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" autocomplete="off" required>
                </div>
                <button type="submit" name="submit">Register</button>
                <div class="text-center">
                    Already have a account..<a href="index.php">Sign In</a>
                </div>
            </form>
        </div>
        <?php } ?>
    </div> 
</body>
</html>