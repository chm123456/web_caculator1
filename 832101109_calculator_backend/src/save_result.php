<?php

// Connect to your MySQL database
$servername = "localhost";
$username = "root";
$password = "123456";
$dbname = "calculator";

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$expression = $_GET['result1'];
$res = $_GET['result2'];

$re_exp = str_replace(" ", "+", $expression);
$final_exp = $re_exp . "=" . $res;
echo "$final_exp";

if ($conn) {
    //设置编码格式
    mysqli_query($conn, 'set names utf8');

    $sql = "insert into history_table(expression,result) values('$final_exp','$res')";

    $result = mysqli_query($conn, $sql);


} else {
    echo 'Error';
}


