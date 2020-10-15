<?php
 
//-----------------------------------------LECTEUR VIDEO

    function LecteurVideoBase($videoliens,$liens_sous_titre)
    {
        echo '
          <body>
            <video class="lecteur-video" preload="none" id="lecteur_base" src="'.$videoliens.'" poster="../media-site/play.png" 
            type='."video/x-matroska; codecs="."theora, vorbis".' controls onerror="failed(event)" >
            </video>';
              if($liens_sous_titre!=null)
                {
                  echo "<track default kind='captions' srclang='fr' src='".$liens_sous_titre."' />";
                }
        echo'</body>';
    }

    function Lecteur_A_Modif($liensvideo,$liens_sous_titre)
    {
        echo "";
    }
    function LecteurJSCDN($liensvideo,$liens_sous_titre)
    {
      
      echo"
          <video".'
            id="json-video"
            class="video-js"
            controls
            preload="none"
            width="640"
            height="264"
            poster="../media-site/play.png"
            data-setup="{}"
          >
            <source src="'.$liensvideo.'" type="video/mp4"/>
            <source src="'.$liensvideo.'" type="video/webm"/>
            <p class="vjs-no-js">
              To view this video please enable JavaScript, and consider upgrading to a
              web browser that
              <a href="https://videojs.com/html5-video-support/" target="_blank"
                >supports HTML5 video</a
              >
            </p>
          </video>';
    }

?>