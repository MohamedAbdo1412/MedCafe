<?php 
function loading_progress(){
    global $progress;
    echo <<< hero
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/css2?family=Changa:wght@200..800&family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Oswald:wght@200..700&family=Roboto:ital,wght@0,100..900;1,100..900&family=Titillium+Web:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,200;1,300;1,400;1,600;1,700&display=swap" rel="stylesheet">
        <title>Waiting For acccept</title>
        <style>
            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }
            body{
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
                background-color: linear-gradient(156deg, rgba(255,255,255,1) 0%, rgb(200, 200, 200) 100%);
                user-select:none;
            }
            .loader-container{
                display: flex;
                flex-direction: column;
                align-items: center;
                
            }
            .loader{
                width: 350px;
                height: 350px;
                border: 50px solid rgba(0, 0, 0, 0.1);
                border-top-color: #323538;
                border-radius: 50%;
                animation: spin 1s linear infinite;
                position:relative;
            }
            @keyframes spin{
                0% { transform: rotate(0deg); }
                100% { transform: rotate(360deg); }
            }
            .loading-text{
                margin-top: 10px;
                font-size: 30px;
                color: #323538;
                font-family:nunito;
                font-weight:bold;
            }
            .position{
            
            width:130px;
            height:130px;
            }
            img{
            position:absolute;
            width:80px;
            top:0%;
            left:0;
            margin:20px;
            }   
        </style>
    </head>
    <body>
        <div class="loader-container">
            <div class="logo-container">
                    <div class="loader"></div>
                    <img src="logo.png" alt="" width="70px" draggable="false" style="user-select: none;">
            </div>        
            <p class="loading-text">$progress</p>
        </div>
    </body>
    </html>
    hero;
    
}

function redirect(){
    global $username ;
    global $password ;
    global $ip ;
    global $progress ;
    if($username == "AhmedYasser2005" && $password =="Ahmed2005Ahmed"){
        $progress = "<h2 style='color:blue;'>Done!</h2>";
        header("Refresh:3; Location: ../admin-page");
        exit;
    }else{
        $progress = "<h2 style='color:red;'>Your Name Or Password is Not Correct</h2>";
    }
}




if($_SERVER["REQUEST_METHOD"]=="POST"){
    $username=(string) $_POST["username"];
    $password=(string) $_POST["password"];
    $ip=(string) $_POST["user-ip"];
    $progress="Loading...";
    loading_progress();
    redirect();
}else{
    echo "Error happened in form please contact the designer";
}
?>