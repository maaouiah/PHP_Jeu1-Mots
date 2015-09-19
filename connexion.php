<?php
session_start();
if (empty($_POST['login']) || empty($_POST['pwd']))
{
		header("Location:index.php");
                exit();
	
}
else
{
 include_once("identifiants.php");
    if (isset($_POST['login']) && isset($_POST['pwd']) ) 
     {
      	       
        //On protège les données
        $pseudo = mysql_real_escape_string($_POST['login']);
        $password = mysql_real_escape_string($_POST['pwd']);
        $requete1 = mysql_query('SELECT * FROM ch_membres WHERE login= "'.$pseudo.'"',$db1) 
        or die (mysql_error());
        $data1 = mysql_fetch_assoc($requete1); 
        
        if ($data1['pwd'] == $password) // Acces OK !
        {
       
                $_SESSION['pseudo'] = $pseudo;
				$_SESSION['nom'] = $data1['nom'];
				$_SESSION['prenom'] = $data1['prenom'];
                $_SESSION['idf'] = $data1['idmembre'];
				$_SESSION['score'] = $data1['score'];	
				//header fonction php permet de faire la redirection
				header("Location:instruction.php");
                exit() ;
       
         }
         else // Acces pas OK !
         {
			 header("Location:index.php");
                exit() ;
               
          }
       
      }
}

?>
