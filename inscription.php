<?php
include_once("identifiants.php");
			if(isset($_POST['login']) && ($_POST['login']!=""))
			{
		   $login=$_POST['login'];
		   $t=testlogin($login);
		   }
?>
<html>
          <head>
			<title>Inscription</title>
			<link href="css/styles.css" rel="stylesheet" type="text/css" media="all" />
			<script>
				function tester_champs()
					{
							    if (form1.login.value == "")
								{
									 alert("entrez votre login s'il vous plait");
									 form1.login.focus();
									 return false;
								}
								else if (form.pwd.value == "")
								{
									 alert("entrez votre mot de passe s'il vous plait");
									 form.pwd.focus();
									 return false;
								}
								else if (form.nom.value == "")
								{
									 alert("entrez votre nom s'il vous plait");
									 form.nom.focus();
									 return false;
								}
								else if (form.prenom.value == "")
								{
									 alert("entrez votre pr&eacute;nom s'il vous plait");
									 form.prenom.focus();
									 return false;
								}
								else if (form.email.value == "")
								{
									 alert("entrez votre email s'il vous plait");
									 form.email.focus();
									 return false;
								}else if ((form.email.value.indexOf('@') == -1) || (form.email.value.indexOf('.') == -1))
								{
									 alert("Ce n'est pas une adresse electronique, verifiez la s'il vous plait");
									 form.email.focus();
									 return false;
				 				}else
								{
									return true;
								}
					}
				function tester_champs2()
					{
							if (form1.login.value == "")
								{
									 alert("entrez votre login s'il vous plait");
									 form1.login.focus();
									 return false;
								}
								else 
								{
									return true;
								}
					}
			</script>
	</head>
	<body>
	<!--la plus grande div le bloc le plus grand qui englobe toutes les parties(les div)  -->
		<div id="contenaire">
			<!-- div de l'entête du site menu -->
			<div class="header">
				<!--div de logo c'est la qu'on met le logo -->
				<div class="logo"><img src="medias/logo.png" /> </div>
				<!--div de la partie juste au dessus du menu -->
				<div class="righttopzone"></div>    
				<!--div de chaque item de menu -->
				<div class="rightbottomzone">
					<!--div de la zone du menu qui contient deux div menu et bandemenu -->
					<div class="rightbottomzone_bgRight">
						 <div class="menu">
							 <ul> 
								  <li><a href="index.php">Accueil</a></li>
								  <li><a href="inscription.php"  class="active">Inscription</a></li>                 			             
							</ul>
						</div>
							   <!--div de la partie qui fait une déviation dans le menu à gauche -->
						<div class="bandemenu"></div>
					</div>
				</div>
		
			</div>
			    <!-- c'est le bloc de bannière c'est là que va l'image de banner et les caractéristiques de div en css  -->
			<div class="banner_graphique"></div>
			    <!--div de contenu de site --> 
			<div class="contenu">
			          <div class="right2"><h2>Inscription :</h2></div>      
				          <div class="gauche">	
						<form id="contactform" name="form1" action="inscription.php" method="post" onSubmit="return tester_champs2();">
							 <table width="100%"  border="0" cellpadding="0" cellspacing="0">
							    <ol>
								<tr>
									<td>
										<li>
											 <label for="login">Login <span class="red">*</span></label>
											 <input id="login" name="login" value="<?php if( isset($_POST['login'])) echo $_POST['login']; ?>" class="text" />
                                               <input type="submit" value="Tester"  name="verif" class="submit2"/>
                                               
          
										</li>
									</td>
                                    <td><?php if(isset($t))   echo $t; ?> </td>
                                    </form>
								</tr>
                                <form id="contactform" name="form" action="inscrire.php?login=<?php if(isset($_POST['login'])) echo $login; ?>" method="post" onSubmit="return tester_champs();">
								<tr>
									<td>
										<li>
											<label for="pwd">Mot de passe <span class="red">*</span></label>
											<input id="pwd" name="pwd" type="password" value="" class="text" />
										</li>
									</td>
								 </tr>
								<tr>
									<td>
										<li>
											<label for="nom">Nom <span class="red">*</span></label>
											<input id="nom" name="nom" value="" class="text" />
										</li>
									</td>
								 </tr>
								<tr>
									<td>
										<li>
											 <label for="prenom">Pr&eacute;nom <span class="red">*</span></label>
											 <input id="prenom" name="prenom" value="" class="text" />
										</li>
									</td>
								  </tr>
								<tr>
									<td>
										<li>
											<label for="email">Email <span class="red">*</span></label>
											<input id="email" name="email" value="" class="text" />
										</li>
									</td>
								 </tr>
								<tr>
									<td>
									<br/>
										<li>
										     <input type="submit" name="env" value="S'inscrire"/>
                                             
										</li>
									</td>
								</tr>
							     </ol>
							</table>
						</form>
					</div>
					<div class="droite">
						<img src="medias/connexion.jpg"/>
					</div>
			</div>
			<!--div du pied de page du site -->
			<div id="footer"></div>

		</div>
	</body>
</html>