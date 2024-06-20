<?php
require "conn.php";
if(isset($_GET['upd_id'])){
    // check is delete was passed in.
    $id = $_GET['upd_id'];
    $data = $conn->query("SELECT * FROM tasks WHERE id = '$id' ");
    
    $rows = $data->fetch(PDO::FETCH_OBJ);
    // print_r($rows);


    if(isset($_POST['submit'])){
        $task = $_POST['mytask'];
        // It sets (updates) the name column to a value represented by the placeholder :name.
        $update = $conn->prepare("UPDATE tasks SET name  = :name WHERE id = '$id'");
        // This line executes the prepared SQL statement. It binds the value of the $task variable to the ":name" parameter and inserts it into the "tasks" table.
        $update->execute([':name' => $task]);
    
        header("location: index.php");
    } 
}

?>
 <?php include "header.php"; ?>
<form action="update.php?upd_id=<?php echo $id; ?>"
               method="POST">

          <div class="input-group mt-5 col-md-4 mx-auto align-self-center">
            <input type="text" class="form-control" placeholder="Add new todo" name="mytask" required value="<?php echo $rows->name; ?>">
            <div class="input-group-append">
              <button class="btn btn-primary" name="submit" type="submit">Update</button>
            </div>
          </div>

        </form>

        <?php include "footer.php"; ?>
        