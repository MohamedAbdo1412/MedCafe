<?php 

if (isset($_GET["errors"])) { // Check if 'errors' exists in $_GET
    if (!empty($_GET["errors"])) { // Ensure it's not empty
        $errors_arr = explode(",", $_GET["errors"]);
    } else {
        exit;
    }
}else{
    $errors_arr[]=null ;
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link href="https://fonts.googleapis.com/css2?family=Changa:wght@200..800&family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Oswald:wght@200..700&family=Roboto:ital,wght@0,100..900;1,100..900&family=Titillium+Web:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,200;1,300;1,400;1,600;1,700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="login-css/style.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>MedCafe Register</title>
    </head>
    <body>
        <header>
            <img src="logo.png" alt="" width="70px" draggable="false" style="user-select: none;">
            <h1>MedCafe Registration</h1>
        </header>
        <section class="main">
            <div class="form-container">
                <h2>Welcome Our New Member</h2>
                <form action="register.php" method="post">
                    <label for="username">Username:</label>
                    <?php if (in_array("username",$errors_arr)):?> 
                    <span style="color:red;"><?= "Invalid Username" ?></span>
                    <?php endif;?>
                    <input type="text" name="username" id="username" required>
                    <label for="email">Email Address:</label>
                    <?php if (in_array("email",$errors_arr)): ?>
                    <span style="color:red;"><?= "Invalid Email" ?></span>
                    <?php endif; ?>
                    <input type="email" name="email" id="email" required>
                    <label for="number">Phone Number:</label>
                    <?php if (in_array("number",$errors_arr)): ?>
                    <span style="color:red;"><?= "Invalid Number" ?></span>
                    <?php endif; ?>
                    <input type="number" name="number" id="number" required>
                    <label for="password">Password:</label>
                    <?php if (in_array("password",$errors_arr)): ?>
                    <span style="color:red;"><?= "Invalid Password" ?></span>
                    <?php endif; ?>
                    <input type="password" name="password" id="password" required>
                    <input type="submit" value="Register" id="submit">
                    
                </form>
            </div>
        </section>
        <footer>
            <p>Made By Zigzag Technical M.A</p>
            
        </footer>
    </body>
</html>