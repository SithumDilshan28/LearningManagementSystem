<?php
include_once("Header.php");
include_once("../DB_Files/db.php");
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<div class="col-sm-9 mt-5 ">
        <div class="input-group mb-3">
            <input type="text" class="form-control" id="search_text" name="search_text" placeholder="Student ID" >
        </div>
        <div id="result"></div>
</div>

<script>
    $(document).ready(function(){
        $('#search_text').keyup(function(){
            var txt=$(this).val();
            if(txt!=''){
                $('#result').html('');
                $.ajax({
                    url: "student_fetch.php",
                    type: "post",
                    data: {search:txt},
                    dataType: "text",
                    success: function (data) {
                        $('#result').html(data);
                    }
                });
            }else{
            }
        });
    });
</script>