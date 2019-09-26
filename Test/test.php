
<?php
    require "../Outil/lecteur-liens.php";
	require $require_lecteur_fichier;
	$tabliens = array();
	$tabliens = ScanFichiers('/home/Samba/Test/');
	for($p=0;$p<sizeof($tabliens);$p++)
	{
		echo $tabliens[$p]." - ";
	}
	echo "<br>";

	if($_GET["chgp"]=="chercher")
        {
            if(isset($_POST["searchEngine"]))
            {
                
                $motachercher = $_POST["searchEngine"];
                    
                $tablienss = ChercherFicher($motachercher,'/home/Samba/Test/');
                
			}
			
			for($i=0;$i<sizeof($tablienss);$i++)
			{
				echo "<br>";
				echo "I = ".$i;
				echo $tablienss[$i];
				echo "<br>";
			}
        }

	echo "<br>";
	
?>

<head>
	<link href="https://vjs.zencdn.net/7.6.0/video-js.css" rel="stylesheet">
  
	<!-- If you'd like to support IE8 (for Video.js versions prior to v7) -->
	<script src="https://vjs.zencdn.net/ie8/1.1.2/videojs-ie8.min.js"></script>
  </head>
  
  <body>
  <br>
  	<form action="test.php?chgp=chercher" method="post">
                <input type="search" name="searchEngine" placeholder="Recherche..." />
                <input type="submit" value="Valider" />
	</form>

	<br>
	<br>
			
	<video id='my-video' class='video-js' controls preload='auto' width='640' height='264'
	poster='MY_VIDEO_POSTER.jpg' data-setup='{}'>
	  <source src='Video/Ainzawa.mp4' type='video/mp4'>
	  <source src='MY_VIDEO.webm' type='video/webm'>
	  <p class='vjs-no-js'>
		To view this video please enable JavaScript, and consider upgrading to a web browser that
		<a href='https://videojs.com/html5-video-support/' target='_blank'>supports HTML5 video</a>
	  </p>
	</video>
  
	<script src='https://vjs.zencdn.net/7.6.0/video.js'></script>
  </body>
