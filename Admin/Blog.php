<?php
include_once("Header.php");
include_once("../DB_Files/db.php");
?>


<div class="col-sm-9 mt-5">
    <p class="bg-dark text-white p-2">List of Blogs</p>
    <?php
    $sql = "SELECT * FROM Blog";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
    ?>
    <table class="table">
        <thead>
            <tr>
                <th class="text-dark fw-bolder" scope="col">Blog ID</th>
                <th class="text-dark fw-bolder" scope="col">Blog Title</th>
                <th class="text-dark fw-bolder" scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
        <?php  while($row=$result->fetch_assoc()){ 
            echo '<tr>';
                echo '<th class="text-dark fw-bolder" scope="row">'.$row['b_id'].'</th>';
                echo '<td class="text-dark fw-bolder">'.$row['b_title'].'</td>';
                echo '<td>';
                echo '
                <form action="editBlog.php" method="POST" class="d-inline">
                <input type="hidden" name="id" value='.$row["b_id"].'>
                <button type="submit" class="btn btn-info mr-3" name="view" value="View"><i class="uil uil-pen"></i></button>
                </form>
                <form action="" method="POST" class="d-inline">
                <input type="hidden" name="id" value='.$row["b_id"].'>
                    <button type="submit" class="btn btn-secondary" name="delete" value="Delete">
                        <i class="uil uil-trash-alt"></i>
                    </button>
                    </form>
                </td>
            </tr>';
            } ?>
        </tbody>
    </table>
    <?php }else{ echo "<p class='text-dark p-2 fw-bolder'>Blog Not Found. </p>";} 
    
    if(isset($_REQUEST['delete'])){
        $sql="DELETE FROM blog WHERE b_id={$_REQUEST['id']}";
        if($conn->query($sql)==TRUE){
            echo '<meta http-equiv="refresh" content="0;URL=?deleted"/>';
        }else{
            echo "Delete Failed";
        }
    }
    
    
    ?>
</div>
</div>


<div>
    <a href="addBlog.php" class="btn btn-danger box">
        <i class="uil uil-plus fa-2x"></i>
    </a>
</div>
</div>

<?php
include_once("Footer.php");
?>