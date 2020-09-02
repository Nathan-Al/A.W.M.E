<html>
<meta http-equiv="Content-Type" content="text/html; charset=iso-10646" />
<meta charset="UTF-8">
<LINK rel="icon" type="image/png" href="media-site/icone.png" />
<!-- Icone de l'onglet de la page web -->
<link rel="stylesheet" href="Css/Menu.css" />
<!--<link rel="stylesheet" href="../Css/Menu.css" /> -->
<!-- Importations du css -->

<head>
    <title>Accueil</title>
    <!-- Titre de l'onglet de la page web -->
    <meta name="viewport" content="width=device-width" />
</head>

<body class="Menu-Body" id="Body">
    <header id="headd">
        <div id="parameter_DIV" style="width: 5%; height: auto; cursor: pointer; text-align: center; margin: 0%; padding: 0%;">
            <img src="media-site/menu.png" style="width: auto; height: 100%;" />
        </div>
        <div style="width: 90%; height: auto; text-align: center;">
            <h1> Bienvenue sur la page de gestion de A.W.M.E </h1>
        </div>
    </header>

    <div id="conteneur">
<!-- MENU PARAMETRE -->
        <div id="Parametre-Menu" class="menu-param-inactif">
            <div id="conteneur-para-onglet" class="conteneur-para-onglet">
                <nav id="para-nav" class="para-nav">Apparence</nav>
                <nav id="para-nav" class="para-nav">Multimédia</nav>
                <nav id="para-nav" class="para-nav">Lecteur</nav>
                <nav id="para-nav" class="para-nav">Paramètres</nav>
            </div>
            <div id="conteneur-para-contenue" class="conteneur-para-contenue">
                <div id="apparence-tools" class="menu-multimedia" style="z-index : 1;">
                    <conteneur class="conteneur-params">
                            <div class="arrang-param">
                                <div class="div-title-img">
                                    <h1>Changer l'apparence</h1>
                                </div>
                            </div>
                    </conteneur>
                </div>
                <div id="multimedia-tools" class="menu-multimedia" >
                    <conteneur class="conteneur-params">
                        <div class="arrang-param" id="arrang-param">
                            <div id="div-video" class="div-menu-est">
                                <div class="div-title-img">
                                    <h1>Video</h1>
                                    <img src="media-site/croix.png" class="img-ajouter">
                                </div>
                                <nav id="nav-input-video" class="">

                                </nav>

                            </div>
                            <div id="div-musique" class="div-menu-est">
                                <div class="div-title-img">
                                    <h1>Musique</h1>
                                    <img src="media-site/croix.png" class="img-ajouter">
                                </div>

                                <nav id="nav-input-musique" class="">

                                </nav>
                            </div>
                            <div id="div-image" class="div-menu-est">
                                <div class="div-title-img">
                                    <h1>Image</h1>
                                    <img src="media-site/croix.png" class="img-ajouter">
                                </div>

                                <nav id="nav-input-image" class="">

                                </nav>
                            </div>
                            <div id="div-document" class="div-menu-est">
                                <div class="div-title-img">
                                    <h1>Document</h1>
                                    <img src="media-site/croix.png" class="img-ajouter">
                                </div>

                                <nav id="nav-input-document" class="">

                                </nav>
                            </div>
                        </div>
                    </conteneur>
                </div>
                <div id="playMedia-tools" class="menu-multimedia" >
                   
                </div>
                <div id="info-tools" >
                    <conteneur class="conteneur-params">
                        
                    </conteneur>
                </div>
            </div>
        </div>
        <div id="Menu-comp" class="Menu-comp">
            <!--
    Partit créer en script Javascript
-->
        </div>
    </div>
    <script src="Scripts/jquery.js"></script>
    <script src="Scripts/index.js"></script>
</body>

</html>