<?php
	define("HOST", "localhost");
	define("USER", "root");
	define("PWD", "Iso17025@");
	define("DBNAME", 'schoolapp');
	
	$link = @mysqli_connect(HOST, USER, PWD, DBNAME);
	if(!$link):
		echo "Echec de connection &agrave MySQL ".mysqli_connect_error();
		exit();
	endif;
	$req = "SELECT * FROM eleve";
	$send = mysqli_query($link, $req);
	echo "<table border = 1 style='text-align:center'><tr><th>Matricule</th><th>Nom</th><th>Prenom</th><th>Date de naissance</th></tr>";
	while($result = mysqli_fetch_row($send)):
			echo "<tr><td>".$result[0]."</td><td>".$result[1]."</td><td>".$result[2]."</td><td>".$result[3]."</td>
			</tr>";
	endwhile;
	echo "</table>";
	echo mysqli_num_rows($send). "<br/>";
	echo mysqli_num_fields($send);
	mysqli_free_result($send);
	unset($link);
?>