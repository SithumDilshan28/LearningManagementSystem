//show/hide faq
const faqs = document.querySelectorAll('.faq');

faqs.forEach(faq => {
    faq.addEventListener('click', () => {
        faq.classList.toggle('open');

        //change icon
        const icon = faq.querySelector('.faq__icon i');
        if (icon.className === 'uil uil-plus') {
            icon.className = "uil uil-minus";
        } else {
            icon.className = "uil uil-plus";
        }
    })
})

//Email Check
$(document).ready(function() {
    $('.checking_email').keyup(function(e) {

        var email = $('.checking_email').val();

        $.ajax({
            type: "POST",
            url: "DB_Files/EmailChecking.php",
            data: {
                "check_submit_btn": 1,
                "email_id": email,
            },
            success: function(response) {
                $('.error_email').text(response);
            }
        });
    });
});