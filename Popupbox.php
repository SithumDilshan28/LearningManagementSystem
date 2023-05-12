<link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
<div class="popup-overlay">
    <div class="popup-box-container">
        <div class="check-container">
        <i class="uil uil-exclamation-octagon"></i>
        </div>
        <div class="popup-message-container">
            <h1>LOGIN REQUIRED!!!</h1>
            <p>Please Log In System Enroll Course.</p>
        </div>
        <a href="Course.php"> <button class="ok-btn">
            <span>Ok</span>
        </button>
    </div>
</div>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Titillium+Web:wght@300&display=swap');

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    html,
    body {
        background-color: #FFF;
        font-size: 18px;
        font-family: 'Titillium Web', sans-serif;
    }

    .popup-overlay {
        position: fixed;
        left: 0;
        top: 0;
        overflow-y: auto;
        overflow-x: hidden;
        background-color: rgba(0, 0, 0, 0.5);
        transition: .5s;
        -webkit-transition: 0.5s;
        -moz-transition: 0.5s;
        -o-transition: 0.5s;
        z-index: 1;
        width: 100vw;
        height: 100vh;
        user-select: none;
    }

    .popup-box-container{
        background-color: whitesmoke;
        width: 400px;
        height: 35vh;
        text-align: center;
        position: absolute;
        left: 50%;
        top: 20%;
        transform: translate(-50%);
        -webkit-transform: translate(-50%);
        -moz-transform: translate(-50%);
        -o-transform: translate(-50%);
        border-radius: 10px;
        -moz-border-radius:10px;
        -ms-border-radius:10px;
        -o-border-radius:10px;
    }

    .check-container i{
        border-radius: 50%;
        -moz-border-radius:50%;
        -ms-border-radius:50%;
        -o-border-radius:50%;
        color: red;
        opacity: 0.6;
        font-size: 70px;
        margin: 50px;
        padding: 20px;
    }

    .popup-message-container p{
        margin-top: 20px;
    }  

    .ok-btn{
        background-color: #00bf8e;
        border: transparent;
        border-radius: 10px;
        -moz-border-radius:10px;
        -ms-border-radius:10px;
        -o-border-radius:10px;
        padding: 10px 15px;
        color: whitesmoke;
        margin-top: 15px;
        width: 25%;
        font-size: 90%;
        cursor: pointer;
    }

    @media only screen and (max-width:400px){
        .popup-box-container{
            width: 300px;
        }
    }
</style>