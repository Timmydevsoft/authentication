<?php
    session_start();
    include('db.php');
    if(!isset($_SESSION['id'])){
        header('Location: login.php');
        exit;
    }
    $errors= array('name'=>'', 'password'=>'');

    if(isset($_POST['submit'])){
        if(empty($_POST['name'])){
            $errors['name']= 'Name can\'t be emprty';
        }
        else{
            if(!preg_match('/^[a-zA-Z\s]+$/', $_POST['name'])){
                $errors['name']= 'Name must be valid';
            }
        }
        if(empty($_POST['passsword'])){
            $errors['passsword'] = 'This field is required';
        }
        else{
            $standard = '/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/';
            if(!preg_match($standard, $_POST['password'])){
                $errors['passsword'] = 'At least 6 characters including a lowercase, uppercase, number and a special character';
            }
        }
        if($errors['name']=='' && $errors['password']==''){
            $name = mysqli_real_escape_string($conn, $_POST['name']);
            $password = mysqli_real_escape_string($conn, $_POST['password']);
            $id = $_SESSION['id'];
            $update_sql = "UPDATE userdata SET name = '$name', email = '$email', password = '$password' WHERE id = $id";

            

            if($conn->query($update_sql)){
                $_SESSION['name'] = $_POST['name'];
                header('Location: dashboard.php');
                exit;
            }
            else{
                echo "Error updating the DB " . mysqli_error($conn);
            }
        }
    
    }
   
  

?>
<!DOCTYPE html>
<html lang="en">
    <?php include('./template/header.php');?>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" class="sign-in-form"  method="POST">

        <div class="label_error">
            <label for="email">Name: </label><br/>
            <div class="error_message"><?php echo htmlspecialchars($errors['name']); ?></div>
        </div>
    
       <input class="input_field" type="text" name="name"><br/>
       
        <div class="label_error">
            <label for="password">Password: </label><br/>
            <div class="error_message"><?php echo htmlspecialchars($errors['password']); ?></div>
        </div>


        <input class="input_field" type="text" name="password"><br/>
        <div class="down-sighn-in">
            <input type="submit" name="submit" value="Update Profile" class="submit">
        </div>
        
        
    </form>
    <?php include('./template/footer.php'); ?>
</html>

