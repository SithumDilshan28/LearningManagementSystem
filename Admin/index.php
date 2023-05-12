<?php
session_start();
include("../DB_Files/db.php");
$errors=[];


if(isset($_POST['login'])){

    $sigInEmail=$_POST['email2'];
    if(empty($sigInEmail)){
        $error_msg['Email2'] = "Email Address is Required.";
    }
    
    $signInPassword=$_POST['password2'];
        if(empty($signInPassword)){
            $error_msg['Password2'] = "Password is Required.";
        }
    

    if($sigInEmail && $signInPassword){
    $sql="SELECT * FROM admin WHERE email='".$sigInEmail."' AND password='".$signInPassword."'";
    if($user_data=$conn->query($sql)){
        if($user_data->num_rows > 0){
            $user=mysqli_fetch_assoc($user_data);
            $_SESSION['id']=$user['id'];
            $_SESSION['email']=$user['email'];
            header("Location:Dashboard.php");
            exit;
            //success login
        }else{
            $errors[]="Recheck Email & Password.";
        }
    }else{
        $errors[]="Logging Failed";
    }
}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Area</title>
    <link rel="stylesheet" href="CSS/Index.css">
    <!-- <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css"> -->
    <script language="javascript" type="text/javascript">
        window.history.forward();
    </script>
</head>

<style>
    .alert{
        color: red;
        font-size: 15px;
        text-align: center;
        font-weight: 600;
    }
</style>

<body>
    <div class="login">
        <h1>Admin Login</h1>
        <br>
        <?php
            if (!empty($errors)) {
                foreach ($errors as $key => $value) {
            ?>
                    <div class="alert"><?php echo $value; ?></div>
            <?php
                }
            }
            ?>
            <br><br>
        <form method="post" action="">
            <input type="email" name="email2" class="form__field" placeholder="Email"/>
            <?php
            if (isset($error_msg['Email2'])) {
                echo "<div class='validationError'>" . $error_msg['Email2'] . "</div>";
            }
            ?>
            <br>
            <input type="password" name="password2" placeholder="Password"/>
            <?php
            if (isset($error_msg['Password2'])) {
                echo "<div class='validationError'>" . $error_msg['Password2'] . "</div>";
            }
            ?>
            <br><br>
            <button type="submit" name="login" class="btn btn-primary btn-block btn-large">Log In</button>
        </form>
    </div>
</body>

</html>