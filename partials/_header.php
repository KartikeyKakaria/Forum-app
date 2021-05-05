<?php
if(isset($_COOKIE['name'])){
echo '<nav class="navbar navbar-expand-lg navbar-dark bg-danger">
<a class="navbar-brand" href="/Forum-app">iDiscuss</a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
  <span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
            <a class="nav-link" href="/Forum-app">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/Forum-app/about.php">About</a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Topics
      </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Something else here</a>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/Forum-app/contact.php" tabindex="-1">Contact</a>
        </li>
    </ul>
    <form class="form-inline my-2 my-lg-0 row">
        <div class="container">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-primary mx-2 my-sm-0" type="submit">Search</button>
            <a href="/Forum-app/welcome.php?id='.$_COOKIE['id'].'"><button class="btn btn-success mx-2 my-sm-0" type="button">'.$_COOKIE['name'].'</button>  </a>       
        </div>
    </form>
</div>
</nav>';
}
else{
  echo  '<nav class="navbar navbar-expand-lg navbar-dark bg-danger">
<a class="navbar-brand" href="/Forum-app">iDiscuss</a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
  <span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
            <a class="nav-link" href="/Forum-app">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/Forum-app/about.php">About</a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Topics
        </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Something else here</a>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/Forum-app/contact.php" tabindex="-1">Contact</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/Forum-app/partials/_logout.php" tabindex="-1">Logout</a>
        </li>
    </ul>
    <form class="form-inline my-2 my-lg-0 row">
        <div class="container">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-primary mx-2 my-sm-0" type="submit">Search</button>
            <button type="button" class="btn btn-outline-light" data-toggle="modal" data-target="#loginModal">
                Login
            </button>
            <button type="button" class="btn btn-outline-light mx-2" data-toggle="modal" data-target="#signupModal">
                Signup
            </button>
        </div>
    </form>
</div>
</nav>';
}
include 'partials/_loginModal.html';
include 'partials/_signupModal.html';
?>