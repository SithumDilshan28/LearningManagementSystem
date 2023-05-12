<?php
include_once("ProfileHeader.php");
include_once("../DB_Files/db.php");
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

?>


<div class="col-sm-7 mt-5 ms-5">
    <p class="bg-dark text-white p-2 fw-bolder">List of Quiz</p>
    <br>
    <?php
    $sql = "SELECT * FROM exam_category";
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
        $category = $row["exam_name"];
        $_SESSION["category"] = $category;
    ?>
        <div class="mt-3">
            <form action="" method="post">
                <input name="test" class="btn btn-secondary border-5 form-control fw-bolder text-light" value="<?php echo $row["exam_name"]; ?>" onclick="set_exam_type_session(this.value);">
            </form>

        <?php
    }
        ?>
        <br><br><br><br><br><br><br>

        </div>

        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <a href="OldResult.php">
                        <input type="button" class="btn btn-danger   border-5 fw-bolder text-light" value="Show Result">
                    </a>
                </div>
            </div>
        </div>
</div>
<script type="text/javascript">
    function set_exam_type_session(exam_category) {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                window.location = "Quiz.php";
            }
        };
        xmlhttp.open("GET", "forajax/set_exam_type_session.php?exam_category=" + exam_category, true);
        xmlhttp.send(null);
    }
</script>