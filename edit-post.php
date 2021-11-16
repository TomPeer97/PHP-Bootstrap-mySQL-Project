<?php
require_once 'app/helpers.php';
session_start();

redirect_auth(false, './signin.php');

if (validate_csrf() && isset($_GET['pid']) && is_numeric($_GET['pid'])) {
  $pid = filter_input(INPUT_GET, 'pid', FILTER_SANITIZE_NUMBER_INT);

  if ($pid) {
    $uid = $_SESSION['user_id'];
    $link = mysqli_connect(MYSQL_HOST, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DB);

    $query = "SELECT * FROM posts WHERE id=$pid AND user_id=$uid";
    $result = mysqli_query($link, $query);

    if ($result && mysqli_num_rows($result) === 1) {
      $post = mysqli_fetch_assoc($result);
    }
  }
}
if (!isset($post)) {
  header('location: ./blog.php');
  exit();
}

if (isset($_POST['submit'])) { // Was the Post Form was Submitted
  $link = mysqli_connect(MYSQL_HOST, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DB);

  $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);
  $title = mysqli_real_escape_string($link, $title);

  $article = filter_input(INPUT_POST, 'article', FILTER_SANITIZE_STRING);
  $article = mysqli_real_escape_string($link, $article);

  $is_form_valid = true;

  if (!$title || mb_strlen($title) < 2) { // Is the an ERROR in Title

    $is_form_valid = false;
    $errors['title'] = '* Title is required with min 2 charecters.';
  }

  if (!$article || mb_strlen($article) < 2) {

    $is_form_valid = false;
    $errors['article'] = '* Article is required with min 2 charecters.';
  }

  if ($is_form_valid) {
    $uid = $_SESSION['user_id'];

    $query = "UPDATE posts SET title='$title', article='$article' WHERE id=$pid";

    $result = mysqli_query($link, $query);

    if ($result && mysqli_affected_rows($link) === 1) { // Was the Post UPDETED in the DB?
      header('location: ./blog.php');
      exit();
    }
    $errors['submit'] = '* Some Error.';
  }
}

$page_title = 'Edit Post';
require_once 'tpl/header.php';
?>

<section class="container p-4">
  <h1 class="display-3 text-primary">Edit your Post</h1>
  <div class="col-md-6">
    <form method="post">
      <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" name="title"
          value="<?= posted_value('title') ? posted_value('title') : htmlentities($post['title']) ?>"
          class="form-control" id="title">
        <?= field_errors('title') ?>
      </div>
      <div class="mb-3">
        <label for="article" class="form-label">Article</label>
        <textarea name="article" class="form-control" id="article"
          rows="3"><?= posted_value('article') ? posted_value('article') : htmlentities($post['article']) ?></textarea>
        <?= field_errors('article') ?>
      </div>
      <div class="d-flex">
        <button type="submit" name="submit" value="submit" class="btn btn-primary">Save Chaneges</button>
        <a class="btn btn-secondary ms-2" href="./blog.php">Cancel</a>
      </div>
      <?= field_errors('submit') ?>
    </form>
  </div>

</section>

<?php
include 'tpl/footer.php';