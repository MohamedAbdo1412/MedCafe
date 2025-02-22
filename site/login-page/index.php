<?php
session_start();
if(isset($_SESSION['username'])){
    if($_SESSION['admin']=='1'){
        header('Location:../admin-page/index.php');
        exit;
    }else{
        header('Location:../home-page/index.php');
        exit;
    }
    
}
function getUserIP() {
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        return $_SERVER['HTTP_CLIENT_IP']; // IP from shared internet
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        return $_SERVER['HTTP_X_FORWARDED_FOR']; // IP from proxy
    } elseif (!empty($_SERVER['REMOTE_ADDR'])) {
        return $_SERVER['REMOTE_ADDR']; // Direct IP address
    }
    return 'UNKNOWN'; // Default fallback
    
}
$error_login="";
if($_SERVER['REQUEST_METHOD']=="POST"){
    //Identification of post params
    $username= $_POST['username'];
    $password= sha1($_POST['password']);
    // connecting to database 
    $conn=mysqli_connect('localhost' ,'root','Trap8Trap','med_cafe_db');
    if(!$conn){
        echo mysqli_connect_error();
        exit;
    }
    // Making query to perform action
    $login_query = "SELECT * FROM users Where username='$username' AND password='$password'";
    // Taking Result
    $result =mysqli_query($conn , $login_query);
    // putting result into array
    $result_array =mysqli_fetch_assoc($result) ;
    if(mysqli_num_rows($result)>0){
        $_SESSION['username'] = $result_array['username'] ;
        $_SESSION['admin']= $result_array['admin'];
        var_dump($_SESSION['admin']); 
        if($_SESSION['admin']=='1'){
            header('Location:../admin-page/index.php ');
            exit;

        }elseif($_SESSION['admin']=='0'){
            header('Location:../home-page/index.php ');
            exit;
        } 
        else{
            header('Location:../login-page/logout.php ');
            exit;
            
        }
    }else{
            $error_login= "<p style='color:red;'>Invalid Username Or Password Is Invalid</p>";
        }
    
    
}











?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link href="https://fonts.googleapis.com/css2?family=Changa:wght@200..800&family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Oswald:wght@200..700&family=Roboto:ital,wght@0,100..900;1,100..900&family=Titillium+Web:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,200;1,300;1,400;1,600;1,700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="login-css/style.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>MedCafe Login</title>
    </head>
    <body>
        <header>
            <img src="logo.png" alt="" width="70px" draggable="false" style="user-select: none;">
            <h1>MedCafe Login</h1>
        </header>
        <section class="main">
            <div class="form-container">
            <h2>Welcome Again</h2>
            <?php if(!empty($error_login)){echo $error_login;} ?>
            <form action="index.php" method="POST">
                <label for="username">Username:</label>
                <input type="text" name="username" id="username" required>
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" required>
                <input type="submit" value="Login" id="submit">
                <input type='hidden' id='user-ip' name='user-ip' value='<?= getUserIP(); ?>' required>            
            </form>
        </div>
        </section>
        <footer>
            Made By Zigzag Technical M.A
        </footer>
    </body>
</html>