

<?php require "includes/header.php"; ?>


<?php require "config.php"; ?>

<?php


// * Do this after u are done with routing, and after logout page and functionality created.

if(isset($_SESSION['username'])){
  header("location: index.php");
}

if (isset($_POST['submit'])){

  if($_POST['email'] == '' OR $_POST['username'] == '' OR $_POST['password'] == ''){
      echo 'Some inputs are empty';
  } else{
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    // $conn -> established database connection object

    $insert = $conn->prepare("INSERT INTO users (email, username, mypassword) VALUES (:email, :username, :mypassword)"); # are placeholders for values that will be provided later. This is a key security measure.

    // It hashes the user's password using the recommended PASSWORD_DEFAULT algorithm. This converts the password into a scrambled form that's safe to store in the database.
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // This line binds actual user data ($email, $username) and the securely hashed password ($hashedPassword) to their respective placeholders in the SQL query.
// It then executes the query, inserting the new user record into the database.

    $insert->execute([
      ':email' => $email,
      ':username' => $username,
      ':mypassword' => $hashedPassword,
    ]);
  }

}

?>
<main class="form-signin w-50 m-auto">
  <form method="POST" action="register.php">
   
    <h1 class="h3 mt-5 fw-normal text-center">Please Register</h1>

    <div class="form-floating">
      <input name="email" type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
      <label for="floatingInput">Email address</label>
    </div>

    <div class="form-floating">
      <input name="username" type="text" class="form-control" id="floatingInput" placeholder="username">
      <label for="floatingInput">Username</label>
    </div>

    <div class="form-floating">
      <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="Password">
      <label for="floatingPassword">Password</label>
    </div>

    <button name="submit" class="w-100 btn btn-lg btn-primary" type="submit">register</button>
    <h6 class="mt-3">Aleardy have an account?  <a href="login.php">Login</a></h6>

  </form>
</main>
<?php require "includes/footer.php"; ?>
