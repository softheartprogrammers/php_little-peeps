<?php
require "conn.php";

if(isset($_POST['submit'])){
    $task = $_POST['mytask'];

    $insert = $conn->prepare("INSERT INTO tasks (name) VALUES (:name)");
    // This line executes the prepared SQL statement. It binds the value of the $task variable to the ":name" parameter and inserts it into the "tasks" table.
    $insert->execute([':name' => $task]);

    header("location: index.php");
} 