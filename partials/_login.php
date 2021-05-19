<?php 
// echo $_POST['nameL'];
$loginned = false;
include '_dbconnect.php';
$errors = array(
    'user' => false,
    'pass' => false,
);
if(isset($_POST['nameL'])){
    $loginned = false;
    $name = $_POST['nameL'];
    $password = $_POST['passwordL'];
    $sql = "SELECT*FROM `user` WHERE `user`.`name`='$name'";
    $result = mysqli_query($conn, $sql);
    if($result){
        $user = mysqli_fetch_assoc($result);
        $num = mysqli_num_rows($result);
        $email = $user['email'];
        if($num == 1){
            if(password_verify($password, $user['password'])){
                setcookie("name", $user['name'], time()+2592000, "/");
                setcookie("email", $user['email'], time()+2592000, "/");
                setcookie("id", $user['id'], time()+2592000, "/");
                session_start();
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