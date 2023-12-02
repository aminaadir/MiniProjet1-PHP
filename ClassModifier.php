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
              <a class="nav-link fw-bold py-1 px-0 active" aria-current="page" href="ClassAfficher.php">Home</a>
              <!-- <a class="nav-link fw-bold py-1 px-0" href="#">Features</a>
              <a class="nav-link fw-bold py-1 px-0" href="#">Contact</a> -->
            </nav>
          </div>
        </header>

<div class=container>
 <div class="row main-content  text-center">
 <h3>modifier  une image</h3>
<div class="col-md-12 text-center">
    <br>
    <br>
      <form enctype="multipart/form-data" action="#" method="post">
        Nom d'image<input type="text" name="nomimg">
        <br><br>
         <input type="file" name="imgM" accept=image />
         <br>
         <br> <label for="">Ajouter Commentaire</label>
         <br>
        <textarea></textarea>
         <br><br>
         <input class="btn btn-outline-secondary" type="submit" value="modifier "  name="mnb"/>
        
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
 
  class ModifierI extends connexion{
   
    public function  ModImg(){
      
        if (isset($_POST["mnb"])&& isset($_GET['id']) ){ 
           
            try{
                $image= $_FILES['imgM']['name'];
                $tmp_nom = $_FILES['imgM']['tmp_name'];
                $target = "images/".basename($image);
                move_uploaded_file($tmp_nom, $target);
            $this->idcom=self::connexpdo('galerie');
       
            $requete1= "UPDATE image SET imgNom=? , imgLink=? WHERE id =?" ; 
        $nb= $this->idcom->prepare($requete1); 
        
            $nb->execute([$_POST['nomimg'],$target,$_GET['id']]);
            if ($nb) {
                ?> <script> alert('Image est bien modifier ')</script>
                <?php
            }
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
$m= new ModifierI();
$m->ModImg();



 ?>