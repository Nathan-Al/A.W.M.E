<?php

$dossier = array();
$fichiers = array();
//$tabliens = chargeLiens();
//$dirname = '/home/Samba/Documents/';
//$tabliens =ScanDirectory($dirname);
$dossier = ScanDossier();
$fichiers = ScanFichiers();

require "../Vue/affichage-documents.php"; 


function chargeLiens()
{
    $dirname = '/home/Samba/Documents/';
    
    $dir = opendir($dirname);
    $liens=0;

    while($file = readdir($dir)) 
    {
        $file[$liens] = readdir($dir);
        $liens++;
        echo $file[$liens];
    }

    rsort($file);

    closedir($dir); 
    
    return $file;
}

function ScanDossier(){
    $dir = '/home/Samba/Documents/';
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

function ScanFichiers(){
    $dir = '/home/Samba/Documents/';
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
    for ($i = 0; $i<sizeof($tb_directories);$i++)
    {
        $dir = "/home/Samba/Documents/".$tb_directories[$i];
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
                                    $tb_files2[] = $element;
                                }
                            }
                        }	
                    }
                }
            }
    }
    for ($p = 0; $p < sizeof($tb_file2); $p++)
    {
        $tb_files[]=$tb_files2[$p];
    }
    //echo "Size TB".sizeof($tb_files)."Size TB2".sizeof($tb_files2);
   
    return $tb_files2;
}
?>