<?php
    require "../Outil/lecteur-liens.php";
    require $require_lecteur_fichier;

    $extensionsimage = array('.png', '.gif', '.jpg', '.jpeg');
    $extensionsvideo = array('.mp4', '.mkv', '.avi', '.mpeg');
    $extensionsmusique = array('.mp3', '.waw', '.ogg', '.flac');
    $extensionsdocuments = array('.doc', '.docx', '.pdf', '.txt','.zip','.rar');
<<<<<<< HEAD
    $extensionsoustitre = array('.vtt','.ass');
    
    if(isset($_FILES['fichiers']))
    {
        $i=0;
        if(gettype($_FILES['fichiers'])=="array")
        {
            $fichier = array();
            $fichier = $fichier = array_filter($_FILES['fichiers'],'strlen');

            for($m=0; $m<sizeof($fichier);$m++)
            {

                $nom = $fichier['name'][$m];
                    
                $extension = strtolower(strrchr($nom, '.'));
                
                if(in_array($extension, $extensionsimage))
                {
                    $effectuer = uploadfichier($liensHomeImage,$_FILES['fichiers']);
                }
                elseif(in_array($extension, $extensionsvideo))
                {
                    $effectuer = uploadfichier($liensHomeVideo,$_FILES['fichiers']);
                }
                elseif(in_array($extension, $extensionsmusique))
                {
                    $effectuer = uploadfichier($liensHomeMusique,$_FILES['fichiers']);
                }
                elseif(in_array($extension, $extensionsdocuments))
                {
                    $effectuer = uploadfichier($liensHomeDocuments,$_FILES['fichiers']);
                }elseif(in_array($extension,$extensionsoustitre))
                {
                    $effectuer = uploadfichier($dosier_sous_titre,$_FILES['fichiers']);
                }
            }

        }else
        {
            $fichier = $_FILES['fichiers'];
            $nom = $_FILES['fichiers']['name'];
            $extension = strtolower(strrchr($nom, '.'));

            if(in_array($extension, $extensionsimage))
            {
                $effectuer = uploadfichier($liensHomeImage,$fichier);
            }
            elseif(in_array($extension, $extensionsvideo))
            {
                $effectuer = uploadfichier($liensHomeVideo,$fichier);
            }
            elseif(in_array($extension, $extensionsmusique))
            {/*
                $nom = strtolower($fichier['name']);
                $tmpnom = $fichier['tmp_name'];
                $taille = $fichier['size'];
                $type = $fichier['type'];
                $erreurr = $fichier['error'];
                $dossier = $chemindossier;
            
                echo "Nom:".$nom." - Nom temp:".$tmpnom." - Taille:".$taille." - Type:".$type." - Erreur:".$erreurr." - Dossier:".$dossier;
            */
                $effectuer = uploadfichier($liensHomeMusique,$fichier);
            }
            elseif(in_array($extension, $extensionsdocuments))
            {
                $effectuer = uploadfichier($liensHomeDocuments,$fichier);
            }elseif(in_array($extension,$extensionsoustitre))
            {
                $effectuer = uploadfichier($dosier_sous_titre,$fichier);
            }
        }
        
        

       
=======
    
    if(isset($_FILES['fichiers']))
    {
        $fichier = $_FILES['fichiers'];
        $nom = $_FILES['fichiers']['name'];
        $extension = strtolower(strrchr($nom, '.'));

        if(in_array($extension, $extensionsimage))
        {
            $effectuer = uploadfichier($liensHomeImage,$fichier);
            //echo 'image <br>';
        }
        elseif(in_array($extension, $extensionsvideo))
        {
            //echo 'video <br>';
            $effectuer = uploadfichier($liensHomeVideo,$fichier);
        }
        elseif(in_array($extension, $extensionsmusique))
        {/*
            $nom = strtolower($fichier['name']);
            $tmpnom = $fichier['tmp_name'];
            $taille = $fichier['size'];
            $type = $fichier['type'];
            $erreurr = $fichier['error'];
            $dossier = $chemindossier;
        
            echo "Nom:".$nom." - Nom temp:".$tmpnom." - Taille:".$taille." - Type:".$type." - Erreur:".$erreurr." - Dossier:".$dossier;
        */
            $effectuer = uploadfichier($liensHomeMusique,$fichier);
            //echo 'musique <br>';
        }
        elseif(in_array($extension, $extensionsdocuments))
        {
            $effectuer = uploadfichier($liensHomeDocuments,$fichier);
            //echo 'documents <br>';
        } 
>>>>>>> master
    }
    require $require_vue_affichage_upload;
?>