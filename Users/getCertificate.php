<?php
include_once("ProfileHeader.php");
include_once("../DB_Files/db.php");
// $category = $_POST['name'];
// $_SESSION['exam_name']=$category;
?>
<div class="col-sm-9 ms-5 mt-5 border-0">
<p class="bg-dark text-white p-2 fw-bolder">Quiz Result</p>
    <?php

    $sql = "SELECT * FROM exam_result WHERE email='$_SESSION[stu_email]' LIMIT 1";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        ?>

<table class="table table-borderless text-center text-dark fw-bolder mt-5">
<thead>
    <tr>
    <th scope="col">Category</th>
    </tr>
</thead>
<tbody>
    <?php while ($row = $result->fetch_assoc()) {
        $_SESSION['exam_name'] = $row['exam_type'];
        echo '<tr>';
        echo '<th scope="row">' . $row['exam_type'] . '</th>';
        echo '<td>
        <form action="GenarateCertificate.php?Marks=' . $row["exam_type"] . '" method="POST" class="d-inline">
        <button type="submit" name="getCertificate" class="btn btn-danger text-light fw-bold">Get Certificate</button> 
        <input type="hidden" name="exam_name" value='.$row["exam_type"].'>
        </form>
        </td>
        </tr>';
    }?>
    </tbody>
</table>
<?php }else{ echo "<p class='text-dark p-2 fw-bolder'>Result Not Found. </p>";} 
    ?>
</div>
