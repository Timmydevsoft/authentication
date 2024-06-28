<?php
    include('db.php');

    $email = $name = $password = '';
    $error_alert= array('mail'=>'', 'name'=>'', 'password'=>'');
    if(isset($_POST['submit'])){
        // mail validation
        if(empty($_POST['email'])){
            $error_alert['mail'] = "Email is required";
        }
        else{
            $enteredmail = htmlspecialchars($_POST['email']);
            $pattern = '/^[\w\.-]+@[a-zA-Z\d.-]+\.[a-zA-Z]{2,}$/';
            if(!preg_match($pattern, $enteredmail)){
                $error_alert['mail'] = 'it must be valid mail';
            }
            else{
                $error_alert['mail'] = '';
            }
        }

        // name validation

        if(empty($_POST['name'])){
            $error_alert["name"] = "Name is required";
        }

        else{
            $pattern = '/^[a-zA-Z\s]+$/';
            $enteredname = htmlspecialchars($_POST['name']);
            if(!preg_match($pattern, $enteredname)){
                $error_alert['name'] = 'Name must be valid';
            }
            else{
                $error_alert['name'] = '';
            }
        }

        if(empty($_POST['password'])){
            $error_alert['password'] = "password is required";
        }
        else{
            $pattern = '/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/';
            $enteredpass = htmlspecialchars($_POST['password']);
            if(!preg_match( $pattern, $enteredpass)){
                $error_alert['password'] = 'At least 6 characters including a lowercase, uppercase, number and a special character';
            }
            else{
                $error_alert['password'] ='';
            }
        }

        if(array_filter($error_alert)){

        }
        else{
            $name = mysqli_real_escape_string($conn, $_POST['name']);
            $email = mysqli_real_escape_string($conn, $_POST['email']);
            $hashed_pass = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $password = mysqli_real_escape_string($conn, $hashed_pass);

            $sql = "INSERT INTO userdata(name, email, password) VALUES('$name', '$email', '$password')";

            // check if sent
            if($conn -> query($sql)){
                header('Location: login.php');
            }
            else{
                echo "error :" . mysqli_error($conn);
            }
        }


    }
    mysqli_close($conn);
?>


<!DOCTYPE html>
<html lang="en">
   <?php include("./template/header.php") ?>
   <form class="sign-up-form" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">

    <div class="label_error">
        <label for="name"> Name: </label><br/>
        <div class="error_message"><?php echo htmlspecialchars($error_alert['name']); ?></div>
    </div>
    
    <input class="input_field" type="text" name="name"><br/>
    
    <div class="label_error">
        <label for="email">Email: </label><br/>
        <div class="error_message"><?php echo htmlspecialchars($error_alert['mail']); ?></div>
    </div>
    
    <input class="input_field" type="text" name="email"><br/>
    

    <div class="label_error">
        <label for="password">Password: </label><br/>
        <div class="error_message"><?php echo htmlspecialchars($error_alert['password']); ?></div>
    </div>
    <input class="input_field" type="text" name="password"><br/>
    <div class="down-sighn-in">
        <input type="submit" name="submit"  value="Sign Up" class="submit">
        <div class="">
            <p class="no-acct">Already have an account</p>
            <a  id="noacct" class="submit" href="login.php">Sign In</a>
        </div>
        
    </div>

   </form>
   <?php include("./template/footer.php") ?>
</html>
