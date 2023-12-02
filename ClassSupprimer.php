<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body  class="d-flex h-100 text-center text-bg-dark">
    <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
        <header class="mb-auto">
          <div>
            <h3 class="float-md-start mb-0">MonGalerie</h3>
            <nav class="nav nav-masthead justify-content-center float-md-end">
            <a class="nav-link fw-bold py-1 px-0 active" aria-current="page" href="ClassAfficher.php">Home</a>
              <!-- <a class="nav-link fw-bold py-1 px-0 active" aria-current="page" href="#">Home</a>
              <a class="nav-link fw-bold py-1 px-0" href="#">Features</a>
              <a class="nav-link fw-bold py-1 px-0" href="#">Contact</a> -->
            </nav>
          </div>
        </header>
<div class=container>
 <div class="row main-content  text-center">
<div class="col-md-12 text-center">
  <br>
  <br>
  <br><br>
  <br>
      <form enctype="multipart/form-data" action="#" method="post">
        <h3>si vous êtes sûre,cliquer sur le bouton supprimer</h3>
        <br><br><br>
        
         <input type="submit" class="btn btn-outline-light" value="supprimer "  name="sup"/>
        
      </form>
</div>
 </div></div>
</body>
</html>
<?php
// if (isset($_POST["rt"])) {
//      header('location:ClassAfficher.php');
// }
  include_once("connection.php");
 
  class supprimerI extends connexion{
   
    public function  SuppImg(){
      
        if (isset($_POST["sup"])&& isset($_GET['id']) ){ 
           
            try{
               
            $this->idcom=self::connexpdo('galerie');
           
            $requete1= 'DELETE  FROM image WHERE id ='.$_GET['id'] .'' ; 
        $nb= $this->idcom->query($requete1); 
        // echo "<p>$nb ligne(s) modifiée(s)<hr /></p>"; 
            // $ins = $this->idcom->prepare('INSERT INTO  image(imgNom,imgLink)  VALUES (?,?)');
            // $ins->execute(array($nom,$target));
            if ($nb) {
           ?> <script> alert('bien supprimer')</script>
            <?php }
           else {
           echo "Une erreur s'est produite";
           }
             
          }
        
          catch(PDOException $except){
            echo"Échec de la pro",$except->getMessage(); 
            return FALSE;
            exit();
            }}

}
}
 
     
    


$b=new  connexion();
connexion::connexpdo('galerie');
$s= new supprimerI();
$s->SuppImg();



 ?>