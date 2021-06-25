<?php
include 'partials/_dbconnect.php';
$search =false;
$results = array();
if(isset($_GET['query'])){
  //Gets the query
  $query = $_GET['query'];
  //splits the query into words
  $words = preg_split("/\s/",$query);
  //fetches all the questions
  $sql = "SELECT*FROM `threads`";
  $result = mysqli_query($conn, $sql);
  if($result){
    while($row = mysqli_fetch_assoc($result)){
      //fetches all the properties of the question and sets initially that is the search result matching with query to false
      $isIncluded = false;
      $id = $row['id'];
      $description = $row['description'];
      $title = $row['title'];
      //sets the number of times the query was found to be 0 initially
      $included = 0;
      //loops through all words of the query
      foreach($words as $key => $word){
        //checks whether the word is included in the description of the question or not
        $wordPattern = "/\W$word\W/i";
        $descriptionT = ".".$description.".";
        if(preg_match_all($wordPattern,$descriptionT) > 0){
          //sets isIncluded to true if it finds the word in the description
          $search = true;
          $isIncluded = true;
          $included++;
        } 
      }
      if($isIncluded){
        //pushes the question into the array with all the search results
       $results[$id] = $included;
      }
      
    }
  }
  else{
    die("we failed to connect due to some issue please try again later");
  }
  // echo var_dump($results);
  // echo "<br>";
  //sorts the array according to the number of times the words were found in the query
  arsort($results);
  // echo var_dump($results);
}
else{
  //sends the user to the home page if the user enters the page without giving any jQuery
  header("Location: /Forum-app/index.php");
}
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/footer.css">
    <title>Hello, world!</title>
</head>

<body>
    <?php include 'partials/_header.php'; ?>
    <div class="container-fluid my-3 mx-5">
        <h1><?php 
          if($_SERVER['REQUEST_METHOD'] == "GET"){
            if($search){ 
            echo "Search Results For: <i>".$_GET['query']."</i>"; 
            }
            else{ echo "Sorry we could not find any matches for that search";}
          }
  ?></h1>
  <hr>
        <div class="my-3 mx-4 container results">
            <?php
        foreach($results as $id => $value){
          $showSql = "SELECT*FROM `threads` where `id`= '$id'";
          $showResult = mysqli_query($conn, $showSql);
          if($showResult){
            while($row = mysqli_fetch_assoc($showResult)){
              $id = $row['id'];
              $title = $row['title'];
              $Description = $row['description'];
              echo "<div class='container result'>
              <h2><a href='/Forum-app/thread.php?id=$id'>$title</a></h2>
              <p>$Description</p>
              </div>";
            }
          }
          else{
            echo "lol";
          }
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