<?php require "includes/header.php"; ?>


<?php require "config.php"; ?>

<?php

  // check for submit

  // take the data and do the query


  // execute the query


  // fetch the data


  // check for the row count 

  // and use the password_verify function

  // * Do this after u are done with routing, and after logout page and functionality created.

  if(isset($_SESSION['username'])){
    header("location: index.php");
  }





  if (isset($_POST['submit'])){
      if($_POST['email'] == '' OR $_POST['password'] == ''){
        echo "Some inputs are empty";
      } else{
        $email = $_POST['email'];
        $password = $_POST['password'];


        // from the users table where the email column matches the value stored in the $email variable.
        $login = $conn->query("SELECT * FROM users WHERE email = '$email' ");

        // executes the SQL query that was prepared
        $login->execute();


        // This fetches the result of the query (if a matching user is found) and stores it as an associative array in the $data variable. The PDO::FETCH_ASSOC mode ensures that the returned array is keyed by the column names from the database.
        $data = $login->fetch(PDO::FETCH_ASSOC);


        //  checks how many rows were returned by the query.
// If the count is greater than 0, it means a user record with the provided email was found in the database.
// If the count is 0, the provided email doesn't exist in the database, and the error message "Email wrong" is displayed.
        if($login->rowCount() > 0){

          // This step occurs only if the email was found in the database

          // compare the entered password ($password) with the hashed password retrieved from the database ($data['mypassword']).

          // If the passwords match, the user is logged in; otherwise, the error message "email or password is wrong" is displayed.
          if(password_verify($password, $data['mypassword'])){

            // * After u have talked about the login stuffs explain sections in respect to this . start session in header and so on.


            $_SESSION['username'] = $data['username'];
            $_SESSION['email'] = $data['email'];
            header("location: index.php");
            echo "<h1>Logged in.</h1>";
          } else{
            echo "<h1>email or password is wrong.</h1>";
          }


        } else{
          echo "<h1>Email wrong.</h1>";
        }
      }
    }



?>
<main class="form-signin w-50 m-auto">
  <form method="post" action="login.php">
    <!-- <img class="mb-4 text-center" src="/docs/5.2/assets/brand/bootstrap-logo.svg" alt="" width="72" height="57"> -->
    <h1 class="h3 mt-5 fw-normal text-center">Please sign in</h1>

    <div class="form-floating">
      <input type="email" class="form-control" name="email" id="floatingInput" placeholder="name@example.com">
      <label for="floatingInput">Email address</label>
    </div>
    
    <div class="form-floating">
      <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
      <label for="floatingPassword">Password</label>
    </div>

    <button class="w-100 btn btn-lg btn-primary" name='submit' type="submit">Sign in</button>
    <h6 class="mt-3">Don't have an account  <a href="register.php">Create your account</a></h6>
  </form>
</main>
<?php require "includes/footer.php"; ?>
