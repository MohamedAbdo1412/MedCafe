<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Initialize error messages
    $errors = [];
    
    // Sanitize and validate name
    if (empty($_POST["username"])) {
        $errors["username"] = "username";
    } else {
        $username = htmlspecialchars(trim($_POST["username"]));
        if (!preg_match("/[a-zA-Z0-9]/", $username)) {
            $errors["username"] = "username";
        }
    }
    
    // Validate email
    if (empty($_POST["email"])) {
        $errors["email"] = "email";
    } else {
        $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors["email"] = "email";
        }
    }

    // Validate age (number)
    if (empty($_POST["number"])) {
        $errors["number"] = "number";
    } else {
        $number = filter_var((string)$_POST["number"], FILTER_SANITIZE_NUMBER_INT);
        if (!filter_var((int) $number, FILTER_VALIDATE_INT)) {
            $errors["number"] = "number";
        }
    }

    // Validate password (minimum 6 characters)
    if (empty($_POST["password"])) {
        $errors["password"] = "password";
    } elseif (strlen($_POST["password"]) < 6) {
        $errors["password"] = "password";
    } else {
        $password = sha1($_POST["password"]); // Secure hashing
    }

    // Check if there are no errors
    if (empty($errors)) {
        echo "<h2 style='position:absolute; top:50% ; left:50%; transform:translate(-50% , -50%); font-size:32px; color:green;'>Form submitted successfully!</h2>";
        // Process data (e.g., insert into database)
    } else {
        $errors_sent = implode("," , $errors);
        header("location:index.php?errors=$errors_sent");
        exit;
    }
}
?>
<?php


// connecting to database

$conn = mysqli_connect("localhost", "root", "Trap8Trap" ,"med_cafe_db");
if(!$conn){
    echo mysqli_connect_error();
    exit;
}
?>


<?php


$operation = "INSERT INTO users (username, Email, Number, Password) VALUES ('$username', '$email', $number, '$password')";
$checking = mysqli_query($conn , $operation);
if(!$checking){
    echo "A7A";
}else{
    echo "Zalfol";
}

?>


<!-- HTML


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        table{
    width: 100%;
    border-collapse: collapse;
}
th ,td{
    border: 1px solid black;
    padding: 10px 20px ;
    font-weight: 200;
    text-transform: capitalize;
    font-size: 20px;
}
th{
    font-weight: bold;
    border: 1px solid grey ;
    background-color: blueviolet;
    margin: 10px;
}
    </style>
</head>
<body> -->
<?php
// Showing Data Operation

// $query = "SELECT * FROM users";
// $response = mysqli_query($conn , $query);
// echo "<table border='1' cellpadding='10'>
//             <caption>DataBase Information</caption>
//             <tr>
//                 <th>ID</th>
//                 <th>Username</th>
//                 <th>Email</th>
//                 <th>Number</th>
//                 <th>Password</th>
//             </tr>";
// while($row = mysqli_fetch_assoc($response)){
//     echo "
    
//             <tr>
//                 <td>${row['id']}</td>
//                 <td>${row['username']}</td>
//                 <td>${row['email']}</td>
//                 <td>${row['number']}</td>
//                 <td>${row['password']}</td>
//             </tr>";
// }
?>
<!-- </table>
</body> -->


