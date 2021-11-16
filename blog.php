<?php
require_once 'app/helpers.php';
session_start();

$link = mysqli_connect(MYSQL_HOST, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DB);
$query = "SELECT u.name, u.profile_image, p.*
FROM posts p JOIN users u ON u.id = p.user_id
ORDER BY p.created_at DESC";

$result = mysqli_query($link, $query);


$page_title = 'Blog';
require_once 'tpl/header.php';
?>
<section class="container p-4 col-md-8">
    <h1 class="mt-4 mb-4 display-3 text-primary"><?= $site_logo ?> Blog</h1>
    <p>Welcome to our blog! if you want post new add you must be join to our community! <a href="signup.php">Join
            here!</a></p>
    <p>But, as a member you must follow our rules else you wont be! And our rules are:
    <ol>1.It is forbidden to swear and use derogatory words that will offend members of the community.</ol>
    <ol>2.Spam messages should not be spread.</ol>
    <ol>3.The status of the blog should not be used for self-promotion.</ol>
    <ol>4.Enjoy! Otherwise all our efforts are worth nothing.</ol>
    </p>
    <p>If you break any of these laws you will be blocked from our site immediately!</p>
    <!-- Add Post Button IF LOGGED IN -->
    <?php if (is_logged_in()) : ?>
    <a class="btn btn-primary" href="add-post.php" role="button"><i class="bi bi-plus-circle"></i> Add New Post</a>
    <?php endif; ?>

    <?php if ($result && mysqli_num_rows($result) > 0) : ?>

    <h2 class="mt-2 mb-2 display-6"><?= $site_logo ?> posts</h2>

    <?php while ($post = mysqli_fetch_assoc($result)) : ?>
    <div class="my-3">

        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <div>
                    <img src="images/profiles/<?= $post['profile_image'] ?>" alt="default profile image" srcset=""
                        height="40">

                    <span><?= htmlentities($post['name']) ?></span>
                </div>

                <span><?= ago($post['created_at']) ?></span>

            </div>
            <div class="card-body">
                <h3 class="card-title"><?= htmlentities($post['title']) ?></h3>
                <p class="card-text"><?= nl2br(htmlentities($post['article'])) ?></p>

                <!-- Edit or Delete Post if Logged in as post author -->
                <?php if (is_logged_in() && $post['user_id'] === $_SESSION['user_id']) : ?>

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
                <?php endif; ?>

            </div>
        </div>
    </div>
    <?php endwhile; ?>

    <?php else : ?>
    <h2>No Posts yet. Be the first to post on our site.</h2>
    <?php endif; ?>


</section>

</script>

<?php
include 'tpl/footer.php';