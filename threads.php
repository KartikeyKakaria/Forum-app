<?php
include 'partials/_dbconnect.php';
$asked = false;
$error = false;
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $title = $_POST['title'];
    $description = $_POST['description'];
    $catid = $_GET['id'];
    $userid = $_COOKIE['id'];
    $sql = "INSERT INTO `threads` (`id`, `title`, `description`, `category_id`, `user_id`, `date`) VALUES ('', '$title', '$description', '$catid', '$userid', current_timestamp());";
    $result = mysqli_query($conn, $sql);
    if($result){
        $asked = true;
    }
    else{
        $error = true;
    }
}

?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <title>iForums -coding discussions</title>
    <link rel="stylesheet" href="css/threads.css">
</head>

<body>
    <!-- header -->
    <?php include 'partials/_header.php' ?>
    <?php
    if($asked) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> Your question was posted successfully.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>;
      </div>';
    }
    if($error){
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong>We could not post your question due to some technical issues. We regret for the inconvenience caused.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
    }
    ?>
    <?php
        $id = '';
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = "SELECT*FROM `categories` WHERE `id` = $id";
        $result = mysqli_query($conn, $sql);
        if($result){
            $cat = mysqli_fetch_assoc($result);
                $catName = $cat['category_name'];
            $catDesc = $cat['category_description'];
            echo '<div class="container my-4">
            <div class="jumbotron">
                <h1 class="display-4">Welcome to '.$catName.' forums</h1>
                <p class="lead">'.$catDesc.'</p>
                <hr class="my-4">
                <p>This forum is to share knowledge about '.$catName.' with each other. Please follow the following rules:-</p>
                <ul>
                    <li>No Spam / Advertising / Self-promote in the forums.</li> 
                    <li>Do not post copyright-infringing material.</li>
                    <li>Do not post “offensive” posts, links or images.</li>
                    <li>Do not cross post questions.</li>
                    <li>Do not PM users asking for help.</li>
                    <li>Remain respectful of other members at all times.</li>
                </ul>
                <hr>
                <a class="btn btn-primary btn-lg" href="#" role="button">Browse Topics</a>
            </div>
        </div>';
            
        }
    }
    ?>

    <div class="container" id="ask">
    <?php
    if(isset($_COOKIE['name'])){
        $id = $_GET['id'];
        echo '<h2>Ask question</h2>
        <form method="post" action="/Forum-app/threads.php?id='.$id.'">
            <div class="form-group">
                <label for="exampleInputEmail1">Title</label>
                <input type="text" maxlength="2000" class="form-control" id="exampleInputEmail1" name="title"
                    aria-describedby="emailHelp" placeholder="Title">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Description</label>
                <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Description"
                    name="description">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>';
    }
    else{
        echo '<div class="jumbotron">
        <h1 class="danger display-4">&times</h1>
        <p class="lead">Sorry you cannot ask questions at our website. Please register to the website to start asking questions.</p>
      </div>';
    }
    ?>
    <hr>
    <div id="questions" class="container">
        <h1>Browse questions</h1>
        <!-- using a while loop to pull all threads with the categories as th same in get -->
        <?php
            $id = $_GET['id'];
            $sql = "SELECT*FROM `threads` WHERE `category_id` = $id";
            $result = mysqli_query($conn, $sql);
            if($result) {
                while($row = mysqli_fetch_assoc($result)){
                    $title = $row['title'];
                    $description = $row['description'];
                    $thread_id = $row['id'];
                    if(isset($_COOKIE['name'])){
                        echo '<div class="media my-3">
                        <img src="images/user-image.png" class="mr-3" height="25px" width="25px" alt="...">
                        <div class="media-body">
                            <h5><a href="thread.php?id='.$thread_id.'"><h5 class="mt-0">'.$title.'</a></h5>
                            '.$description.'<br>
                            <form action="thread.php" method="get">
                            <input type="hidden" name="id" value="'.$thread_id.'">
                            <button class="my-2 btn btn-primary">Comment</button>
                            </form>
                        </div>
                    </div><br>';
                    }
                    else{
                        echo '<div class="media my-3">
                        <img src="images/user-image.png" class="mr-3" height="25px" width="25px" alt="...">
                        <div class="media-body">
                            <h5><a href="thread.php?id='.$thread_id.'"><h5 class="mt-0">'.$title.'</a></h5>
                            '.$description.'
                        </div>
                    </div><br>';
                    }
                }
            }
            ?>
    </div>
    <?php include 'partials/_footer.html' ?>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
    -->
</body>

</html>