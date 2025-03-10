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
    <title>Change Profile</title>
</head>
<body>
    <div class="nav">
        <div class="logo">
            <p><a href="home.php">Logo</a></p>
        </div>
        <div class="right-links">
            <a href="#">Change Profile</a>
            <a href="logout.php"><button class="btn">Log Out</button></a>
        </div>
    </div>
    <div class="container">
        <div class="box form-box">
            <?php 
            if(isset($_POST['submit'])){
                $username = $_POST['username'];
                $email = $_POST['email'];
                $age = $_POST['age'];
                $id = $_SESSION['id'];
                $sql = "UPDATE users SET Username = '$username', Email = '$email', Age = '$age' WHERE Id = '$id'";
                $result = mysqli_query($con, $sql);
                if($result){
                    echo "<div class='message'>
                <span>Profile Updated Successfully>>></span>
            </div><br>";
            echo "<a href='home.php'><button class='button'>Go Home</button></a>";
                    header("Location: home.php");
                }else{
                    echo "Error: ".mysqli_error($con);
                }
            }else{
                $id = $_SESSION['id'];
                $query = mysqli_query($con, "SELECT * FROM users WHERE Id = '$id'");

                while($result = mysqli_fetch_assoc($query)){
                    $res_username = $result['Username'];
                    $res_Email = $result['Email'];
                    $res_Age = $result['Age'];
                }
            
            ?>
            <header>Change Profile</header>
            <form action="" method="post">
                <div class="field input">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" value="<?php echo $res_username; ?>" autocomplete="off" required>
                </div>
                <div class="field input">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" value="<?php echo $res_Email; ?>" autocomplete="off" required>
                </div>
                <div class="field input">
                    <label for="age">Age</label>
                    <input type="number" name="age" id="age" value="<?php echo $$res_Age; ?>" autocomplete="off" required>
                </div>
                <button type="submit" name="Submit">Submit</button>
            </form>
        </div>
        <?php } ?>
    </div> 
</body>
</html>