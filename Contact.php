<?php
include_once("Inc/Header.php");
include_once("DB_Files/db.php");
if (isset($_REQUEST['sent'])) {
        $FirstName = $_REQUEST['First_Name'];
        $LastName = $_REQUEST['Last_Name'];
        $Email_Address = $_REQUEST['Email_Address'];
        $Message = $_REQUEST['Message'];

        $sql="INSERT INTO contact(f_name, l_name, email, msg) VALUES ('$FirstName','$LastName','$Email_Address','$Message')";

        if($conn->query($sql) == TRUE){

        }else{
        }
    }

?>
<link rel="stylesheet" href="CSS/Contact.css">
<link rel="stylesheet" href="CSS/responsiveness.css">


<section class="contact">
    <div class="container contact__container">
        <aside class="contact__aside">
            <div class="aside__image">
                <img src="Img/contact.svg" alt="">
            </div>
            <h2>Contact Us</h2>
            <p>Suggestions and Feedbacks</p>
            <ul class="contact__details">
                <li>
                <i class="uil uil-phone-alt"></i>
                <h5>+9411-2324345</h5>
                </li>
                <li>
                <i class="uil uil-envelope-check"></i>
                <h5>Info@Imperial@gmail.com</h5>
                </li>
                <li>
                <i class="uil uil-location-point"></i>
                <h5>Sri Lanka</h5>
                </li>
            </ul>
            <ul class="contact__socials">
            <li><a href="#"><i class="uil uil-facebook-f"></i></a></li>
            <li><a href="#"><i class="uil uil-instagram"></i></a></li>
            <li><a href="#"><i class="uil uil-twitter-alt"></i></a></li>
            <li><a href="#"><i class="uil uil-linkedin-alt"></i></a></li>
            </ul>
        </aside>


        <form action="" method="POST" class="contact__form">
            <div class="form__name">
                <input type="text" name="First Name" placeholder="First Name" required>
                <input type="text" name="Last Name" placeholder="Last Name" required>
            </div>
            <input type="email" name="Email Address" placeholder="Your Email Address" required>
            <textarea name="Message" placeholder="Message"  rows="7" required></textarea>
            <button type="submit" class="button" name="sent">Send Message</button>
        </form>
    </div>
</section>

<?php
include_once("Inc/Footer.php");
?>