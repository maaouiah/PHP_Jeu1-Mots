<html>
          <head>
			<title>Accueil-connexion</title>
			<link href="css/styles.css" rel="stylesheet" type="text/css" media="all" />
			<script>
				function tester_champs()
					{
						if (form.login.value == "")
						{
							alert("entrer votre login s'il vous plait");
						}
						else if (form.pwd.value == "")
						{
							alert("entrer votre mot de passe s'il vous plait");
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
								  <li><a href="index.php"  class="active">Accueil</a></li>
								  <li><a href="inscription.php">Inscription</a></li>          			             
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
				<div class="right2"><h2>Connexion :</h2></div>      
				<div class="gauche">
						<form id="contactform" name="form" action="connexion.php" method="post" onSubmit="tester_champs();">
							 <table width="100%"  border="0" cellpadding="0" cellspacing="0">
							<ol>
								<tr>
									<td>
										<li>
											 <label for="name">Login <span class="red">*</span></label>
											 <input id="name" name="login" value="" class="text" />
										</li>
									</td>
								  </tr>
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
									<br/>
										<li>
										     <input type="submit" name="env" value="Connexion"/>
										</li>
									</td>
								</tr>
								</ol>
							</table>
						</form>
				</div>
			          <div class="droite">
					  <a href="inscription.php"><img src="medias/inscription-boutton.jpg" /></a> <br>
					  <img src="medias/connexion.jpg"/>
			          </div>
			</div>
			<!--div du pied de page du site -->
			<div id="footer"></div>

                    </div>
          </body>
</html>