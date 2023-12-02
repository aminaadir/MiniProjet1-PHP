<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body class="d-flex h-100 text-center text-bg-dark">
<div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
        <header class="mb-auto">
          <div>
            <h3 class="float-md-start mb-0">MonGalerie</h3>
            <nav class="nav nav-masthead justify-content-center float-md-end">
              <a class="nav-link fw-bold py-1 px-0 active" aria-current="page" href="index.html">Home</a>
              <!-- <a class="nav-link fw-bold py-1 px-0" href="#">Features</a>
              <a class="nav-link fw-bold py-1 px-0" href="#">Contact</a> -->
            </nav>
          </div>
        </header>
<div class=container>
 <div class="row main-content  text-center">
 <h3>Ajouter une image</h3>
<div  class="col-md-12 text-center">
  <br>
  <br>
      <form enctype="multipart/form-data" action="#" method="post">
        Nom d'image<input type="text" name="nomimg">
        <br><br>
         <input type="file" name="img" accept=image />
         <br>
         <br>
         <label for="">Ajouter Commentaire</label>
         <br>
        <textarea></textarea>
         <br><br>
         <input class="btn btn-outline-secondary" type="submit" value="Valider "  name="nb"/>
        
      </form>
</div>
 </div></div>
</body>
</html>
<?php
// if (isset($_POST["rt"])) {
//   header('location:index.html');
// }
  include_once("connection.php");
  class image extends connexion{
   
    public function  testAI(){
      
 try{
  
  
  if (isset($_POST["nb"])) {
    $image= $_FILES['img']['name'];
    $tmp_nom = $_FILES['img']['tmp_name'];
    $nom= $_POST['nomimg'];
    $target = "images/".basename($image);
    move_uploaded_file($tmp_nom, $target);
    $this->idcom=self::connexpdo('galerie');
    $ins = $this->idcom->prepare('INSERT INTO  image(imgNom,imgLink)  VALUES (?,?)');
    $ins->execute(array($nom,$target));
    if ($ins) {
      ?> <script> alert('Image est bien ajouter ')</script>
      <?php }
    
   else {
   echo "Une erreur s'est produite";
   }
     
  }
}
  catch(PDOException $except){
    echo"Échec de la connexion",$except->getMessage(); 
    return FALSE;
    exit();
    }
 
     }
    

    }
$b=new  connexion();
connexion::connexpdo('galerie');
$a= new image();
image::connexpdo('galerie');
$a->testAI();



 ?>