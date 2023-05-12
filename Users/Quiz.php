<?php
include_once("ProfileHeader.php");
include_once("../DB_Files/db.php");
$category = $_SESSION["exam_category"];
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> 

<div class="col-sm-8 mt-5 ms-5">
    <div class="bg-dark p-4 border-5">
    <p style="margin-top: -10px;" class="float-start fw-bolder text-light">Category: <?php echo $category; ?></p>
    <p style="margin-top: -10px;" class="float-end fw-bolder text-warning" id="countdowntimer"></p>
    </div>
    <br><br>


    <div class="col-lg-9 col-lg-push-10">
        <div class="float-end fw-bolder text-dark" id="total_que">0</div>
        <div class="float-end fw-bolder text-dark"> /</div>
        <div class="float-end fw-bolder text-dark" id="current_que">0</div>
    </div>
    <br><br><br>
    <div class="row mt-5 ms-5">
        <div class="row">
            <div class="col-lg-8 text-dark col-lg-push-1" id="load_questions"></div>
        </div>
    </div>


    <div class="row mt-5">
        <div class="col-lg-12 col-lg-push-3">
            <div class="col-lg-12 text-center">
                <input type="button" class="btn btn-info fw-bolder text-light" value="Previous" onclick="load_previous();">&nbsp;
                <input type="button" class="btn btn-success fw-bolder text-light" value="Next" onclick="load_next();">
            </div>
        </div>
    </div>

</div>


<script type="text/javascript">
    setInterval(function() {
        timer();
    },1000);

    function timer() {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                if (xmlhttp.responseText<="00:00:01") {
                    // alert(xmlhttp.responseText);
                    window.location = "result.php";
                }
                document.getElementById("countdowntimer").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET", "forajax/load_timer.php", true);
        xmlhttp.send(null);
    }


    function load_total_que() {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("total_que").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET", "forajax/load_total_que.php", true);
        xmlhttp.send(null);
    }


    var questionno = "1";
    load_questions(questionno);

    function load_questions(questionno) {
        document.getElementById("current_que").innerHTML = questionno;
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                if (xmlhttp.responseText >= "over") {
                    // alert(xmlhttp.responseText);
                    window.location = "result.php";
                } else {
                    document.getElementById("load_questions").innerHTML = xmlhttp.responseText;
                    load_total_que();
                }
            }
        };
        xmlhttp.open("GET", "forajax/load_questions.php?questionno=" + questionno, true);
        xmlhttp.send(null);
    }



    function radioclick(radiovalue, questionno) {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

            }
        };
        xmlhttp.open("GET", "forajax/save_answer_in_answer.php?questionno=" + questionno + "&value1=" + radiovalue, true);
        xmlhttp.send(null);
    }

    function load_previous() {
        if (questionno == "1") {
            load_questions(questionno);
        } else {
            questionno = eval(questionno) - 1;
            load_questions(questionno);
        }
    }


    function load_next() {
        questionno = eval(questionno) + 1;
        load_questions(questionno);
    }


    window.onload = function() {
        document.onkeydown = function(e) {
            return (e.which || e.keyCode) != 116;
        };
    }
</script>