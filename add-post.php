<?php
require_once 'app/helpers.php';
session_start();

redirect_auth(false, './signin.php');

if (isset($_POST['submit'])) { // Was the Post Form was Submitted
  $link = mysqli_connect(MYSQL_HOST, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DB);

  $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);
  $title = trim($title);
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
    $query = "INSERT INTO posts VALUES(NULL, $uid,'$title','$article', NOW())";

    $result = mysqli_query($link, $query);

    if ($result && mysqli_affected_rows($link) === 1) { // Was the Post added to the DB?

      header('location: ./blog.php');
      exit();
    }
  }


}
$page_title = 'Add Post';
require_once 'tpl/header.php';
?>

<section class="container p-4">
    <h1 class="display-3 text-primary">Add a New Post</h1>
    <div class="col-md-6">
        <form method="post">
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" value="<?= posted_value('title') ?>" class="form-control" id="title">
                <?= field_errors('title') ?>
            </div>
            <div class="mb-3">
                <label for="article" class="form-label">Article</label>
                <textarea name="article" class="form-control" id="article"
                    rows="3"><?= posted_value('article') ?></textarea>
                <?= field_errors('article') ?>
            </div>
            <div class="d-flex">
                <button type="submit" name="submit" value="submit" class="btn btn-primary">Publish Post</button>
                <a class="btn btn-secondary ms-2" href="./blog.php">Cancel</a>
            </div>
        </form>
    </div>

</section>

<?php
include 'tpl/footer.php';