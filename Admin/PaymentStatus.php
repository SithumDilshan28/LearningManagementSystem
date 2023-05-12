<?php
include_once("Header.php");
include_once("../DB_Files/db.php");
?>

<div class="col-sm-9 mt-5">
    <p class="bg-dark text-white p-2">List of Payment Status</p>
    <?php
    $sql = "SELECT * FROM courseorder";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
    ?>
    <table class="table">
        <thead>
            <tr>
                <th class="text-dark fw-bolder" scope="col">Order ID</th>
                <th class="text-dark fw-bolder" scope="col">Student Email</th>
                <th class="text-dark fw-bolder" scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
        <?php  while($row=$result->fetch_assoc()){ 
            echo '<tr>';
                echo '<th class="text-dark fw-bolder" scope="row">'.$row['order_id'].'</th>';
                echo '<td class="text-dark fw-bolder">'.$row['stu_email'].'</td>';
                echo '<td>';
                echo '
                <form action="ViewStatus.php" method="POST" class="d-inline">
                <input type="hidden" name="id" value='.$row["co_id"].'>
                <button type="submit" class="btn btn-info mr-3" name="view" value="View"><i class="uil uil-eye"></i></button>
                </form>
                </td>
            </tr>';
            } ?>
        </tbody>
    </table>
    <?php }else{ echo "<p class='text-dark p-2 fw-bolder'>Payment Not Found. </p>";} 
    ?>
</div>
</div>


</div>

