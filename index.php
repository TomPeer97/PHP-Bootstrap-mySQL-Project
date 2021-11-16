<?php
require_once 'app/helpers.php';
session_start();

$page_title = 'Home';
require_once 'tpl/header.php';

?>
<!-- Top section -->
<section class="container text-center p-4">
    <h1 class="mt-4 display-3 text-primary">Welcome to i<?= $site_logo ?>gas</h1>
    <p>The best vehicle blogs in the world! Here you can create, edit and remove your post and enjoy from our big
        community.</p>
    <?php
      if(empty($_SESSION['user_id'])){
     
      
     ?>

    <a class="btn btn-outline-primary btn-lg" href="signup.php" role="button">Join the iGas blog now </a>
    <?php }?>
</section>
<!-- Content section -->
<section class="container p-4">
    <div class="row">
        <div class="col-6">
            <p>Write your opinion about cars, track, bikes, airplains, boats and about everything that you can gas with!
                Also you can upload your profile image and see when your post were added.
                But, as a member you must follow our rules else you wont be! And our rules are:
            <ol>1.It is forbidden to swear and use derogatory words that will offend members of the community.</ol>
            <ol>2.Spam messages should not be spread.</ol>
            <ol>3.The status of the blog should not be used for self-promotion.</ol>
            <ol>4.Enjoy! Otherwise all our efforts are worth nothing.</ol>
            If you break any of these laws you will be blocked from our site immediately!

            </p>

        </div>
        <div class="col-6">
            <img src="images/car-race_1280.jpeg" class="img-fluid" alt="Ferrari Race Car">
        </div>
    </div>
</section>
<?php
include 'tpl/footer.php';?>