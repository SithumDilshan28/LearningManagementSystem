<?php
include_once("Header.php");
include_once("../DB_Files/db.php");
?>


<div class="col-sm-9 mt-5">
    <p class="bg-dark text-white p-2">List of Feedback</p>
    <?php
    $sql = "SELECT * FROM feedback";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
    ?>
    <table class="table">
        <thead>
            <tr>
                <th class="text-dark fw-bolder" scope="col">Student ID</th>
                <th class="text-dark fw-bolder" scope="col">Feedback</th>
                <th class="text-dark fw-bolder" scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
        <?php  while($row=$result->fetch_assoc()){ 
            echo '<tr>';
                echo '<th class="text-dark fw-bolder" scope="row">'.$row['stu_id'].'</th>';
                echo '<td class="text-dark fw-bolder">'.$row['f_content'].'</td>';
                echo '<td class="text-dark fw-bolder">';
                echo '
                <form action="" method="POST" class="d-inline">
                <input type="hidden" name="id" value='.$row["f_id"].'>
                    <button type="submit" class="btn btn-secondary" name="delete" value="Delete">
                        <i class="uil uil-trash-alt"></i>
                    </button>
                    </form>
                </td>
            </tr>';
            } ?>
        </tbody>
    </table>
    <?php }else{ echo "<p class='text-dark p-2 fw-bolder'>Feedback Not Found. </p>";} 
    
    if(isset($_REQUEST['delete'])){
        $sql="DELETE FROM feedback WHERE f_id={$_REQUEST['id']}";
        if($conn->query($sql)==TRUE){
            echo '<meta http-equiv="refresh" content="0;URL=?deleted"/>';
        }else{
            echo "Delete Failed";
        }
    }
    
    
    ?>
</div>
</div>

</div>

<?php
include_once("Footer.php");
?>