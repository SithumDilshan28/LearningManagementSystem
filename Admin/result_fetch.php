<?php
include_once("../DB_Files/db.php");

$output='';
$sql="SELECT * FROM exam_result WHERE exam_type LIKE '%".$_POST["search"]."%'";
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0){
    $output .='
    <table class="table">
    <tr>
    <th class="text-dark fw-bolder">Student Email</th>
    <th class="text-dark fw-bolder">Exam Category</th>
    <th class="text-dark fw-bolder">Mark</th>
    <th class="text-dark fw-bolder">Exam Time</th>
    </tr>
    ';
    while($row=mysqli_fetch_array($result)){
        $output .='
        <tr>
        <td class="text-dark fw-bolder">'.$row["email"].'</td>
        <td class="text-dark fw-bolder">'.$row["exam_type"].'</td> 
        <td class="text-dark fw-bolder">'.$row["mark"].'</td>
        <td class="text-dark fw-bolder">'.$row["exam_time"].'</td>
        </tr>
        ';
    }
    echo $output;?>
    

<?php }else{ echo "<p class='text-dark p-2 fw-bolder'>Results Not Found. </p>";} 

?>

