<?php
include 'partials/_dbconnect.php';
    $replied = false;
    $repliedErr = false;
    $answered = false;
    $answeredError = false;
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST['answer'])){
        $answer = $_POST['answer'];
        $user_id = $_COOKIE['id'];
        $ques_id = $_GET['id'];
        $answerSql = "INSERT INTO `comments` (`id`, `user_id`, `ques_id`, `content`, `time`) VALUES ('', '$user_id', '$ques_id', '$answer', current_timestamp())";
        $answerResult = mysqli_query($conn, $answerSql);
        if($answerResult){
            $answered = true;
        }
        else{
            $answeredError = true;
        }
    }
    if(isset($_POST['reply'])){
        $reply = $_POST['reply'];
        $ques_id = $_POST['quesId'];
        $user_id = $_COOKIE['id'];
        $ReplyingSql = "INSERT INTO `replies` (`id`, `content`, `user_id`, `ques_id`, `date`) VALUES ('','$reply', '$user_id', '$ques_id', current_timestamp())";
        $ReplyingResult = mysqli_query($conn, $ReplyingSql);
        if($ReplyingResult){
            $replied = true;
        }
        else{
            echo mysqli_error($conn);
            $repliedErr = true;
        }
    }
}
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/footer.css">
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
    if($answered){
        echo 'bale bale shawa shawa';
    }
    if($answeredError){
        echo 'bruhhhhhhhhhhhhhhhhhhhhh';
    }
    if($replied){
        echo 'oh bhai replied';
    }
    if($repliedErr){
        echo 'reply mein error';
    }
    ?>
    <?php include 'partials/_dbconnect.php' ?>
    <?php
    $id = '';
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = "SELECT*FROM `threads` WHERE `id` = $id";
        $result = mysqli_query($conn, $sql);
        if($result){
            $row = mysqli_fetch_assoc($result);
            $title = $row['title'];
            $description = $row['description'];
            $user_id=$row['user_id'];
            $fetchUser = "SELECT*FROM `user` WHERE `id` = $user_id";
            $postResult = mysqli_query($conn, $fetchUser);
            $poster = mysqli_fetch_assoc($postResult);
            $poster_name = $poster['name'];
            echo '<div class="container my-4">
            <div class="jumbotron">
                <h1 class="display-4"> '.$title.' </h1>
                <p class="lead">'.$description.'</p>
                <hr class="my-4">
                <p>Posted by <b>'.$poster_name.'</b></p>
            </div>
        </div>';
        }
    }
    ?>
    <div class="container" id="ask">
        <h2>Answer</h2>
        <?php echo '<form action="/Forum-app/thread.php?id='.$_GET['id'].'" method="post">'?>
            <textarea placeholder="Write Answer" name="answer" id="answer" cols="30" rows="10" class="form-control"></textarea>
            <button class="btn btn-success my-2" type="submit">Answer</button>
        </form>
    </div>
    <hr>
    <div id="questions" class="container">
        <h1>Answers</h1>
        <!-- using a while loop to pull all threads with the categories as th same in get -->
        <?php
            $id = $_GET['id'];
            $commentSql = "SELECT*FROM `comments` WHERE `ques_id` = '$id'";
            $commentResult = mysqli_query($conn, $commentSql);
            if($commentResult) {
                while($row = mysqli_fetch_assoc($commentResult)){
                    $commentId = $row['id'];
                    $description = $row['content'];
                    $thread_id = $row['id'];
                    $commenterId = $row['user_id'];
                    $commenterSql = "SELECT*FROM `user` WHERE `id` = '$commenterId'";
                    $commenterResult = mysqli_query($conn, $commenterSql);
                    $commenter = mysqli_fetch_assoc($commenterResult);
                    $commenter_name = $commenter['name'];
                    $replySql = "SELECT*FROM `replies` WHERE `ques_id` = '$commentId'";
                    $replyResult = mysqli_query($conn, $replySql);
                    $replies = '';
                    while($reply = mysqli_fetch_assoc($replyResult)){
                        $replyDescription = $reply['content'];
                        $replierId = $reply['user_id'];
                        $replierSql = "SELECT*FROM `user` WHERE `id` = '$replierId'";
                        $replierResult = mysqli_query($conn, $replierSql);
                        $replier = mysqli_fetch_assoc($replierResult);
                        $replierName = $replier['name'];
                        $replies.='<div class="media">
                        <img height="25px" width="25px" src="images/user-image.png" class="mr-3" alt="...">
                        <div class="media-body">
                          <h5 class="mt-0">'.$replierName.'</h5>
                          '.$replyDescription.'
                        </div>
                      </div>';
                    }
                    echo '
                    <div class="media my-2">
                    <div class="commenet">
                    <div class="media-body">
                            <img src="images/user-image.png" class="mr-3" height="25px" width="25px" alt="...">
                            <a href="thread.php">
                                <h5 class="mt-0">'.$commenter_name.'</h5>
                            </a>
                            '.$description.'
                        </div> 
                        <br>
                        <button id="reply'.$thread_id.'" onclick="arrow(\'reply'.$thread_id.'\')" class="btn btn-primary" type="button" data-toggle="collapse" data-target="#multiCollapseExample'.$thread_id.'" aria-expanded="false" aria-controls="multiCollapseExample'.$thread_id.'">View Replies &darr;</button>
                        <br>
                        <br>
                        <div class="col">
                            <div class="replies collapse multi-collapse" id="multiCollapseExample'.$thread_id.'">
                                <h3>Reply</h3>
                                <form action="/Forum-app/thread.php?id='.$id.'" method="post">
                                    <input type="hidden" name="quesId" value="'.$thread_id.'">
                                    <textarea name="reply" id="reply" cols="30" rows="2"></textarea><br>
                                    <button class="btn btn-danger" type="submit">Reply</button>
                                </form>
                                <div class="card card-body my-3">
                                    <h4>Replies</h4>
                                    '.$replies.'
                                </div>
                            </div>
                        </div>
                    </div>
                        </div><br>';
                }
            }
            else{
                echo mysqli_error($conn);
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
    <script src="js/thread.js"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
    -->
</body>

</html>