<!doctype html>
<html lang="en">

<head>
    <?php include 'partials/_dbconnect.php'; ?>
    <?php
        if(isset($_COOKIE['name'])){
            $comeCan = true;
        }
        else{
            header('Location: /Forum-app/');
        }

      ?>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/footer.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>

<body>
    <?php include 'partials/_header.php'; ?>
    <div class="container my-3">
        <div class="jumbotron bg-info">
            <h1 class="display-4">Welcome <?php echo $_COOKIE['name']?></h1>
            <p class="lead">Welcome to iDiscuss - coding forums. You were loginned as <?php echo $_COOKIE['name']?>. You can ask
                coding related questions and also help others in their problems.</p>
            <hr class="my-4">
            <p>Please follow the following rules while using the website:-</p>
            <ul>
                <li class="list-item">No Spam / Advertising / Self-promote in the forums. </li>
                <li class="list-item">Do not post copyright-infringing material.</li>
                <li class="list-item">Do not post “offensive” posts, links or images.</li>
                <li class="list-item">Do not cross post questions.</li>
                <li class="list-item">Do not PM users asking for help.</li>
                <li class="list-item">Remain respectful of other members at all times.</li>
            </ul>
        </div>
    </div>
    <div class="container">
        <h3 class="text-center">What You Want to explore today?</h3>
        <div class="row">
            <?php
     $sql = "SELECT * FROM `categories`";
     $result = mysqli_query($conn, $sql);
     while($row = mysqli_fetch_assoc($result)){
       # using a for loop to iterate through categories
      echo  '<div class="col-md-4 my-2">
              <div class="card" style="width: 18rem;">
                  <div class="card-body">
                  <img src="https://source.unsplash.com/250x200/?code,'.$row['category_name'].'" alt="" srcset="">
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
    <?php include 'partials/_footer.html'; ?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="js/_logout.js"></script>
</body>

</html>