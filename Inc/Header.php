<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Imperial College</title>
    <link rel="stylesheet" href="bootstrap-5.1.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="Inc/Header.css">
    <link rel="stylesheet" href="/CSS/responsiveness.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v2.1.6/css/unicons.css">
</head>

<body>
    <!-- Navigation Bar -->
    <nav>
        <div class="container nav__container">
            <a class="custom__links" href="index.php">
                <h4 class="title">Imperial <br> <h5>Educational Center</h5> </h4> 
                <!-- <img src="Img/logo.png" alt="" class="title" > -->
            </a>
            <ul class="nav__menu">
                <li>
                    <a class="custom__links" href="index.php">Home</a>
                </li>
                <li>
                    <a class="custom__links" href="About.php">About</a>
                </li>
                <li>
                    <a class="custom__links" href="Course.php">Courses</a>
                </li>
                <li>
                    <a class="custom__links" href="Blog.php">Blogs</a>
                </li>
                <li>
                    <a class="custom__links" href="Contact.php">Contact</a>
                </li>
                <?php
                session_start();
                if(isset($_SESSION['stu_id'])){
                    echo'
                    <li>
                    <a class="custom__links" href="Users/Profile.php">Profile</a>
                </li>
                    ';
                }else{
                    echo '
                    <li>
                    <a class="custom__links joinBtn" href="Login&SignIn.php">Join For Free</a>
                </li>
                    ';
                }
                ?>
                
            </ul>
            <button id="open-menu-btn"><i class="uil uil-bars"></i></button>
            <button id="close-menu-btn"><i class="uil uil-multiply"></i></button>
        </div>
    </nav>

    <script>
        //change color nav
        window.addEventListener('scroll', () => {
            document.querySelector('nav').classList.toggle('window-scroll', window.scrollY > 0)
        })

        //show hide nav
        const menu = document.querySelector(".nav__menu");
        const menuBtn = document.querySelector("#open-menu-btn");
        const closeBtn = document.querySelector("#close-menu-btn");

        menuBtn.addEventListener('click', () => {
            menu.style.display = "flex";
            closeBtn.style.display = "inline-block";
            menuBtn.style.display = "none";
        })

        //close nav menu
        const closeNav = () => {
            menu.style.display = "none";
            closeBtn.style.display = "none";
            menuBtn.style.display = "inline-block";
        }
        closeBtn.addEventListener('click', closeNav)

        const changeColor = () => {
            $('ul > li > a').css('background-color', 'inherit')
            $(event.target).css("background-color", "red")
        }

        $('ul > li > a').on('click', changeColor)
    </script>