<?php

use PHPMailer\PHPMailer\Exception;

function CreeDossier($destination, $nom)
{
    $chemin = $destination;
    $nomfichier = $nom;

    if(mkdir($chemin."/".$nomfichier, 0777, false, null))
    {
        die('Echec lors de la création des répertoires...');
        return false;
    }
    else
    {
        chmod($chemin,0777);
        return true;
    }

}

function CreeFichier($destination, $nom, $newpage)
{
    if($newpage==true)
    if($destination!=null && $nom!=null)
    {
        $nomfichier = $nom;
        $vue = $destination["vue"] ;
        $controller = $destination["controller"];
        $css = $destination["css"];
        $nom_vue =  $vue."affichage-".$nomfichier.".php";
        $nom_controller = $controller."controll-".$nomfichier.".php";
        $nom_css = $css."style-".$nomfichier.".css";
        if(!file_exists($nom_vue))
        {
            if(!file_exists($nom_controller))
            {
                if(!file_exists($nom_css))
                {
                    try
                    {
                        fopen($nom_vue,'wb');
                        fopen($nom_controller,'wb');
                        fopen($nom_css,'wb');
                        chmod($nom_vue,0777);
                        chmod($nom_controller,0777);
                        chmod($nom_css,0777);

                        return true;
                    }catch (Exception $e)
                    {
                        return false;
                    } 
                }
                else
                {
                    echo "Le fichier css existe déja";
                }
            }
            else
            {
                echo "Controller existe déja";
            }
        }
        else
        {
            echo "Le fichier vue existe deja !";
        }
    }
    else
    if($destination!="" && $nom!=""||$destination!=null && $nom!=null)
    {
        $chemin = $destination;
        $nomfichier = $nom.".php";

        switch(file_exists($chemin))
        {
            case true:
                try
                {
                    fopen($chemin.$nomfichier,'wb');
                }catch (Exception $e)
                {
                    return false;
                }
            case false:
                echo "Le fichier existe deja";

        }
    }
            
}

function SupprimerFichie($destination, $nom)
{
    $chemin = $destination;
    $nomfichier = $nom;
}

function EditerFichier($destination, $nom, $info)
{
    $chemin = $destination;
    $nomfichier = $nom;

    $file1 = fopen($chemin.".php",'wb');

    fwrite($destination,$info);
    fclose($file1);
}
?>