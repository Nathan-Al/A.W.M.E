<?php

    function LecteurAudio($liens)
    {
        echo "
        <audio controls id='controll-audio' >
            <source src='".$liens."' type='audio/mpeg'>
            <source src='".$liens."' type='audio/ogg'>
            <p>
                Votre navigateur ne prend pas en charge l'audio HTML. Voici un
                un <a href='myAudio.mp4'>lien vers le fichier audio</a> pour le télécharger.
           </p>
      </audio>";
    }

?>