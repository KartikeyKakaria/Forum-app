<?php
 include '_dbconnect.php';
if(isset($_POST['name'])){
    $errors = array(
        'creation' => false,
        'username' => false,
        'password' => false,
    );
    $creation =  false;
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $passwordConf = $_POST['passwordConf'];
    $sql = "SELECT*FROM `user` WHERE `user`.`name`= '$name'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_affected_rows($conn);
    if($result){
        if($num > 0){
            $errors['username'] = true;
        }
        else{
            if($password == $passwordConf){
                $hash = password_hash($password, PASSWORD_DEFAULT);
                $sql = "INSERT INTO `user` (`id`, `name`, `email`, `password`, `time`) VALUES ('', '$name', '$email', '$hash', current_timestamp())";
                $result = mysqli_query($conn, $sql);
                if($result){
                    $creation = true;
                }
                else{
                    $errors['creation'] = true;
                }
            }
            else{
                $errors['password'] = true;
            }
        }
        if($creation){
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> Your account was created successfully. You can now login and acess the features of our website!.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>';
        }
        if($errors['username']){
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> This username already exists. Please enter a different username
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>';
        }
        if($errors['password']){
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> Passwords do not match. Please enter the passwords correctly
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>';
        }
        if($errors['creation']){
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> We are facing some technical issues due to which we could not create your account. We Regret for the inconvenience caused.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>';
        }
    }
    else{
        echo mysqli_error($conn);
    }
}

?>