<?php
 
//-----------------------------------------LECTEUR VIDEO

    function LecteurVideoBase($videoliens,$liens_sous_titre)
    {
        echo ' <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
        <html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
        
        <head>
         <meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
         <meta name="author" content="Amin Developer!" />
        
         <title>Untitled 1</title>
        </head>
        <body>
        
        <p><video src="'.$videoliens.'" width="800" height="420" poster="../media-site/minjw4.png" type='."video/x-matroska; codecs="."theora, vorbis".' controls onerror="failed(event)" ></video></p>
        
        ';
            
            if($liens_sous_titre!=null)
            {
              
              echo "<track default kind='captions' srclang='fr' src='".$liens_sous_titre."' />";
              
            }
           echo '

        </body>
        </html>';
    }

    function LecteurJW($liensvideo,$liens_sous_titre)
    {
        echo "<head>
        <link href='https://vjs.zencdn.net/7.6.0/video-js.css' rel='stylesheet'>
        <script src='https://vjs.zencdn.net/ie8/1.1.2/videojs-ie8.min.js'></script>
      </head>
      
      <body>
      <div class='Vivideo'>
        <video id='jw-video' class='video-js' controls preload='auto' width='800' height='420'
        poster='../media-site/minjw6.jpg' data-setup='{}'>
          
            <source src='".$liensvideo."' type='video/mp4'>
            <source src='".$liensvideo."' type='video/webm'>
            <source src='".$liensvideo."' type='video/ogg'>
            ";
            
            if($liens_sous_titre!=null)
            {
              
              echo "<track default kind='captions' srclang='fr' src='".$liens_sous_titre."' />";
              
            }
           echo " 
          <p class='vjs-no-js'>
            To view this video please enable JavaScript, and consider upgrading to a web browser that
            <a href='https://videojs.com/html5-video-support/' target='_blank'>supports HTML5 video</a>
          </p>
        </video>
        </div>
        <script src='https://vjs.zencdn.net/7.6.0/video.js'></script>
       
      </body>";
    }
    function LecteurJSCDN($liensvideo,$liens_sous_titre)
    {
        echo"<head>
        <link href='https://vjs.zencdn.net/7.6.0/video-js.css' rel='stylesheet'>
      
        <!-- If you'd like to support IE8 (for Video.js versions prior to v7) -->
        <script src='https://vjs.zencdn.net/ie8/1.1.2/videojs-ie8.min.js'></script>
      </head>
      
      <body>
        <video id='json-video' class='video-js' controls preload='auto' width='800' height='420'
        poster='../media-site/minjw7.jpg' data-setup='{}'>

          <source src='".$liensvideo."' type='video/webm'>
          <source src='".$liensvideo."' type='video/mp4'>

          ";
            
            if($liens_sous_titre!=null)
            {
              
              echo "<track default kind='captions' srclang='fr' src='".$liens_sous_titre."' />";
              
            }
           echo "
         
          <p class='vjs-no-js'>
            To view this video please enable JavaScript, and consider upgrading to a web browser that
            <a href='https://videojs.com/html5-video-support/' target='_blank'>supports HTML5 video</a>
          </p>
        </video>
      
        <script src='https://vjs.zencdn.net/7.6.0/video.js'></script>
      </body>";
    }

?>