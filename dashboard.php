<?php
  session_start();
   if(!isset($_SESSION['name'])){
    header('Location: login.php');
    exit;
   }
   $message =  $_SESSION['name'] ?? 'Unverified';
?>

<!DOCTYPE html>
<html lang="en">
   <?php include('./template/header.php'); ?>

   <div class="dashboard">
       <p class="dashboard_u"><?php echo 'Welcome '. $message .'\'s' . ' dashboard';?></p>
       <a href="update.php" id="edit_id" class="btn">Edit Profile</a>
   </div>
   
   <?php include('./template/footer.php'); ?>
</html>