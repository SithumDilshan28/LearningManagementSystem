<?php

include_once("Header.php");
include_once("../DB_Files/db.php");
?>

<div class="col-sm-9 mt-5">
<br><br>
    <div class="animated fadeIn">
            <div class="col-lg-12">
                        <div class="card bg-transparent">
                            <div class="card-header bg-dark text-light">
                                <strong class="card-title"> Categories</strong>
                            </div>
                            <div class="card-body">
                            <?php
    $sql = "SELECT * FROM exam_category";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
    ?>
                                <table class="table table-borderless">
                                    <thead class="">
                                        <tr>
                                            <th class="text-dark fw-bolder" scope="col">ID</th>
                                            <th class="text-dark fw-bolder" scope="col">Category Name</th>
                                            <th class="text-dark fw-bolder" scope="col">Time</th>
                                            <th class="text-dark fw-bolder" scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php  while($row=$result->fetch_assoc()){ 
            echo '<tr>';
                echo '<th class="text-dark fw-bolder" scope="row">'.$row['id'].'</th>';
                echo '<td class="text-dark fw-bolder">'.$row['exam_name'].'</td>';
                echo '<td class="text-dark fw-bolder">'.$row['exam_time'].'</td>';
                echo '<td>';
                echo '
                <form action="addQuestion.php" method="POST" class="d-inline">
                <input type="hidden" name="id" value='.$row["id"].'>
                <button type="submit" class="btn btn-info mr-3" name="view" value="View"><i class="uil uil-plus"></i></button>
                </form>
                <form action="" method="POST" class="d-inline">
                <input type="hidden" name="id" value='.$row["id"].'>
                    </form>
                </td>
            </tr>';
            } ?>
                                    </tbody>
                                </table>
                                <?php }else{ echo "Exam Not Found";}

                                ?>
                            </div>
                        </div>
                    </div>



            
            </div>
            </div>
