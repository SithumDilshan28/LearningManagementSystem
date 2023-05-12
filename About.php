<?php
include_once("Inc/Header.php");
include_once("DB_Files/db.php");

?>

<link rel="stylesheet" href="CSS/About.css">
<link rel="stylesheet" href="CSS/responsiveness.css">
<!-- <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css"> -->

<!-- Achievements -->
<section class="about__achievements">
    <div class="container about__achievements-container">
        <div class="about__achievements-left">
            <img src="Img/about achievements.svg" alt="">
        </div>
        <div class="about__achievements-right">
            <h1>Achievements</h1>
            <p>Our global community and our course catalog get bigger every day.Check out our latest numbers as of December 2021.</p>
            <div class="achievements__cards">
                <article class="achievements__card">
                    <span class="achievement__icon">
                        <i class="uil uil-video"></i>
                    </span>
                    <h3>80+</h3>
                    <p>Courses</p>
                </article>

                <article class="achievements__card">
                    <span class="achievement__icon">
                        <i class="uil uil-users-alt"></i>
                    </span>
                    <h3>1500+</h3>
                    <p>Students</p>
                </article>

                <article class="achievements__card">
                    <span class="achievement__icon">
                        <i class="uil uil-trophy"></i>
                    </span>
                    <h3>8+</h3>
                    <p>Awards</p>
                </article>

            </div>
        </div>
    </div>
</section>

<!-- Team -->
<section class="team reveal">
    <h2>Meet Our Team</h2>
    <div class="container team__container">
        <?php
        $sql = "SELECT * FROM lectures";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $l_id = $row['l_id'];
                echo '
        <article class="team__member">
            <div class="team__member-image">
                <img src="' . str_replace('..', '.', $row['l_img']) . '" alt="">
            </div>
            <div class="team__member-info">
                <h4>' . $row['l_name'] . '</h4>
                <p>' . $row['l_design'] . '</p>
            </div>
        </article>
        ';
            }
        }
        ?>
    </div>
</section>


<!--FAQ-->
<section class="faqs reveal">

    <h2>Frequently Asked Questions</h2>
    <div class="container faqs__container">
        <article class="faq">
            <div class="faq__icon"><i class="uil uil-plus"></i></div>
            <div class="question__answer ">
                <h4>What do Imperial courses include?</h4>
                <p>Each Imperial course is created, owned and managed by the instructor(s). The foundation of each Imperial course are its lectures, which can include videos. In addition, instructors can add resources and various types of practice activities, as a way to enhance the learning experience of students. </p>
            </div>
        </article>

        <article class="faq">
            <div class="faq__icon"><i class="uil uil-plus"></i></div>
            <div class="question__answer ">
                <h4>Is there any way to preview a course?</h4>
                <p>Yes! For steps on how to preview a course, and review key information about it.</p>
            </div>
        </article>

        <article class="faq">
            <div class="faq__icon"><i class="uil uil-plus"></i></div>
            <div class="question__answer ">
                <h4>How can I pay for a course?</h4>
                <p>Imperial supports several different payment methods, depending on your account country and location. </p>
            </div>
        </article>

        <article class="faq">
            <div class="faq__icon"><i class="uil uil-plus"></i></div>
            <div class="question__answer ">
                <h4>What if I don’t like a course I purchased?</h4>
                <p>We want you to be satisfied, so all eligible courses purchased on Imperial can be refunded within 30 days.</p>
            </div>
        </article>

        <article class="faq">
            <div class="faq__icon"><i class="uil uil-plus"></i></div>
            <div class="question__answer ">
                <h4>Where can I go for help?</h4>
                <p>If you find you have a question about a paid course while you’re taking it, you can search for answers to your question in the Q&A or ask the instructor. </p>
            </div>
        </article>

        <article class="faq">
            <div class="faq__icon"><i class="uil uil-plus"></i></div>
            <div class="question__answer ">
                <h4>Do I have to start my Imperial course at a certain time? </h4>
                <p>If you find you have a question about a paid course while you are taking it, you can search for answers to your question in the Q&A or ask the instructor. </p>
            </div>
        </article>

        <article class="faq">
            <div class="faq__icon"><i class="uil uil-plus"></i></div>
            <div class="question__answer ">
                <h4>Do I have to start my Imperial course at a certain time? And how long do I have to complete it?</h4>
                <p>As noted above, there are no deadlines to begin or complete the course. Even after you complete the course you will continue to have access to it, provided that your account is in good standing, and Imperial continues to have a license to the course. </p>
            </div>
        </article>


    </div>
</section>


<script src="js/Custom.js"></script>

<script>
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

<?php
include_once("Inc/Footer.php");
?>