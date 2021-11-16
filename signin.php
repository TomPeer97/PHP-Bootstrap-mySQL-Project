<?php
require_once 'app/helpers.php';
session_start();

redirect_auth();

if (validate_csrf() && isset($_POST['submit'])) {
  $link = mysqli_connect(MYSQL_HOST, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DB);

  $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
  $email = trim($email);
  $email = mysqli_real_escape_string($link, $email);

  $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
  $password = trim($_POST['password']);

  $is_form_valid = true;
  if (!$email) {
    $is_form_valid = false;
    $errors['email'] = '* A Valid email address is required.';
  }
  if (!$password) {
    $is_form_valid = false;
    $errors['password'] = '* Please enter your password.';
  }
  if ($is_form_valid) {
    $query = "SELECT * FROM users WHERE email='$email'";

    $result = mysqli_query($link, $query);

    if ($result && mysqli_num_rows($result) > 0) {
      $user = mysqli_fetch_assoc($result);
      if (password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = $user['name'];

        header('Location: ./');
        die;
      } else {
        $errors['submit'] = '* Wrong password.';
      }
    } else {
      $errors['submit'] = '* User was not found or wrong password.';
    }
  }
}
$page_title = 'Signin';
require_once 'tpl/header.php';
?>
<section class="container p-4">
    <div class="col-md-6">
        <h1 class="mt-4 display-6">Enter Email and Password to Signin:</h1>
        <p>Fill you user details and connect to our blog.</p>

        <form method="post">
            <input type="hidden" name="token" value="<?= csrf() ?>">

            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" name="email" value="<?= posted_value('email') ?>" class="form-control" id="email">
                <?= field_errors('email') ?>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="password">
                <?= field_errors('password') ?>
            </div>
            <button type="submit" name="submit" value="submit" class="btn btn-primary">Signin</button>
            <?= field_errors('submit') ?>
        </form>
    </div>
</section>
<?php
include 'tpl/footer.php';