<?php
require "conn.php";
if(isset($_GET['del_id'])){
    // check is delete was passed in.
    $id = $_GET['del_id'];
    $delete = $conn->prepare("DELETE FROM tasks WHERE id = :id");

    $delete->execute([':id' => $id]);
    header('location: index.php');
}