
<!DOCTYPE html>
<html lang="fr">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
<title>Lecture de la table article</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<style type="text/css" >
/* table {border-style:solid; border-width: 0.5px; border-color:black;background-color:paleturquoise;} */
td{
  color: white;
  text-align: center;
}
tr{
  
  text-align: center;
}
</style>
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
  <form action="" method="post">
  <h3>Tous nos images</h3>
  <input type="text" name="rechercher">
<input type="submit"  value="rechercher"  name="rh"/>
</form>

<nav aria-label="Page navigation example">

<ul class="pagination pagination-sm justify-content-end">
  <li class="page-item"><a class="page-link" href="#">FILTRER</a></li>
  <a class="page-link" href="#" aria-label="Next">
      <span aria-hidden="true">&raquo;</span>
    </a>
  </li>

&nbsp;
&nbsp;
&nbsp;
    <li class="page-item">
      <a class="page-link" href="#" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
      </a>
    </li>
    <li class="page-item"><a class="page-link" href="#">1</a></li>
    <li class="page-item"><a class="page-link" href="#">2</a></li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item">
      <a class="page-link" href="#" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
      </a>
    </li>
  </ul>
</nav>

</body>
</html>
<?php


//////rechercher


include("connection.php"); 
class afficherIM extends connexion{
  public function listeImg(){
   try{
    if( $this->idcom=self::connexpdo('galerie')) 
    {
    $requete="SELECT * FROM image "; 
    $result=$this->idcom->query($requete); 
    if(!$result) 
    {
    $mes_erreur=$this->idcom->errorInfo();
    echo "Lecture impossible, code", $this->idcom->errorCode(),$mes_erreur[2]; 
    }
    else 
    {
    $nbart=$result->rowCount(); 
    
    echo "<div class=table-responsive>";
    echo "<table class=table align-middle >";
    echo "<thead class=table-light >";
    echo "<tr><th>id</th> <th>Nom d'image</th> <th>Image</th> <th>supprimer l'image</th>
    <th>modifier l'image</th></tr>";
    echo "</thead>";
    while($ligne=$result->fetch(PDO::FETCH_NUM)) 
    {
    echo "<tr class=align-bottom>";
   echo "<td>".$ligne[0]."</td>";
   echo "<td>".$ligne[1]."</td>";
   echo "<td><img width=100px class= rounded src=\"".$ligne[2]."\"></td>";

 
    echo  "<td> <a href=ClassSupprimer.php?id=".$ligne[0].">supprimer</a></td>";
     echo  "<td> <a href=ClassModifier.php?id=".$ligne[0].">modifier</a>";
   
   
    echo"</td>";
   
    echo "</tr>";
    }
    echo "</table>";
    }
    $result->closeCursor(); 
    $idcom=null; 
    
   }
  }catch(PDOException $except){
    echo"Échec de la connexion",$except->getMessage(); 
    return FALSE;
    exit();
    }
}
}
/////rechercher
class rechercher extends connexion{
  public function chercheIMG(){
    if (isset($_POST["rh"])){
      try{
        $this->idcom=self::connexpdo('galerie');
          $nom=htmlspecialchars($_POST['rechercher']) ;
          $requete=" SELECT * FROM image WHERE imgNom like ' %$nom% '"; 
          $result=$this->idcom->query($requete); 
          $result->execute();
      if ($result->rowCount() > 0 ) {
        echo "<h3>Tous nos images</h3>";
          echo "<table border=\"1\" >";
          echo "<tr><th>id</th> <th>image</th> <th>nom de l'image</th> </tr>";
          while($ligne=$result->fetch(PDO::FETCH_NUM)) 
          {
          echo "<tr>";
         echo "<td>".$ligne[0]."</td>";
         echo "<td>".$ligne[1]."</td>";
         echo "<td><img width=100px  src=\"".$ligne[2]."\"></td>";
          echo "</tr>";
          }
          echo "</table>";
          }
          echo "</table>";
          $result->closeCursor(); 
          $idcom=null; 
      }
       
        
       
        
       catch(PDOException $except){
        echo"Échec de la connexion",$except->getMessage(); 
        return FALSE;
        exit();
        }
    }
    }
   
}

$b=new  connexion();
connexion::connexpdo('galerie');
$c= new afficherIM();
$c->listeImg();
$r=new rechercher();
  $r->chercheIMG();




?>
