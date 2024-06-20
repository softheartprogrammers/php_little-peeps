
<?php
require "conn.php";

// * 
    $data = $conn->query("SELECT * FROM tasks");

?>

  <?php include "header.php"; ?>
  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <h2 class="text-center mb-4">Todo Application</h2>
        <form action="insert.php" method="POST">
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Add new todo" name="mytask" required>
            <div class="input-group-append">
              <button class="btn btn-primary" name="submit" type="submit">Add</button>
            </div>
          </div>
        </form>
        <table class="table">
          <thead>
            <tr>
              <th>#</th>
              <th>Task Name</th>
              <th>delete</th>
              <th>update</th>
            </tr>
          </thead>
          <tbody>
            <!-- Fetching datas as objects. -->
            <?php while ($rows = $data->fetch(
              PDO::FETCH_OBJ)): ?>
            <tr>
              <td><?php echo $rows->id; ?></td>
              <td>🎯 <?php echo $rows->name; ?></td>
              <td>
  <a class='btn btn-danger btn-sm delete-btn'
   href="delete.php?del_id=<?php echo $rows->id; ?>">Delete</a>
              </td>

              <td>
  <a class='btn btn-warning btn-sm'
   href="update.php?upd_id=<?php echo $rows->id; ?>">Update</a>
              </td>
            </tr>
            <?php endwhile; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <?php include "footer.php"; ?>

