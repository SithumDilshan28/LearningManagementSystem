<?php
session_start();
include_once("../../DB_Files/db.php");

$question_no="";
$question="";
$opt1="";
$opt2="";
$opt3="";
$opt4="";
$answer="";
$count="";
$ans="";

$queno=$_GET["questionno"];

if(isset($_SESSION["answer"][$queno])){
    $ans=$_SESSION["answer"][$queno];
}

$res=mysqli_query($conn,"SELECT * FROM add_ques WHERE catergory='$_SESSION[exam_category]' && ques_no=$_GET[questionno]");
$count=mysqli_num_rows($res);

if($count==0){
    echo "over";
}else{
    while($row=mysqli_fetch_array($res)){
        $question_no=$row["ques_no"]; 
        $question=$row["question"];
        $opt1=$row["opt1"];
        $opt2=$row["opt2"];
        $opt3=$row["opt3"];
        $opt4=$row["opt4"];

    }
    ?>


    <table style="margin-top: -50px;" class="table ms-3">
        <tr>
            <td class="fw-bolder text-dark border-0">
                <?php echo "(" .$question_no .")   " . $question; ?>
            </td>
        </tr>
    </table>

    <table class="table border-0 ms-5">
        <tr>
            <td class="border-0">
                <input class="text-dark" type="radio" name="r1" id="r1" value="<?php echo $opt1; ?>"  onclick="radioclick(this.value,<?php echo $question_no ?>)"
                <?php
                if($ans==$opt1){
                    echo "checked";
                }
                ?>>
                <label class="text-dark fw-bolder ms-3" for=""><?php echo $opt1; ?></label> 
            </td>
        </tr>


        <tr>
            <td class="border-0">
                <input type="radio" name="r1" id="r1" value="<?php echo $opt2; ?>" onclick="radioclick(this.value,<?php echo $question_no ?>)"
                <?php
                if($ans==$opt2){
                    echo "checked";
                }
                ?>>
                <label class="text-dark fw-bolder ms-3" for="" ><?php echo $opt2; ?></label>
            </td>
        </tr>


        <tr>
            <td class="border-0">
                <input type="radio" value="<?php echo $opt3; ?>" name="r1" id="r1" onclick="radioclick(this.va,<?php echo $question_no ?>)"
                <?php
                if($ans==$opt3){
                    echo "checked";
                }
                ?>>
                <label class="text-dark fw-bolder ms-3"  for="" ><?php echo $opt3; ?></label>

            </td>
        </tr>


        <tr>
            <td class="border-0">
                <input type="radio" onclick="radioclick(this.value,<?php echo $question_no ?>)" value="<?php echo $opt4; ?>" name="r1" id="r1" 
                <?php
                if($ans==$opt4){
                    echo "checked";
                }
                ?>>
                <label  class="text-dark fw-bolder ms-3" for=""><?php echo $opt4; ?></label>
            </td>
        </tr>


    </table>
    <?php
}

?> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>