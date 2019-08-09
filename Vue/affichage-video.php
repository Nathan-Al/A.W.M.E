<html>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-10646"/>
        <meta charset="UTF-8">
        <LINK REL="SHORTCUT ICON" href="../Media/Image/icone.jpg" /> <!-- Icone de l'onglet de la page web -->

        <link rel="stylesheet" href="../Css/video.css" /> <!-- Importations du css -->
            
            <head>
                <title>Video</title> <!-- Titre de l'onglet de la page web -->
            </head>
    <body>
        <header>
            <div class="div-headers-1">
                <a href="../" class="Lien-nav-Accueil"><h1>Samba</h1></a>
                <div class="div-separation"></div>
            </div>
        </header>
<div class="div-contenue">
        <nav class="nav-liste-video">
       
            <div class="div-dossier-video">
                <?php
                    $liens = 0;
                    $default ="default";
                    $avantdossier = $_GET["dossier"];
                    for($o = 0; $o < sizeof($dossier); $o++)  
                        {
                            ?>
                                
                                <?php
                                    echo "<a href='../Controller/controll-video.php?video=".$default."&dossier=".$avantdossier."/".$dossier[$liens]."' class='a-doc'>".$dossier[$liens]."</a>";
                                    echo "<br>";
                                    $liens++;
                                ?>
                            <?php

                        }
                ?>
            </div>
       <nav class="nav-separation-div"><?php
        echo "<a href='../Controller/controll-video.php?video=default&dossier".$_GET['dossier']."' class='a-separation'>Avant</a>" ?>
       </nav>
            <div class="div-liens-video">
                <?php
                    $liens = 0;
                    if(isset($_GET["dossier"]))
                    {
                        $NDosier=$_GET["dossier"];
                        for($o = 0; $o < sizeof($fichiers); $o++)  
                        {
                            ?>
                                <?php
                                    echo "<a href='../Controller/controll-video.php?dossier=".$NDosier."&video=".$fichiers[$liens]."' class='a-doc'>".$fichiers[$liens]."</a>";
                                    echo "<br>";
                                    $liens++;
                                ?>
                        
                            <?php

                        }
                    }else
                    {
                        for($o = 0; $o < sizeof($fichiers); $o++)  
                        {
                            ?>
                                
                                    <?php
                                        echo "<a href='../Controller/controll-video.php?video=".$fichiers[$liens]."' class='a-doc'>".$fichiers[$liens]."</a>";
                                        echo "<br>";
                                        $liens++;
                                    ?>
                            <?php

                        }
                    }
                ?>
            </div>
           
        </nav>

        <nav class="nav-lecteur-video">
            <?php

            if($_GET["video"]=="default")
            {
                /*echo "<nav class='box-nav-lecteur-video'>";
                LecteurJW('../Video/alaylays Animation.mp4');
                echo "</nav>";*/
                echo "<nav class='box-nav-lecteur-video'>";
                LecteurJSCDN('../Video/alaylays Animation.mp4');
                echo "</nav>";/*
                echo "<nav class='box-nav-lecteur-video'>";
                LecteurFlowplayer('../Video/alaylays Animation.mp4');
                echo "</nav>";*/
            }
            elseif($_GET["video"]!="default" && isset($_GET["dossier"]))
            {
                $nom = $_GET["dossier"];
                echo "<nav class='box-nav-lecteur-video'>";
                LecteurJW("../Video".$nom."/".$video);
                echo "</nav>";
                echo "<nav class='box-nav-lecteur-video'>";
                LecteurJSCDN("../Video".$nom."/".$video);
                echo "</nav>";/*
                echo "<nav class='box-nav-lecteur-video'>";
                LecteurFlowplayer("../Video".$nom."/".$video);
                echo "</nav>";*/
            }else{
                echo "<nav class='box-nav-lecteur-video'>";
                LecteurJW("../Video/".$video);
                echo "</nav>";
                echo "<nav class='box-nav-lecteur-video'>";
                LecteurJSCDN("../Video/".$video);
                echo "</nav>";/*
                echo "<nav class='box-nav-lecteur-video'>";
                LecteurFlowplayer("../Video/".$video);
                echo "</nav>";*/
            }
            ?>
        </nav>
        </div>
    </body>
</html>

<?php
    function LecteurJW($liensvideo)
    {
        echo "<head>
        <link href='https://vjs.zencdn.net/7.6.0/video-js.css' rel='stylesheet'>
        <script src='https://vjs.zencdn.net/ie8/1.1.2/videojs-ie8.min.js'></script>
      </head>
      
      <body>
        <video id='my-video' class='video-js' controls preload='auto' width='900' height='500'
        poster='../media-site/minjw.jpg' data-setup='{}'>
          <source src='../Video/".$liensvideo."' type='video/mp4'>
          <source src='../Video/".$liensvideo."' type='video/webm'>
          <p class='vjs-no-js'>
            To view this video please enable JavaScript, and consider upgrading to a web browser that
            <a href='https://videojs.com/html5-video-support/' target='_blank'>supports HTML5 video</a>
          </p>
        </video>
      
        <script src='https://vjs.zencdn.net/7.6.0/video.js'></script>
      </body>";
    }
    function LecteurJSCDN($liensvideo)
    {
        echo"<head>
        <link href='https://vjs.zencdn.net/7.6.0/video-js.css' rel='stylesheet'>
      
        <!-- If you'd like to support IE8 (for Video.js versions prior to v7) -->
        <script src='https://vjs.zencdn.net/ie8/1.1.2/videojs-ie8.min.js'></script>
      </head>
      
      <body>
        <video id='my-video' class='video-js' controls preload='auto' width='640' height='264'
        poster='../media-site/minjw2.png' data-setup='{}'>
          <source src='../Video/".$liensvideo."' type='video/mp4'>
          <source src='../Video/".$liensvideo."' type='video/webm'>
          <p class='vjs-no-js'>
            To view this video please enable JavaScript, and consider upgrading to a web browser that
            <a href='https://videojs.com/html5-video-support/' target='_blank'>supports HTML5 video</a>
          </p>
        </video>
      
        <script src='https://vjs.zencdn.net/7.6.0/video.js'></script>
      </body>";
    }
    function LecteurFlowplayer($liensvideo)
    {
        echo "<!DOCTYPE html>

        <head>
           <!-- flowplayer depends on jQuery 1.7.1+ (for now) -->
           <script type='text/javascript' src='//ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js'></script>
        
           <!-- flowplayer.js -->
           <script type='text/javascript' src='flowplayer.min.js'></script>
        
           <!-- player styling -->
           <link rel='stylesheet' type='text/css' href='flowplayer/minimalist.css'>
        
        </head>
        
        <body>
        
           <!-- player 1 -->
           <div class='flowplayer'>
              <video src='../Video/".$liensvideo."'></video>
           </div>
        
           <!-- player 2 -->
           <div class='flowplayer'>
              <video>
                 <source type='../Video/".$liensvideo."'>
                 <source type='../Video/".$liensvideo."'>
              </video>
           </div>
        
        </body>";
    }
?>