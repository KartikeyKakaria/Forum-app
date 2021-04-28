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
</head>

<body>
    <!-- header -->
    <?php include 'partials/_header.php' ?>
    <?php include 'partials/_dbconnect.php' ?>
    <?php
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
    
    <div class="container">
        <h1>Browse questions</h1>
        <div class="media my-2">
            <img src="images/user-image.png" class="mr-3" height="25px" width="25px" alt="...">
            <div class="media-body">
                <h5 class="mt-0">Kartikey</h5>
                Hey i am stuck at installing PyGAME but dont know from where to download. Can Someone help me pls??
            </div>
        </div>
        <div class="media my-2">
            <img src="images/user-image.png" class="mr-3" height="25px" width="25px" alt="...">
            <div class="media-body">
                <h5 class="mt-0">Kartikey</h5>
                Hey i am stuck at installing PyGAME but dont know from where to download. Can Someone help me pls??
            </div>
        </div>
        <div class="media my-2">
            <img src="images/user-image.png" class="mr-3" height="25px" width="25px" alt="...">
            <div class="media-body">
                <h5 class="mt-0">Kartikey</h5>
                Hey i am stuck at installing PyGAME but dont know from where to download. Can Someone help me pls??
            </div>
        </div>
        <div class="media my-2">
            <img src="images/user-image.png" class="mr-3" height="25px" width="25px" alt="...">
            <div class="media-body">
                <h5 class="mt-0">Kartikey</h5>
                Hey i am stuck at installing PyGAME but dont know from where to download. Can Someone help me pls??
            </div>
        </div>
        <div class="media my-2">
            <img src="images/user-image.png" class="mr-3" height="25px" width="25px" alt="...">
            <div class="media-body">
                <h5 class="mt-0">Kartikey</h5>
                Hey i am stuck at installing PyGAME but dont know from where to download. Can Someone help me pls??
            </div>
        </div>
        <div class="media my-2">
            <img src="images/user-image.png" class="mr-3" height="25px" width="25px" alt="...">
            <div class="media-body">
                <h5 class="mt-0">Kartikey</h5>
                Hey i am stuck at installing PyGAME but dont know from where to download. Can Someone help me pls??
            </div>
        </div>
        <div class="media my-2">
            <img src="images/user-image.png" class="mr-3" height="25px" width="25px" alt="...">
            <div class="media-body">
                <h5 class="mt-0">Kartikey</h5>
                Hey i am stuck at installing PyGAME but dont know from where to download. Can Someone help me pls??
            </div>
        </div>
        <div class="media my-2">
            <img src="images/user-image.png" class="mr-3" height="25px" width="25px" alt="...">
            <div class="media-body">
                <h5 class="mt-0">Kartikey</h5>
                Hey i am stuck at installing PyGAME but dont know from where to download. Can Someone help me pls??
            </div>
        </div>
        <div class="media my-2">
            <img src="images/user-image.png" class="mr-3" height="25px" width="25px" alt="...">
            <div class="media-body">
                <h5 class="mt-0">Kartikey</h5>
                Hey i am stuck at installing PyGAME but dont know from where to download. Can Someone help me pls??
            </div>
        </div>
        <div class="media my-2">
            <img src="images/user-image.png" class="mr-3" height="25px" width="25px" alt="...">
            <div class="media-body">
                <h5 class="mt-0">Kartikey</h5>
                Hey i am stuck at installing PyGAME but dont know from where to download. Can Someone help me pls??
            </div>
        </div>
        <div class="media my-2">
            <img src="images/user-image.png" class="mr-3" height="25px" width="25px" alt="...">
            <div class="media-body">
                <h5 class="mt-0">Kartikey</h5>
                Hey i am stuck at installing PyGAME but dont know from where to download. Can Someone help me pls??
            </div>
        </div>
        <div class="media my-2">
            <img src="images/user-image.png" class="mr-3" height="25px" width="25px" alt="...">
            <div class="media-body">
                <h5 class="mt-0">Kartikey</h5>
                Hey i am stuck at installing PyGAME but dont know from where to download. Can Someone help me pls??
            </div>
        </div>
        <div class="media my-2">
            <img src="images/user-image.png" class="mr-3" height="25px" width="25px" alt="...">
            <div class="media-body">
                <h5 class="mt-0">Kartikey</h5>
                Hey i am stuck at installing PyGAME but dont know from where to download. Can Someone help me pls??
            </div>
        </div>
        <div class="media my-2">
            <img src="images/user-image.png" class="mr-3" height="25px" width="25px" alt="...">
            <div class="media-body">
                <h5 class="mt-0">Kartikey</h5>
                Hey i am stuck at installing PyGAME but dont know from where to download. Can Someone help me pls??
            </div>
        </div>
        <div class="media my-2">
            <img src="images/user-image.png" class="mr-3" height="25px" width="25px" alt="...">
            <div class="media-body">
                <h5 class="mt-0">Kartikey</h5>
                Hey i am stuck at installing PyGAME but dont know from where to download. Can Someone help me pls??
            </div>
        </div>
        <div class="media my-2">
            <img src="images/user-image.png" class="mr-3" height="25px" width="25px" alt="...">
            <div class="media-body">
                <h5 class="mt-0">Kartikey</h5>
                Hey i am stuck at installing PyGAME but dont know from where to download. Can Someone help me pls??
            </div>
        </div>
        <div class="media my-2">
            <img src="images/user-image.png" class="mr-3" height="25px" width="25px" alt="...">
            <div class="media-body">
                <h5 class="mt-0">Kartikey</h5>
                Hey i am stuck at installing PyGAME but dont know from where to download. Can Someone help me pls??
            </div>
        </div>
        <div class="media my-2">
            <img src="images/user-image.png" class="mr-3" height="25px" width="25px" alt="...">
            <div class="media-body">
                <h5 class="mt-0">Kartikey</h5>
                Hey i am stuck at installing PyGAME but dont know from where to download. Can Someone help me pls??
            </div>
        </div>
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