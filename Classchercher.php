<!DOCTYPE html>
<html lang="fr">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
<title>Lecture de la table article</title>
<style type="text/css" >
table {border-style: double; border-width: 3px; border-color:black;background-color:paleturquoise;}
</style>
</head>
<body>
  <form action="" method="post">
<input type="submit"  value="retourner"  name="rt"/>
<input type="submit"  value="rechercher"  name="rh"/>
<input type="text" name="rechercher">
</form>
</body>
</html>
<?php
include("connection.php"); 
class rechercher extends connexion{
    public function chercheIMG(){
      if (isset($_POST["rh"])&& $this->idcom=self::connexpdo('galerie')){
        try{
            $nom=htmlspecialchars($_POST['rechercher']);
            $requete=" SELECT * FROM image where imgNom like ' %$nom% '"; 
            $result=$this->idcom->prepare($requete); 
            // $result->execute($_POST['rechercher']);
          if(!$result) 
          {
          $mes_erreur=$this->idcom->errorInfo();
          echo "Lecture impossible, code", $this->idcom->errorCode(),$mes_erreur[2]; 
          }
          else 
          {
          $nbart=$result->rowCount(); 
          echo "<h3>Tous nos images</h3>";
          echo "<table border=\"1\">";
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
          
         }catch(PDOException $except){
          echo"Échec de la connexion",$except->getMessage(); 
          return FALSE;
          exit();
          }
      }
      }
     
  }
  $r=new rechercher();
  $r->chercheIMG();

?>