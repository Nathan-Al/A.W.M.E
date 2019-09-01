<?php
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

//Affichage documents

function ScanFichiersDoc(){
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

function ScanDossierDoc(){
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

function chargeLiens()
{
        $dirname = '/home/Samba/Image/';
        $dir = opendir($dirname);
        $ona = 0;
        $page = 1;
        while($file[][] = readdir($dir)) 
        {
            $liens = 0;
            for($compteur=0; $compteur<24; $compteur++)
            {
                if($file[$liens][$page] != "." && $file[$liens][$page] != ".." && !is_dir($dirname.$file[$liens][$page] && $file[$liens][$page]!="" && $file[$liens][$page]!=false))
                {
                    //echo readdir($dir),$page. "<br>";
                    $file[$liens][$page] = readdir($dir);
                    //echo "<br> L".$liens."  P".$page."  ".$file[$liens][$page]."<br>";
                    //echo "<br>"."L".$liens."  P".$page;
                }
                if ($file[$liens][$page]=="..")
                {
                    $file[$liens][$page] = "0";
                }
                $liens++;
                
            }
            //echo "<br>"."fin du for"."<br>";
            $page++;
            
        }
        //echo "<br>"."fin while"."<br>";
        
        rsort($file);
        
    return $file;
}

?>