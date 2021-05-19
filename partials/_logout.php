<?php
if(isset($_GET['logout'])){
    if(isset($_COOKIE['name'])){
        setcookie("name", NULL, time()-3600,"/");
        setcookie("email", NULL, time()-3600, "/");
        setcookie("id", NULL, time()-3600,"/");
        echo $_COOKIE['name'];
        header("Location: /Forum-app/?logout=true");
    }
}
else{
    header("Location: /Forum-app/welcome.php");
}

?>