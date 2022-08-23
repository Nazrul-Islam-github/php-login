<?php
// ----
$login = false;
$showError = false;
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    include './connection/conn.php';
    $email = $_POST['email'];
    $password = $_POST["password"];

    // $sql = "Select * from users where email='$email' AND password='$password'";
    $sql = "Select * from users where email='$email'";

    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    echo $num;
    if ($num > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            if (password_verify($password, $row['password'])) {
                $login = true;
                session_start();
                $_SESSION['loggin'] = true;
                $_SESSION['email'] = $email;
                header("location: welcome.php");

            } else {
                $login = false;
                $showError = "Invalid Credentials";
            }
        }

    } else {
        $login = false;
        $showError = "Invalid Credentials";
    }

}
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Login</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor"
      crossorigin="anonymous"
    />
  </head>
  <body>
    <!-- Navbar -->
<?php
require 'partials/_nav.php';
?>

<?php
if ($login) {
    echo '<div class="alert alert-success alert-dismissible fade show col-md-5 my-2 text-center" role="alert">
    <strong>Success</strong> Login
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
}

if ($showError) {
    echo '<div class="alert alert-danger alert-dismissible fade show col-md-5 my-2 text-center" role="alert">
    <strong>Success</strong>' . $showError . '
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
}
?>
    <!-- Navbar End -->
    <div class="container">
      <h2>Login Here</h2>
    <form method="post" action="/login_system/login.php">
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label"
            >Email address</label
          >
          <input
            type="email"
            class="form-control"
            id="exampleInputEmail1"
            aria-describedby="emailHelp"
            name="email"
          />
          <div id="emailHelp" class="form-text">
            We'll never share your email with anyone else.
          </div>
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Password</label>
          <input
            type="password"
            class="form-control"
            id="exampleInputPassword1"
            name="password"
          />
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
      </form>
    </div>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"
      integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js"
      integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
