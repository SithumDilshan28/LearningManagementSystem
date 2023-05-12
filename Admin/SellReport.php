<?php
include_once("Header.php");
include_once("../DB_Files/db.php");
?>

<div class="col-sm-9 mt-5">
<p class="bg-dark text-white p-2">Report</p>
    <form class="form-inline" method="POST" action="">
        <input type="date"  name="start">
        <span> to </span>
        <input type="date" i name="end">
        <input type="submit" class="btn btn-secondary" name="searchsubmit" value="View">
    </form>

    <?php
    if (isset($_REQUEST['searchsubmit'])) {
        $start = $_REQUEST['start'];
        $end = $_REQUEST['end'];
        $sql = "SELECT * FROM courseorder WHERE date BETWEEN '$start' AND '$end'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            echo '<br>';
            echo '
            <table class="table">
            <thead>
            <tr>
            <th class="text-dark fw-bolder" scope="col">Order ID</th>
            <th class="text-dark fw-bolder" scope="col">Course ID</th>
            <th class="text-dark fw-bolder" scope="col">Student Email</th>
            <th class="text-dark fw-bolder" scope="col">Order Date</th>
            <th class="text-dark fw-bolder" scope="col">Amount</th>
            </tr>
            </thead>
            <tbody>';
            while ($row = $result->fetch_assoc()) {
                echo ' <tr>
                <th class="text-dark fw-bolder" scope="row">' . $row["order_id"] . '</th>
                <td class="text-dark fw-bolder">' . $row["course_id"] . '</td>
                <td class="text-dark fw-bolder">' . $row["stu_email"] . '</td>
                <td class="text-dark fw-bolder">' . $row["date"] . '</td>
                <td class="text-dark fw-bolder">' . $row["amount"] . '</td>
                </tr>';
            }
            echo '
            </tbody>
            </table>';
        }else{
            echo "<div class='alert alert-warning col-sm-6 ml-5 mt-2' role='alert'>No Record Found!</div>";
        }
    }
    ?>


</div>