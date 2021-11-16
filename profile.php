<?php
require_once 'app/helpers.php';
session_start();

redirect_auth(false, './signin.php');

$uid = $_SESSION['user_id'];

$link = mysqli_connect(MYSQL_HOST, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DB);
$query = "SELECT * FROM users WHERE id=$uid";

$result = mysqli_query($link, $query);

if ($result && mysqli_num_rows($result) === 1) { // Was the Post added to the DB?
  $user = mysqli_fetch_assoc($result);
} else {
  header('location: ./blog.php');
  exit();
}

$last_post_query = "SELECT * FROM posts WHERE user_id=$uid ORDER BY id DESC LIMIT 1";
$last_post_result = mysqli_query($link, $last_post_query);

if ($last_post_result && mysqli_num_rows($last_post_result) === 1) {
  $post = mysqli_fetch_assoc($last_post_result);
}

$page_title = 'Profile';
require_once 'tpl/header.php';
?>

<section class="container p-4 col-md-8">
    <img src="images/profiles/<?= $user['profile_image'] ?>" class="rounded float-start" alt="<?= $user['name'] ?>"
        width="100px">
    <h1 class="mt-4 mb-4 display-3 text-primary"><?= $user['name'] ?></h1>
    <div>
        <span>Email: <?= $user['email'] ?></span>
    </div>

</section>

<!-- Show last post if exists-->
<?php if (!empty($post)) : ?>
<div class="container my-3 col-md-8">
    <h2 class="mt-4 mb-4 display-6">Your Latest Post</h2>
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <div>
                <img src="images/profiles/<?= $user['profile_image'] ?>" alt="default profile image" srcset=""
                    height="40">
                <span><?= htmlentities($user['name']) ?></span>
            </div>

            <span><?= ago($post['created_at']) ?></span>

        </div>
        <div class="card-body">
            <h3 class="card-title"><?= htmlentities($post['title']) ?></h3>
            <p class="card-text"><?= nl2br(htmlentities($post['article'])) ?></p>

            <div class="d-flex justify-content-end">
                <div class="dropdown">
                    <a class="dropdown-toggle text-dark dropdown-no-arrow" id="dropdownMenuButton1"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-three-dots"></i>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item"
                                href="edit-post.php?pid=<?= $post['id'] ?>&token=<?= $_SESSION['token'] ?>"><i
                                    class="bi bi-pencil"></i>
                                Edit</a></li>
                        <li><a id="delete-post" class="dropdown-item" onclick="confirmDelete()"><i
                                    class="bi bi-trash"></i>
                                Delete</a></li>
                    </ul>
                </div>
            </div>
            <script>
            function confirmDelete() {

                var r = confirm("Are you sure you want to DETETE youre Post?");
                if (r == true) {
                    window.location = 'delete-post.php?pid=<?= $post['id'] ?>&token=<?= $_SESSION['token'] ?>';
                }
            }
            </script>

            <?php else : ?>
            <div id="lastPost">
                <h3>You haven't posted yet.</h3>
                <h4>Did you want share your opinion? <a href="./add-post.php">Click Here</a></h4>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php

  include 'tpl/footer.php';