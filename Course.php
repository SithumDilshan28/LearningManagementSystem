<?php
include_once("Inc/Header.php");
include_once("DB_Files/db.php");

?>
<link rel="stylesheet" href="CSS/Course.css">
<link rel="stylesheet" href="CSS/responsiveness.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<section class="courses">


    <h2>All Courses</h2>
    <div class="col">
        <div class="input-group mb-3">
            <input type="text" class="form-control" id="search_text" name="search_text" placeholder="Search Here" >
        </div>
        <br><br><br><br>
        <div id="result"></div>
        <br><br><br><br><br><br><br>
    </div>

    <div class="container courses__container">
        <?php
        $sql = "SELECT * FROM course";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $course_id = $row['course_id'];
                $_SESSION["course_id"]=$course_id;
                echo '
                <article class="course">
                <a href="CourseDetails.php?course_id=' . $course_id . '">
                <div class="course__image">
                    <img src="' . str_replace('..', '.', $row['course_img']) . '" alt="">
                </div>
                <div class="course__info">
                <h3 style="text-align: start;">' . $row['course_name'] . '</h3>
                <h5 style="text-align: start; margin-top: 10px;">' . $row['course_author'] . '</h5>
                <h4 style="text-align: start; margin-top: 10px;">&#36;' . $row['course_price'] . '</h4>
                <br>
                <a href="CourseDetails.php?course_id=' . $course_id . '">
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



<script>
    $(document).ready(function(){
        $('#search_text').keyup(function(){
            var txt=$(this).val();
            if(txt!=''){
                $('#result').html('');
                $.ajax({
                    url: "course_fetch.php",
                    type: "post",
                    data: {search:txt},
                    dataType: "text",
                    success: function (data) {
                        $('#result').html(data);
                    }
                });
            }else{
            }
        });
    });
</script>
<?php
include_once("Inc/Footer.php");
?>