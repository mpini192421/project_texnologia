<?php
		session_start();										     
		if($conn= mysqli_connect("localhost","prctic_arvanitak","1234qaws","prctic_dbarv"))
		
		
		mysqli_query($conn,"set names 'utf8'");

if(isset($_POST['syndesi']))	{
		$sql="select * from users where email='$_POST[emailuser]'and password='$_POST[passworduser]'"; 
		$r1=mysqli_query($conn,$sql);

		if(mysqli_num_rows($r1)==0) 	
		{
			echo "<script>alert('Δεν συνδεθήκατε')</script>";
			
		}
		else
		{
			
		
			$row=mysqli_fetch_array($r1); 
			$_SESSION['userid']=$row['id'];	
			$_SESSION['email']=$row['email'];
			$_SESSION['tupos_xristi']=$row['tupos_xristi'];
			
			
		}



}

// an to typos exei oristei tote kratame sto $usertype ton typo tou xristi
if (isset($_SESSION['tupos_xristi']))
	{
		$usertype=$_SESSION['tupos_xristi'];
	}
else
	{
	$usertype="guest";
	}

?>



<html>
<!-- συνδέω με το αρχείο css -->
<link rel="stylesheet" type="text/css" href="theme.css">

<!-- ελληνικά στην σελίδα μας -->
<meta charset="utf-8">
<!-- βιβλιοθήκη του google maps -->
<script src='https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&key=AIzaSyAvH7a0y8bMPoPNJGWGqSouUfMSVphtMSI'></script>
<body>
<!-- το banner μας 
	<div id=banner>
		<img src='banner.jpg' width=100%>
	</div>
-->	
<div id=menu>
<!-- gia to koumpaki sta kinita -->
	<img src='menud.png' id=md onclick='
// an den einai kinito den efmaizetai to koumpi gia ta kinita, alliws tha emfanizetai afto kai oxi to menu   (to css to leei afto)
// an patiso pano sto koumpi tote to v1 diladi to menu na emfanistei, kai to koumpi (md) na stamatisei na emfanizetai	

	document.getElementById("md").style.display="none"; 
   	 	document.getElementById("v1").style.display="block"; 
	'>

	
	<ul id=v1>
	<?php
		
		// Χτίζω ανάλογα το menu με το $usertype
	echo"<li><a href='index.php'>Αρχική</a></li>";
if($usertype=='guest')echo"<li><a href='syndesi.php'>Εγγραφή-Σύνδεση</a></li>";
if($usertype=='user' || $usertype=='admin')echo"<li><a href='insert_anafora.php'> Εισαγωγή Μέτρησης</a></li>";
if($usertype=='admin')	echo"<li><a href='users.php'>Λίστα Χρηστών</a></li>	";
if($usertype=='user'|| $usertype=='admin')	echo"<li><a href='list_anaforwn1.php'> Λίστα Μετρήσεων</a></li>";
if($usertype=='admin')	echo"<li><a href='katigories.php'> Κατηγορίες Μετρήσεων</a></li>";
if($usertype=='user'|| $usertype=='admin')	echo"<li><a href='profil.php'> Προφίλ</a></li>";
if($usertype=='user'|| $usertype=='admin')	echo"<li><a href='logout.php'> Αποσύνδεση </a></li>";
	?>
	</ul>
</div>
<!-- xekinaei to main division -->
<div id=main>