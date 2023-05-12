<?php
include_once("Inc/Header.php");
include_once("DB_Files/db.php");
?>

<link rel="stylesheet" href="CSS/Home.css">
<link rel="stylesheet" href="CSS/responsiveness.css">
<!-- Swiper JS -->
<link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />

<!-- Header -->
<header>
    <div class="container header__container">
        <div class="header__left">
            <h1>Grow your Skills to Advance your Career path</h1>
            <p>Education is the place where learning begins but ends nowhere.</p>
            <?php
            if (isset($_SESSION['stu_id'])) {
                echo '
                <a href="Users/Profile.php">
                <button class="button"> Visit Profile
                </button></a>
                ';
            } else {
                echo '
                <a href="Login&SignIn.php">
                <button class="button">Get Started
                </button></a>
                ';
            }
            ?>
        </div>
        <div class="header__right">
            <div class="header__right-image">
                <img src="Img/header.svg" alt="">
            </div>
        </div>
    </div>
</header>


<!-- Categories -->
<section class="categories reveal">
    <div class="container categories__container">
        <div class="categories__left">
            <h1>Categories</h1>
            <p>Students can learn their programming languages very easily with good knowledge capacity from Imperial Academy.</p>
        </div>
        <div class="categories__right">
            <article class="category">
                <span class="category__icon"><i class="uil uil-android"></i></span>
                <h5>App Development</h5>
                <p>Developing Mobile Applications</p>
            </article>

            <article class="category">
                <span class="category__icon"><i class="uil uil-browser"></i></span>
                <h5>Web Development</h5>
                <p>Developing Websites</p>
            </article>

            <article class="category">
                <span class="category__icon"><i class="uil uil-palette"></i></span>
                <h5>Front-End Developing</h5>
                <p>Design Front-End</p>
            </article>

            <article class="category">
                <span class="category__icon"><i class="uil uil-brackets-curly"></i></span>
                <h5>Back-End Developing</h5>
                <p>Code Back-End</p>
            </article>

            <article class="category">
                <span class="category__icon"><i class="uil uil-pen"></i></span>
                <h5>UI Design</h5>
                <p>Design User Interfaces</p>
            </article>

            <article class="category">
                <span class="category__icon"><i class="uil uil-palette"></i></i></span>
                <h5>UX</h5>
                <p>User Experience</p>
            </article>

        </div>
    </div>
</section>

<!-- Popular Course -->
<section class="courses reveal">
    <h2>Our Popular Course</h2>
    <div class="container courses__container">
        <?php
        $sql = "SELECT * FROM course ORDER BY RAND() LIMIT 6";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $course_id = $row['course_id'];
                echo '
                <article class="course">
                <a href="CourseDetails.php?course_id='.$course_id.'">
                <div class="course__image">
                    <img src="'.str_replace('..','.',$row['course_img']).'" alt="">
                </div>
                <div class="course__info">
                <h3 style="text-align: start;">' . $row['course_name'] . '</h3>
                <h5 style="text-align: start; margin-top: 10px;">' . $row['course_author'] . '</h5>
                <h4 style="text-align: start; margin-top: 10px;">&#36;' . $row['course_price'] . '</h4>
                <br>
                    <a href="CourseDetails.php?course_id='.$course_id.'">
                <button class="button">Learn More
                </button></a>
                </div>
                </a>
            </article>
                ';
            }
        }
        ?>
    </div>
</section>
<p style="margin-top: 5px;"></p>

<!-- Testimonial -->
<section class="container testimonials__container mySwiper reveal">
<h2>Students Reviews</h2>
            <div class="swiper-wrapper">

            <?php
    $sql = "SELECT s.stu_name,s.stu_occ,s.stu_img,f.f_content FROM students As s JOIN feedback As f ON s.stu_id=f.stu_id";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $s_img = $row['stu_img'];
            $n_img = str_replace('..', '.', $s_img);
            $s_name = $row['stu_name'];
            $s_occ = $row['stu_occ'];
            $f_content = $row['f_content'];
    ?>


                <article class="testimonial swiper-slide">
                    <div class="avatar">
                        <img src="<?php echo $n_img ?>" alt="">
                    </div>
                    <div class="testimonial__info">
                        <h5> <?php echo $s_name ?> </h5>
                        <small> <?php echo $s_occ ?> </small>
                    </div>

                    <div class="testimonial__body">
                        <p>
                            <?php echo $f_content ?>
                        </p>
                    </div>
                </article>
                <?php
        }
    }
        ?>
            </div>
            <div class="swiper-pagination"></div>
            
</section>
<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
<script>
    var swiper = new Swiper(".mySwiper", {
        slidesPerView: 1,
        spaceBetween: 30,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },

        //when window width is >= 600px
        breakpoints: {
            600: {
                slidesPerView: 3
            }
        }
    });


    //Animation Scroll
function reveal() {
    var reveals = document.querySelectorAll(".reveal");

    for (var i = 0; i < reveals.length; i++) {
        var windowHeight = window.innerHeight;
        var elementTop = reveals[i].getBoundingClientRect().top;
        var elementVisible = 150;

        if (elementTop < windowHeight - elementVisible) {
            reveals[i].classList.add("active");
        } else {
            reveals[i].classList.remove("active");
        }
    }
}

window.addEventListener("scroll", reveal);
</script>

<section id="features" class="reveal">
    <h1>Awesome Features</h1>
    <div class="fea-base">
        <div class="fea-box">
            <i class="uil uil-graduation-cap"></i>
            <h3>Scholarship Facility</h3>
        </div>

        <div class="fea-box">
            <i class="uil uil-trophy"></i>
            <h3>Global Recognition</h3>
        </div>

        <div class="fea-box">
            <i class="uil uil-clipboard-alt"></i>
            <h3>Enroll Course</h3>
        </div>
    </div>
</section>

<?php
include_once("Inc/Footer.php");
?>