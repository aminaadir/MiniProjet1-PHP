<?php
session_start();
include_once("connection.php");

if (isset($_Post['btn'])&&!empty($_SESSION['add'])&&!empty($_SESSION['pass'])) {
    header('location:index.html');
}

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.104.2">
    <title>Signin Template · Bootstrap v5.2</title>

    <!-- <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/sign-in/"> -->

    

    

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

  </head>
  <body class="d-flex h-100 text-center text-bg-dark">
  <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
        <header class="mb-auto">
          <div>
            <h3 class="float-md-start mb-0">MonGalerie</h3>
            <nav class="nav nav-masthead justify-content-center float-md-end">
              <!-- <a class="nav-link fw-bold py-1 px-0 active" aria-current="page" href="ClassAfficher.php">Home</a> -->
              <!-- <a class="nav-link fw-bold py-1 px-0" href="#">Features</a>
              <a class="nav-link fw-bold py-1 px-0" href="#">Contact</a> -->
            </nav>
          </div>
        </header>
  <div class=container>
 <div class="row main-content  text-center">
 <div class="col-md-6 text-center">
  <form action="index.html" method="post">
  <br>
<br>
<br>
    <h1 class="h3 mb-3 fw-normal">Please sign in</h1>


    <div>
    <label for="floatingInput">Email address</label>
      <input type="email" class="form-control" name="add"  >
      
    </div>
    <div >
    <label for="floatingPassword">Password</label>
      <input type="password" class="form-control"  name="pass" >
    
    </div>

    <div class="checkbox mb-3">
      <label>
        <input type="checkbox" value="remember-me"> Remember me
      </label>
    </div>
    <button class="w-100 btn btn-lg btn-primary" type="submit" name="btn">Sign in</button>
   
  </form>
 </div>
 </div>
  </div>


    
  </body>
</html>

