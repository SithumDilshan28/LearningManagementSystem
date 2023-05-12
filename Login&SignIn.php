<?php
include("DB_Files/db.php");
$fname = '';
$mail = '';
$password = '';
$cpassword = '';

if (isset($_POST['signup'])) {


    $fname = $_POST['name'];
    $mail = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['c_password'];

    //Name Validation
    $name = $_POST['name'];
    if (empty($name)) {
        $error_msg['Name'] = "Full Name is Required";
    } else if (!preg_match("/^[a-zA-Z -]*$/", $name)) {
        $error_msg['Name'] = "Name Must be Only Letter";
    } else if (strlen($name) < 5) {
        $error_msg['Name'] = "Name Must be Minimum 5 Letters";
    }


    //Email Validation
    $email = $_POST['email'];
    if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $email)) {
        $error_msg['Email'] = "Invalid Email Address";
    }

    //Password Validation
    $pass = $_POST['password'];
    if (empty($pass)) {
        $error_msg['Password'] = "Password is Required";
    }

    //Confirm Password Validation
    $pass2 = $_POST['c_password'];
    if (empty($pass2)) {
        $error_msg['C_password'] = "Confirm Password is Required";
    }



    //Signup Code
    if ($name && $email && $pass) {
        $email_query = "SELECT * FROM students WHERE stu_email='$email'";
        $email_query_run = mysqli_query($conn, $email_query);
        if (mysqli_num_rows($email_query_run) > 0) {
            $error_msg['Email'] = "Email Already Taken";
        } else {
            if ($pass == $pass2) {
                if (preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,12}$/', $pass)) {
                    $pass = md5($pass);
                    $sql = "INSERT INTO students (stu_name,stu_email,stu_pass) VALUES ('" . $name . "','" . $email . "','" . $pass . "')";
                    if ($conn->query($sql)) {
                        $success = true;
                        $fname = "";
                        $mail = "";
                        $password = '';
                        $cpassword = '';
                    } else {
                        $error[] = "Server Error";
                    }
                } else {
                    $error_msg['Password'] = "Password Too Weak";
                }
            } else {
                $error_msg['C_password1'] = "Password Does not Matched";
            }
        }
    }
}
?>

<link rel="stylesheet" href="CSS/login.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script language="javascript" type="text/javascript">
    window.history.forward();
</script>

<div class="wrapper">


    <div class="container right-panel-active">
        <!-- Sign Up -->
        <div class="container__form container--signup">
            <form action="" method="POST" class="form" id="register">
                <h2 class="form__title">Sign Up</h2>
                <!-- error alert -->
                <?php
                if (!empty($error)) {
                    foreach ($error as $key => $value) {
                        # code...
                ?>
                        <div class="alert"><?php echo $value; ?></div>
                    <?php
                    }
                }
                if (isset($success)) {
                    ?>
                    <div class="success">Registered successfully!</div>
                <?php
                }
                ?>
                <!-- <p class="form__subtitle">Create One</p> -->
                <div class="form__group field">
                    <input type="text" name="name" placeholder="Full Name" class="form__field" <?php echo 'value="' . $fname . '"' ?> />
                    <label for="name" class="form__label">Name</label>
                </div>
                <?php
                if (isset($error_msg['Name'])) {
                    echo "<div class='validationError'>" . $error_msg['Name'] . "</div>";
                }
                ?>
                <div class="form__group field">
                    <input type="text" name="email" placeholder="Email Address" class="form__field checking_email" <?php echo 'value="' . $mail . '"' ?> />
                    <label for="name" class="form__label">Email Address</label>
                </div>
                <small class="error_email validationError"></small>
                <?php
                if (isset($error_msg['Email'])) {
                    echo "<div class='validationError'>" . $error_msg['Email'] . "</div>";
                }
                ?>
                <div class="form__group field">
                    <input type="password" name="password" placeholder="Password" class="form__field" <?php echo 'value="' . $password . '"' ?> />
                    <label for="name" class="form__label">Password</label>
                </div>
                <?php
                if (isset($error_msg['Password'])) {
                    echo "<div class='validationError'>" . $error_msg['Password'] . "</div>";
                }
                if (isset($error_msg['C_password1'])) {
                    echo "<div class='validationError'>" . $error_msg['C_password1'] . "</div>";
                }
                ?>
                <div class="form__group field">
                    <input type="password" name="c_password" placeholder="Confirm Password" class="form__field" <?php echo 'value="' . $cpassword . '"' ?> />
                    <label for="name" class="form__label">Confirm Password</label>
                </div>
                <?php
                if (isset($error_msg['C_password'])) {
                    echo "<div class='validationError'>" . $error_msg['C_password'] . "</div>";
                }
                ?>
                <br><br>
                <button name="signup" type="submit" class="cta">
                    <span>Sign Up</span>
                    <svg width="13px" height="10px" viewBox="0 0 13 10">
                        <path d="M1,5 L11,5"></path>
                        <polyline points="8 1 12 5 8 9"></polyline>
                    </svg>
                </button>


            </form>
        </div>



        <!-- Sign In -->
        <div class="container__form container--signin">
            <form action="signinDb.php" method="POST" class="form" id="login">
                <h2 class="form__title">Sign In</h2>
                <!-- login body -->
                <?php
                if (!empty($errors)) {
                    foreach ($errors as $key => $value) {
                ?>
                        <div class="alert"><?php echo $value; ?></div>
                <?php
                    }
                }
                ?>
                <div class="form__group field">
                    <input type="email" name="email2" placeholder="Email Address" class="form__field" />
                    <label for="name" class="form__label">Email</label>
                </div>
                <?php
                if (isset($error_msg['Email2'])) {
                    echo "<div class='validationError'>" . $error_msg['Email2'] . "</div>";
                }
                ?>
                <div class="form__group field">
                    <input type="password" name="password2" placeholder="Password" class="form__field" />
                    <label for="name" class="form__label">Password</label>
                </div>
                <?php
                if (isset($error_msg['Password2'])) {
                    echo "<div class='validationError'>" . $error_msg['Password2'] . "</div>";
                }
                ?>
                <br>
                <label class="checkbox">
                    <div class="page__section page__custom-settings">
                        <div class="page__toggle">
                            <label class="toggle">
                                <input class="toggle__input" type="checkbox" checked>
                                <span class="toggle__label">
                                    <span class="toggle__text">Remember Me</span>
                                </span>
                            </label>
                        </div>
                    </div>
                    <!-- <a href="#" class="link">Forgot your password?</a> -->
                    <br><br>
                    <button name="login" class="cta">
                        <span>Sign In</span>
                        <svg width="13px" height="10px" viewBox="0 0 13 10">
                            <path d="M1,5 L11,5"></path>
                            <polyline points="8 1 12 5 8 9"></polyline>
                        </svg>
                    </button>

            </form>
        </div>

        <!-- Overlay -->
        <div class="container__overlay">
            <div class="overlay">



                <button class="cta cssbtn" id="signIn">
                    <span>Sign In</span>
                    <svg width="13px" height="10px" viewBox="0 0 13 10">
                        <path d="M1,5 L11,5"></path>
                        <polyline points="8 1 12 5 8 9"></polyline>
                    </svg>
                </button>


                <button class="cta cssbtn1" id="signUp">
                    <span>Sign Up</span>
                    <svg width="13px" height="10px" viewBox="0 0 13 10">
                        <path d="M1,5 L11,5"></path>
                        <polyline points="8 1 12 5 8 9"></polyline>
                    </svg>
                </button>



                <!-- <div class="overlay__panel overlay--left">
                <button class="btn" >Sign In</button>
            </div> -->
                <!-- <div class="overlay__panel overlay--right">
                <button class="btn" id="signUp">Sign Up</button>
            </div> -->
            </div>
        </div>
    </div>

</div>
<script src="js/Custom.js"></script>
<!-- <script src="custom.js"></script> -->
<script>
    const signInBtn = document.getElementById("signIn");
    const signUpBtn = document.getElementById("signUp");
    const fistForm = document.getElementById("form1");
    const secondForm = document.getElementById("form2");
    const container = document.querySelector(".container");

    signInBtn.addEventListener("click", () => {
        container.classList.remove("right-panel-active");
    });

    signUpBtn.addEventListener("click", () => {
        container.classList.add("right-panel-active");
    });

    fistForm.addEventListener("submit", (e) => e.preventDefault());
    secondForm.addEventListener("submit", (e) => e.preventDefault());
</script>