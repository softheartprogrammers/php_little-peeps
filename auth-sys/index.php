<?php require "includes/header.php"; ?>

<!-- Should be done after login and starting sessions -->
<?php echo "<h1>hello " . $_SESSION['username'] . "</h1>"; ?>

<?php require "includes/footer.php"; ?>
