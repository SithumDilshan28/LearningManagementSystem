<link rel="stylesheet" href="CSS/Course.css">
<?php
include_once("DB_Files/db.php");

$output='';
$sql="SELECT * FROM course WHERE course_name LIKE '%".$_POST["search"]."%'";
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0){
    while($row=mysqli_fetch_array($result)){
        $id=$row["course_id"];
        $output .='
        <div class="container courses__container">
                <article class="course">
                <a href="CourseDetails.php?course_id=' . $id . '">
                <div class="course__image">
                    <img src="' . str_replace('..', '.', $row['course_img']) . '" alt="">
                </div>
                <div class="course__info">
                <h3 style="text-align: start;">' . $row['course_name'] . '</h3>
                <h5 style="text-align: start; margin-top: 10px;">' . $row['course_author'] . '</h5>
                <h4 style="text-align: start; margin-top: 10px;">&#36;' . $row['course_price'] . '</h4>
                <br>
                <a href="CourseDetails.php?course_id=' . $id . '">
                <button class="button">Learn More
                </button></a>
                    
                </div>
                </a>
            </article>
                ';
    }
    echo $output;?>
    

<?php }else{ echo "<p class='alert'>Course Not Found. </p>";} 

?>

<style>
    .alert{
        text-align: center;
        color: red;
    }
</style>

