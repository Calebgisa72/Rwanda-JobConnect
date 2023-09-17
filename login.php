<?php

$hostname = "localhost";
$username = "your_db_username";
$password = "your_db_password";
$database = "your_db_name";

$conn = mysqli_connect($hostname, $username, $password, $database);

if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = $_POST["email"];
    $password = $_POST["password"];
    $login_type = $_POST["login_type"];


    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $query = "SELECT * FROM users WHERE email = '$email' AND login_type = '$login_type'";

    $result = mysqli_query($conn, $query);

    if (!$result) {
        die("Query failed: " . mysqli_error($conn));
    }

    if (mysqli_num_rows($result) == 1) {

        $user = mysqli_fetch_assoc($result);


        if (password_verify($password, $user["password"])) {


            $login_type = $_POST["login_type"];

            if($login_type==="employee"){
             header("location:loginB.html");
            exit;
            }
            elseif ($login_type === "employer") {
         header("location:loginB.html");
         exit;
}

} 
         else {

            echo "Incorrect password. Please try again.";
        }
    } else {

        echo "User not found. Please check your email and login type.";
    }
}


mysqli_close($conn);
?>

