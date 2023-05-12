<?php
include_once("ProfileHeader.php");
include_once("../DB_Files/db.php");
$category = $_SESSION["exam_name"];
// $exam=$_POST["exam_name"];
// $_SESSION["exam_name"]=$mark;


$stu_email = $_SESSION['stu_email'];
$sql = "SELECT * FROM students WHERE stu_email='$stu_email'";
$result = $conn->query($sql);
if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    $stuName = $row["stu_name"];
}


?>


<?php
if (isset($_REQUEST["generate"])) {
    $font = "geometric.otf";
    $image = imagecreatefromjpeg("../Images/Certificate/Certificate.jpg");
    $color = imagecolorallocate($image, 0, 134, 249);
    $color1 = imagecolorallocate($image, 64, 46, 14);
    $name = $stuName;
    //set image center text
    $width = imagesx($image);
    $centerX = $width / 2;
    list($left, $bottom, $right,, $top) = imagettfbbox(250, 0, $font, $name);
    $left_offset = ($right - $left) / 2;
    $x = $centerX - $left_offset;
    imagettftext($image, 250, 0, $x, 1150, $color, $font, $name);
    $date = "Date: " . date("Y-m-d");
    imagettftext($image, 35, 0, 2900, 2350, $color1, $font, $date);
    $e_category = $category . " certification exam";
    imagettftext($image, 35, 0, 1300, 1350, $color1, $font, $e_category);
    $exam_category = $category;
    $img = "Certificates/" . $name . "-" . $exam_category . ".jpg";
    $img_pdf = "Certificates/" . $name . "-" . $exam_category . ".pdf";
    $_SESSION["pdf_path"]=$img_pdf;
    imagejpeg($image, $img);
    imagedestroy($image);

    require('fpdf.php');
    $pdf = new FPDF();
    $pdf->AddPage("L");
    $pdf->Image($img, 10, 10, 280, 190);
    $pdf->Output($img_pdf, "F");
}


$img_pdf=$_SESSION['pdf_path'];
use PHPMailer\PHPMailer\PHPMailer;
if (isset($_REQUEST['email'])) {
    //Import PHPMailer classes into the global namespace
    //These must be at the top of your script, not inside a function

    // use PHPMailer\PHPMailer\SMTP;
    // use PHPMailer\PHPMailer\Exception;

    //Load Composer's autoloader
    include('../vendor/autoload.php');

    include '../vendor/phpmailer/phpmailer/src/PHPMailer.php';
    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer();


    //Server settings
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'collegeofimperial@gmail.com';                     //SMTP username
    $mail->Password   = 'Imperial1@@@';                               //SMTP password
    $mail->SMTPSecure = "tls";            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('collegeofimperial@gmail.com', 'Imperial College');
    $mail->addAddress($_POST["email"]);     //Add a recipient              //Name is optional
    // $mail->addReplyTo('prasadmadura00@gmail.com', 'Information');
    // $mail->addCC('maduraprasad19@gmail.com');
    // $mail->addBCC('maduraprasad19@gmail.com');
    $mail->addAttachment($img_pdf);
    $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        )
    );
    // //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = " $category " . "Certificate of Imperial College ";
    $mail->Body    = 'Thank you for Participating for the Imperial College Digital Workshop..';
    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    // $mail->send();
    if ($mail->send()) {
        $passmsg='<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert">Mail Sending Successfully. Mail Not Showing Please Check The Spam Folder.</div>';
    } else {
        $passmsg='<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert">Mail Sending Failed.</div>';
    }
}
?>


<div class="col-sm-6 mt-4 ms-5">
    <div class="container">
        <div class="col-md-12">
            <form action="" method="POST">
                <button type="submit" name="generate" class="btn btn-danger text-light fw-bolder">Generate</button>
                <br><br><br>
                <img class="img-thumbnail" src="<?php echo $img; ?>" alt="">
                <br><br><br>
                <?php  if(isset($passmsg))  {echo $passmsg;}?>
                <br><br>
                <input type="text" class="form-control w-50" placeholder="Enter Email Address" name="email">
                <br><br>
                <button type="submit" class="btn btn-danger text-light fw-bolder">Send As a PDF Email</button>
            </form>
            <br>
        </div>
        <br><br>
    </div>
</div>