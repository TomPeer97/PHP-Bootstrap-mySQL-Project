<?php
require_once 'app/helpers.php';
session_start();

$page_title = 'About';
require_once 'tpl/header.php';
?>
<section class="container text-center p-4">
    <h1 class="mt-4 display-3 text-primary">About i<?= $site_logo ?>Gas</h1>
    <p id="headP">Everything started in 2005 while we made our first event about vehicles in texas,usa and saw how many
        passion and
        affection we have as a vehicles community. Then we got an idea of create blog site abot it so we would able to
        talk about our love and passion to vehicles!</p>

    <?php
      if(empty($_SESSION['user_id'])){
     
      
     ?>

    <a class="btn btn-outline-primary btn-lg" href="signup.php" role="button">Join the iGas blog now </a>
    <?php }?>
</section>
<section class="container p-4">
    <div class="row">
        <div class="col-6">
            <p>First, we want thanks to i Gas community because without you we are nothing! Second, all the work we do
                are for our community and we will do our best for you because as member of our community you deserve the
                best!</p>
            <p>But, as a member you must follow our rules else you wont be! And our rules are:
            <ol>1.It is forbidden to swear and use derogatory words that will offend members of the community.</ol>
            <ol>2.Spam messages should not be spread.</ol>
            <ol>3.The status of the blog should not be used for self-promotion.</ol>
            <ol>4.Enjoy! Otherwise all our efforts are worth nothing.</ol>
            If you break any of these laws you will be blocked from our site immediately!
            </p>
        </div>
        <div class="col-6">
            <img src="images/motorcycle.jpg" id="motorcycleImg" class="img-fluid" alt="motorcycle">
        </div>
    </div>
</section>
<?php
include 'tpl/footer.php';