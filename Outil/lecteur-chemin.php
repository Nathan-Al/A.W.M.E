<?php

function CheckLink ($chemin_a_verifier)
{
    $racine_serveur =$_SERVER['DOCUMENT_ROOT'];
    $racine_projet = $_SERVER["CONTEXT_PREFIX"];
    $racine_complete =$racine_serveur.$racine_projet;
    $chemin_final="";
    if(gettype($chemin_a_verifier)=="string")
    {
        $chemin_a_verifier = str_replace("../","",$chemin_a_verifier);
        //Verifier dossier
        try{
            if ( is_dir($chemin_a_verifier) )  {
                $chemin_final = $chemin_a_verifier;
            }else{
                if(is_dir("../".$chemin_a_verifier))
                {
                    $chemin_final = "../".$chemin_a_verifier;
                }elseif(strpos($chemin_a_verifier,"/")>2 || strpos($chemin_a_verifier,".")==0)
                {

                }else
                {
                    $chemin_final = "Impossible de trouver le dossier/fichier";
                }
            }
        }catch(Exception $e)
        {
            
        }
        //Verifier chemin
        if(strrpos($chemin_a_verifier,".")>0)
        {
            if(strrchr($chemin_a_verifier,"."))
            {
                if(file_exists($chemin_a_verifier))
                {
                    $chemin_final = $chemin_a_verifier;
                }elseif(file_exists("../".$chemin_a_verifier))
                {
                    $chemin_final = "../".$chemin_a_verifier;
                }
               
            }
            
        }else
        {
            if(file_exists($racine_projet."/".$chemin_a_verifier))
            {

            }else
            {

            }
        }
    }
    else
    {
        $chemin_final = "Le chemin envoyer n'est pas un string";
    }
    
    return $chemin_final;
}