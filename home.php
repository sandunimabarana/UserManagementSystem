<?php 
session_start();
if(!isset($_SESSION['email'])){
    header("Location: index.php");
}
include "php/config.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Home</title>
</head>
<body>
    <div class="nav">
        <div class="logo">
            <p><a href="home.php">Logo</a></p>
        </div>
        <div class="right-links">

        <?php 
        $email = $_SESSION['email'];
        $query = mysqli_query($con, "SELECT * FROM users WHERE email = '$email'");
        while($result = mysqli_fetch_assoc($query)){
            $res_username = $result['Username'];
            $res_Email = $result['Email'];
            $res_Age = $result['Age'];
            $res_id = $result['Id'];
        }
        echo "<a href='edit.php?id=$res_id'><button class='btn'>Change Profile</button></a>";
        ?>
            
            <a href="logout.php"><button class="btn">Log Out</button></a>
        </div>
    </div>
    <main>
        <div class="main-box top">
            <div class="top">
                <div class="box">
                    <p>Hello <b><?php echo $res_username ?></b>, Welcome</p>
                </div>
                <div class="top">
                    <div class="box">
                        <p>Your email is <b><?php echo $res_Email ?></b>.</p>
                    </div>
            </div>
            <div class="box">
                <div class="bottom">
                    <p>And you are <b><?php echo $res_Age ?> years old</b>.</p>
                </div>
            </div>
            
        </div>
    </main>
</body>
</html>