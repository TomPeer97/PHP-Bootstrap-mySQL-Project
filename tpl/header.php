<?php $site_logo = '<img src="images/wheel.png">'; 


if(isset($_SESSION['user_id'])){
    $uid = $_SESSION['user_id'];
    $link = mysqli_connect(MYSQL_HOST, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DB);

$query = "SELECT * FROM users WHERE id=$uid";

$result5 = mysqli_query($link, $query);
if ($result5 && mysqli_num_rows($result5) === 1) { // Was the Post added to the DB?
  $user = mysqli_fetch_assoc($result5);
}
}
else{
    
    }

?>


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="images/wheel.png" sizes="any" type="image/svg+xml">
    <title><?= $page_title ?> - iGas</title>
</head>

<body class="d-flex flex-column min-vh-100">
    <header>
        <nav class="navbar navbar-expand-sm navbar-dark bg-primary shadow-lg">
            <div class="container">
                <!-- Site Logo -->
                <a class="navbar-brand" href="./"><?= $site_logo ?></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
                    <!-- Site LEFT Navigation-->
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link<?= active_nav_item('About') ?>" href="about.php">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link<?= active_nav_item('Blog') ?>" href="blog.php">Blog</a>
                        </li>
                    </ul>
                    <!-- Site Right Navigation -->
                    <?php if (!empty($_SESSION['user_name'])) : ?>
                    <ul class="navbar-nav">
                        <li c lass="nav-item">
                            <img src="images/profiles/<?= $user['profile_image'] ?>" class="rounded float-start"
                                alt="<?= $user['name'] ?>" width="40px">
                        </li>
                        <li c lass="nav-item">
                            <a href="profile.php" class="nav-link text-light"><?= $_SESSION['user_name'] ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="logout.php">Logout</a>
                        </li>
                    </ul>
                    <?php else : ?>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link<?= active_nav_item('Signin') ?>" href="signin.php">Signin</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link<?= active_nav_item('Signup') ?>" href="signup.php">Signup</a>
                        </li>
                    </ul>
                    <?php endif; ?>
                </div>
            </div>
        </nav>
    </header>
    <main class="flex-fill">