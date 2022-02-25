<?php
    $servername = "localhost";
    $username = "root";
    $password = "1234";
    $dbName = "new_schema";
    $conn = new mysqli($servername, $username, $password, $dbName);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $query = "SELECT * FROM books";
    $result = $conn->query($query);
    $jsonArray = array();
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $jsonArrayItem = array();
            $jsonArrayItem['label'] = $row['book_name'];
            $jsonArrayItem['value'] = $row['book_price'];
            array_push($jsonArray, $jsonArrayItem);
        }
    }
    $conn->close();
    header('Content-type: application/json');
    echo json_encode($jsonArray);
?>