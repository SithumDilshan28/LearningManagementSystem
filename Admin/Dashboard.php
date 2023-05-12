<?php
include_once("Header.php");
include_once("../DB_Files/db.php");

$sql="SELECT * FROM course";
$result=$conn->query($sql);
$tot_course=$result->num_rows;

$sql="SELECT * FROM students";
$result=$conn->query($sql);
$tot_stu=$result->num_rows;

$sql="SELECT * FROM courseorder";
$result=$conn->query($sql);
$tot_sale=$result->num_rows;

?>
<div class="col-sm-9 mt-5">
    <div class="row mx-5 text-center">

<div class="col-12 col-lg-4 mt-5">
        <div class="card bg-transparent border-secondary">
            <div class="card-body ">
                <div class="clearfix">
                    <br>
                    <i class="uil uil-video bg-danger p-3 font-2xl mr-3 float-left text-light rounded-circle"></i>
                    <br><br>
                    <div class="h5 text-dark fw-bolder mb-0 mt-1 "> <?php echo $tot_course;?></div>
                    <div class=" text-uppercase font-weight-bold font-xs medium text-dark fw-bolder">Courses</div>
                </div>
                <div class="b-b-1 pt-3"></div>
                <hr>
                <div class="more-info pt-2" style="margin-bottom:-10px;">
                    <a class="font-weight-bold font-xs btn-block text-dark fw-bolder small" href="Course.php">View More <i class="fa fa-angle-right float-right font-lg"></i></a>
                </div>
            </div>
        </div>
    </div>




    <div class="col-12 col-lg-4 mt-5">
        <div class="card bg-transparent border-secondary">
            <div class="card-body ">
                <div class="clearfix">
                    <br>
                    <i class="uil uil-user bg-success p-3 font-2xl mr-3 float-left text-light fw-bolder rounded-circle"></i>
                    <br><br>
                    <div class="h5 text-dark fw-bolder mb-0 mt-1 "><?php echo $tot_stu;?></div>
                    <div class=" text-uppercase font-weight-bold font-xs medium text-dark fw-bolder">Students</div>
                </div>
                <div class="b-b-1 pt-3"></div>
                <hr>
                <div class="more-info pt-2" style="margin-bottom:-10px;">
                    <a class="font-weight-bold font-xs btn-block text-dark fw-bolder small" href="Students.php">View More <i class="fa fa-angle-right float-right font-lg"></i></a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-lg-4 mt-5">
        <div class="card bg-transparent border-secondary">
            <div class="card-body ">
                <div class="clearfix">
                    <br>
                    <i class="uil uil-pricetag-alt bg-dark p-3 font-2xl mr-3 float-left text-light fw-bolder rounded-circle"></i>
                    <br><br>
                    <div class="h5 text-dark fw-bolder mb-0 mt-1 "> <?php echo $tot_sale;?> </div>
                    <div class=" text-uppercase font-weight-bold font-xs medium text-dark fw-bolder">Sales</div>
                </div>
                <div class="b-b-1 pt-3"></div>
                <hr>
                <div class="more-info pt-2" style="margin-bottom:-10px;">
                    <a class="font-weight-bold font-xs btn-block text-dark fw-bolder small" href="SellReport.php">View More <i class="fa fa-angle-right float-right font-lg"></i></a>
                </div>
            </div>
        </div>
    </div>

    

    <div class="col-sm-12 mt-5">
    <div class=" mt-5 text-center">
        <p class="bg-dark text-white p-2">Course Ordered</p>
        <?php
    $sql = "SELECT * FROM courseorder";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
    ?>
        <table class="table ">
            <thead>
                <tr>
                    <th class="text-dark fw-bolder" scope="col">Order ID</th>
                    <!-- <th scope="col">Course ID</th> -->
                    <th class="text-dark fw-bolder" scope="col">Student Email</th>
                </tr>
            </thead>
            <?php  while($row=$result->fetch_assoc()){ 
            echo '<tr>';
                echo '<th class="text-dark fw-bolder" scope="row">'.$row['order_id'].'</th>';
                // echo '<td>'.$row['course_id'].'</td>';
                echo '<td class="text-dark fw-bolder">'.$row['stu_email'].'</td>';
                echo '<td>';
                echo '
            </tr>';
            } ?>
            </tbody>
        </table>
        <?php }
        
        ?>
    </div>



</div>



<?php
include_once("Footer.php")
?>