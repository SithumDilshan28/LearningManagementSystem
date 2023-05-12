<?php
include_once("ProfileHeader.php");
include_once("../DB_Files/db.php");
?>

<div class="col-sm-7 mt-4 ms-5">
    <p class="bg-dark text-white p-2 fw-bolder">Request Certificate</p>



    <?php
    $sql = "SELECT * FROM exam_category";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
    ?>
        <table class="table table-borderless text-center text-dark fw-bolder mt-5">
            <thead class="bg-secondary">
                <tr>
                    <th scope="col">Category Name</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()) {
                    // $_SESSION['exam_name'] = $row['exam_name'];
                    $exam=$row['exam_name'];
                    echo '<tr>';
                    echo '<td>' . $row['exam_name'] . '</td>';
                    echo '<td>';
                    echo '
                <form action="getCertificate.php?exam_name='.$row['exam_name'].'" method="POST" class="d-inline">
                <input type="hidden" name="exam_name" value='.$row['exam_name'].'>
                <button type="submit" class="btn btn-danger mr-3 fw-bold" name="view" value="View">Get</button>
                </form>
                </td>
            </tr>';
                } ?>
            </tbody>
        </table>
    <?php } else {
        echo "<p class='text-dark p-2 fw-bolder'>Exam Not Found. </p> ";
    } ?>
</div>