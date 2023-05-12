<?php
include_once("../DB_Files/db.php");

$output='';
$sql="SELECT * FROM students WHERE stu_id LIKE '%".$_POST["search"]."%'";
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0){
    $output .='
    <table class="table">
    <tr>
    <th class="text-dark fw-bolder">Student ID</th>
    <th class="text-dark fw-bolder">Name</th>
    <th class="text-dark fw-bolder">Email</th>
    <th class="text-dark fw-bolder">Action</th>
    </tr>
    ';
    while($row=mysqli_fetch_array($result)){
        $output .='
        <tr>
        <td class="text-dark fw-bolder">'.$row["stu_id"].'</td>
        <td class="text-dark fw-bolder">'.$row["stu_name"].'</td> 
        <td class="text-dark fw-bolder">'.$row["stu_email"].'</td>
        <td class="text-dark fw-bolder">
        <form action="editStudent.php" method="POST" class="d-inline">
        <input type="hidden" name="id" value='.$row["stu_id"].'>
        <button type="submit" class="btn btn-info mr-3 fw-bolder" name="view" value="View">View</button>
        </form>
        </td>
        </tr>
        ';
    }
    echo $output;?>
    

<?php }else{ echo "<p class='text-dark p-2 fw-bolder'>Student Not Found. </p>";} 

?>

