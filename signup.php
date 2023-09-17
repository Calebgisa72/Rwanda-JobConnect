<?php

$host = "localhost";
$username = "caleb";
$password = "1234";
$database = "jobconnect";

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userType = $_POST["userType"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $country = $_POST["country"];
    $countryCode = $_POST["countryCode"];
    $telephone = $_POST["telephone"];

    $sql = "INSERT INTO users (user_type, name, email, password, country, country_code, telephone)
            VALUES ('$userType', '$name', '$email', '$password', '$country', '$countryCode', '$telephone')";

    if ($conn->query($sql) === TRUE) {
        echo "Registration successful!";

    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

