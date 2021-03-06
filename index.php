<?php include 'partials/_login.php' ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <title>iForums -coding discussions</title>
    <script src="js/logout.js"></script>
    <link rel="stylesheet" href="css/footer.css">
  </head>
  <body>
    <!-- header -->
  <?php include 'partials/_header.php' ?>
  <div id="alert">
  <?php
  if($loginned){
      echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Success!</strong><input type="hidden" value="log" id="logout"> You were loginned successfully!
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>';
    }
    if($errors['pass'] || $errors['user']){
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong><input type="hidden" value="lol" id="logout"> Invalid credentials
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
      echo var_dump($errors['pass']);
      echo var_dump($errors['user']);
    }
    if(isset($_GET['logout'])){
      echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Success!</strong> You were logout successfully!
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>';
    }
    if(isset($_GET['loginned'])){
      echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Success!</strong><input type="hidden" value="log" id="logout"> You were loginned successfully!
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>';
    }
    
  
  ?>
  </div>
  <?php include 'partials/_dbconnect.php' ?>
  <?php include 'partials/_signup.php' ?>
  <!-- slider  starts-->
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="images/code.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="images/Programmer.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="images/C.jpg" class="d-block w-100" alt="...">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<!-- slider ends -->
<!-- category conntainer starts -->
<div class="container my-2">
  <h2 class="text-center">Welcome to iDiscuss - Categories</h2>
  <div class="row">
    <!-- Fetch all the categories -->
    <?php
     $sql = "SELECT * FROM `categories`";
     $result = mysqli_query($conn, $sql);
     while($row = mysqli_fetch_assoc($result)){
       # using a for loop to iterate through categories
      echo  '<div class="col-md-4 my-2">
              <div class="card" style="width: 18rem;">
                  <div class="card-body">
                    <a href="/Forum-app/threads.php?id='.$row['id'].'" class="card-title">'.$row['category_name'].'</a>
                    <p class="card-text">'.substr($row['category_description'], 0 , 100).'<a href="threads.php?id='.$row['id'].'">...</a></p>
                    <a href="/Forum-app/threads.php?id='.$row['id'].'" class="btn btn-primary">View threads</a>
                  </div>
              </div>
            </div>';
     }
    ?>


</div>
</div>
<?php include 'partials/_footer.html' ?>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
    -->
  </body>
</html>