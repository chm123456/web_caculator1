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

if ($conn) {
    mysqli_query($conn, 'set names utf8');

    $sql = "SELECT expression FROM history_table ORDER BY no DESC LIMIT 10";

    $result = $conn->query($sql);

    if ($result) {
        $data = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row['expression'];
            }
            echo json_encode($data);
        } else {
            echo json_encode(array("message" => "No data found"));
        }
    } else {
        echo json_encode(array("message" => "Query failed: " . mysqli_error($conn)));
    }

    $conn->close();
} else {
    echo json_encode(array("message" => "Database connection failed"));
}


