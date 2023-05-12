<?php
include_once("Inc/Header.php");
include_once("DB_Files/db.php");
?>

<link rel="stylesheet" href="CSS/BlogReadMore.css">
<link rel="stylesheet" href="CSS/responsiveness.css">
<section id="blog-container">
<?php
    if (isset($_GET['b_id'])) {
        $b_id = $_GET['b_id'];
        $sql = "SELECT * FROM blog WHERE b_id='$b_id'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
    }
    ?>
    <div class="blogs blogpost">
        <div class="post">
            <img src="<?php echo str_replace('..', '.', $row['b_img']) ?>" alt="">
            <br>
            <h3><?php echo $row['b_title']  ?></h3>
            <br>
            <br>
            <p class="reveal desc"><?php echo $row['b_dec']  ?></p>
            <p class="reveal desc"><?php echo $row['b_dec1']  ?></p>
            <p class="reveal desc"><?php echo $row['b_dec2']  ?></p>
            <p class="reveal desc"><?php echo $row['b_dec3']  ?></p>
            <br>
            <a href="Blog.php" class="button reveal">Back Main Menu</a>
        </div>
    </div>
</section>
<?php
include_once("Inc/Footer.php");
?>

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