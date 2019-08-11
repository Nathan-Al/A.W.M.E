<?php
    if(isset($_GET["video"]))
    {
        if(isset($_GET["dossier"]))
        {
            if($_GET["dossier"]!=null && $_GET["dossier"]!="")
            {
                $dos = $dos."/".$_GET["dossier"];
                $meza = "/home/Samba/Video/".$dos."/";
            }
        }else
        {
            $meza = '/home/Samba/Video/';
        }

        if($_GET["video"]=="default")
        {
            $fichiers = ScanFichiers($meza);
            $dossier = ScanDossier($meza);
            require "../Vue/affichage-video.php";  
        }
        elseif($_GET["video"]!="" && $_GET["video"]!=null)
        {
            $video = $_GET["video"];
            $fichiers = ScanFichiers($meza);
            $dossier = ScanDossier($meza);
            require "../Vue/affichage-video.php";
        }elseif(isset($_GET["dossier"]))
        {
            if($_GET["NomDossierPlus"]!=null && $_GET["NomDossierPlus"]!="")
            {
                echo $_POST["NomDossierPlus"];
            }
        }

    }

    function ScanFichiers($meza){
        $dir = $meza;
        if ( is_dir($dir) )  {
            if ( $dh = opendir($dir) ) {
                while ( ($element = readdir($dh)) !== false){{
                        if (	($element != '_vti_cnf')	&
                            ($element != '.')		&
                            ($element != '..')		&
                            ($element != '.DS_Store')	){
                                
                                if (is_dir($dir.'/'.$element))
                                {
                                    //$tb_directories[] = $element;	
                                }
                                else
                                {
                                    $tb_files[] = $element;	
                                }
                            }
                        }	
                    }
                }
            }
        //echo "Size TB".sizeof($tb_files)."Size TB2".sizeof($tb_files2);
       
        return $tb_files;
    }

    function ScanDossier($meza){
        $dir = $meza;
        if ( is_dir($dir) )  {
            if ( $dh = opendir($dir) ) {
                while ( ($element = readdir($dh)) !== false){{
                        if (	($element != '_vti_cnf')	&
                            ($element != '.')		&
                            ($element != '..')		&
                            ($element != '.DS_Store')	){
                                
                                if (is_dir($dir.'/'.$element))
                                {
                                    $tb_directories[] = $element;	
                                }
                                else
                                {
                                    $tb_files[] = $element;	
                                }
                            }
                        }	
                    }
                }
            }
        return $tb_directories;
    }

    function BoutonRetour($dosierpressent)
    {
        //echo $dosierpressent." ";
        $ch = "/";
        $m = substr(strrchr($dosierpressent, $ch),0);
        $rem = str_replace($m, "",$dosierpressent);
        return $rem;
    }

    //-----------------------------------------LECTEUR VIDEO

    function LecteurVideoBase($videoliens)
    {
        echo ' <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
        <html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
        
        <head>
         <meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
         <meta name="author" content="Amin Developer!" />
        
         <title>Untitled 1</title>
        </head>
        <body>
        
        <p><video src="'.$videoliens.'" width="640" height="264" poster="../media-site/minjw4.png" type='."video/x-matroska; codecs="."theora, vorbis".' controls onerror="failed(event)" ></video></p>
        
        </body>
        </html>';
    }

    function LecteurJW($liensvideo)
    {
        echo "<head>
        <link href='https://vjs.zencdn.net/7.6.0/video-js.css' rel='stylesheet'>
        <script src='https://vjs.zencdn.net/ie8/1.1.2/videojs-ie8.min.js'></script>
      </head>
      
      <body>
      <div class='Vivideo'>
        <video id='jw-video' class='video-js' controls preload='auto' width='640' height='264'
        poster='../media-site/minjw6.jpg' data-setup='{}'>

            <source src='../Video/".$liensvideo."' type='video/mp4'>
            <source src='../Video/".$liensvideo."' type='video/webm'>
            <source src='../Video/".$liensvideo."' type='video/ogg'>
         
          <p class='vjs-no-js'>
            To view this video please enable JavaScript, and consider upgrading to a web browser that
            <a href='https://videojs.com/html5-video-support/' target='_blank'>supports HTML5 video</a>
          </p>
        </video>
        </div>
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
        <video id='json-video' class='video-js' controls preload='auto' width='640' height='264'
        poster='../media-site/minjw7.jpg' data-setup='{}'>

          <source src='../Video/".$liensvideo."' type='video/webm'>
          <source src='../Video/".$liensvideo."' type='video/mp4'>
         
          <p class='vjs-no-js'>
            To view this video please enable JavaScript, and consider upgrading to a web browser that
            <a href='https://videojs.com/html5-video-support/' target='_blank'>supports HTML5 video</a>
          </p>
        </video>
      
        <script src='https://vjs.zencdn.net/7.6.0/video.js'></script>
      </body>";
    }
?>