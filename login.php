<?php
    session_start();

    include('db.php');
    $errors=array('mail'=>'', 'password'=>'','noentry'=>'');
    if(isset($_POST['submit'])){
        

        if(empty($_POST['email'])){
            $errors['mail']= "Email is required";
        }
        else{
            $standard = '/^[\w\.-]+@[a-zA-Z\d.-]+\.[a-zA-Z]{2,}$/';
            if(!preg_match( $standard, $_POST['email'])){
                $errors['mail']= "It must be valid mail";
            }
            else{
                $errors['mail']= "";
            }
        }

        if(empty($_POST['password']))
        {
            $errors['password'] = 'password is required';
        }
        else{
            $standard =  '/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/';
            if(!preg_match($standard,$_POST['password'])){
                 $errors['password'] = 'At least 6 characters including a lowercase, uppercase, number and a special character';
            }
            else{
                $errors['password'] = '';
            }
        }

        

        $sql = 'SELECT id,name,email,password FROM userdata';
        // look for the data from the data base
        $result = mysqli_query($conn, $sql);

        $entries = mysqli_fetch_all($result, MYSQLI_ASSOC);
       
        print_r("working");

        foreach($entries as $entry){
        
            if($entry['email']== $_POST['email'] && password_verify($_POST['password'], $entry['password'])){
                $_SESSION['name'] = $entry['name'];
                $_SESSION['id'] = $entry['id'];
                header('Location: dashboard.php');
                exit;
            }
          
           
            
        }

    }
    // mysqli_free_result($result);
  mysqli_close($conn);

?>

<!DOCTYPE html>
<html lang="en">
    <?php include('./template/header.php'); ?>
    
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" class="sign-in-form"  method="POST">
    <div class="label_error">
        <label for="email">Email: </label><br/>
        <div class="error_message"><?php echo htmlspecialchars($errors['mail']); ?></div>
    </div>
    
    <input class="input_field" type="text" name="email"><br/>
    

    <div class="label_error">
        <label for="password">Password: </label><br/>
        <div class="error_message"><?php echo htmlspecialchars($errors['password']); ?></div>
    </div>
    <input class="input_field" type="text" name="password"><br/>
    <div class="down-sighn-in">
        <input type="submit" name="submit" value="Log in" class="submit">
        <div class="">
            <p class="no-acct">does not have account</p>
            <a  id="noacct" class="submit" href="index.php">Sign Up</a>
        </div>
        
    </div>
    
    <div id="noentry" class="error_message"><?php echo htmlspecialchars($errors['noentry']); ?></div>
    </form>
    <?php include('./template/footer.php'); ?>
</html>