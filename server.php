<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "top-faculty";

$conn = mysqli_connect("$servername", "$username", "$password", "$database");
if (!$conn) {
    die("Connection failed: ");
}
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $fild = $_POST['fild'];
    $to = "abc@gmail.com";
    $subject = "NEW Rgistration";
    $message = "Name = $name, \n\r Email = $email, \n\r Phone = $phone, \n\r Fild = $fild";
    $from = "$email";

    if (mail($to, $subject, $message)) {
        echo "mail sented";
    } else {
        echo "failed";
    }


    $sql = "INSERT INTO data(name,email,phone,fild) VALUES('$name','$email','$phone','$fild')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo "<script>alert('data sumbmited successfully')</script>";
        header('Location:index.html');
    } else {
        echo "<script>alert('data not sumbmited successfully')</script>";
    }
}

?>