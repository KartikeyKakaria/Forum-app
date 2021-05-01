<?php 
$loginned = false;
include '_dbconnect.php';
$errors = array(
    'user' => false,
    'pass' => false,
);
if(isset($_POST['emailL'])){
    $loginned = false;
    $email = $_POST['emailL'];
    $password = $_POST['password'];
    $sql = "SELECT*FROM `user` WHERE `user`.`email`='$email'";
    $result = mysqli_query($conn, $sql);
    if($result){
        $user = mysqli_fetch_assoc($result);
        $num = mysqli_num_rows($result);
        if($num == 1){
            if(password_verify($password, $user['password'])){
                session_start();
                setcookie("name", $user['name'], time()+2592000, "/Forum-app");
                setcookie("email", $user['email'], time()+2592000, "/Forum-app");
                setcookie("id", $user['id'], time()+2592000, "/Forum-app");
                $loginned = true;
                $_SESSION['email'] = $email;
                $_SESSION['id'] = $user['id'];
                $_SESSION['name'] = $user['name'];
            }
            else{
                $errors['pass'] = true;
            }
        }
        else{
            $errors['user'] = true;
        }
    }
    
}

?>