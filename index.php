<?php
    
    if(isset($_GET["admin"]))
    {
        require "Controller/controll-gestion.php";
    }else
    {
        require "Controller/controll-index.php";
    }
?>