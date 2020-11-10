## FR Version
# A.W.M.E
Applications web Multimedia E
Projet d'interface web pour service d’utilisations de multimédia. 

# Langage
Php, javaScript, Css, Saas, JQuery

# Version
1.0.0

# Module / Autre nécessaire
* GetID3 version 1.9.20
* Video.js CDN version 7.8.4
## Pour le bon fonctionement du site n'oublier pas de  :
 * récupérer getid3 a https://www.getid3.org/ et de déplacer le dossier `getID3-master` dans le dossier Outil !

## Fonctionnement de A.W.M.E
### Informations générale
Dans le dossier du site il y a un dossier multimédia, quand la page upload est utiliser c’est là qu’elle enverra tous les fichiers (chacun dans un dossier approprier).
### Accueil
Sur la page d'accueil le menu des interfaces se trouve à gauche, <br />
Il suffit de diriger la souris vers l'icône en haut à gauche et le `menu` apparaitra. <br />
Dans l'icône `multimédia` se trouve l'interface qui permet de donner au site les différentes sources des fichiers multimédia. <br />
Un clic sur la croix à coté de chaque `titre` ajoutera une `zone de texte` dans lequel il vous faudra coller le lien du dossier. <br />
Pour supprimer un lien il suffit de cliquer sur le `bouton supprimer` à droite de chaque zone de texte. <br />
Une fois terminée cliquer sur le bouton `sauvegarder` en haut du menu (si vous ne cliquez dessus les nouveaux liens ne seront pas sauvegardés). <br />
### Image
Cliquer sur une image permet de l’afficher en grand.
### Vidéo
Cliquer sur un `dossier` ouvrira son contenue.
Le bouton `retour` du milieu permet de retourner au dossier précédent.
Cliquer sur une `vidéo` pour faire apparaitre les lecteurs, ils sont sélectionnable grâce au deux bouton `Lecteur normal` & `lecteur JSON`.
### Vidéo Box
La même chose que pour la page vidéo mais optimiser pour le navigateur d’un décodeur.
### Document
Cliquer sur l’un des liens qui ont le nom des fichiers pour qu’il l’ouvre.
Même chose pour les dossiers.
### Musique
 ! Nécessite getID3 !
--------------
Cliquer sur le nom d’un des chansons pour immédiatement la faire jouer.
### Youtube
 ! Important ! La page YouTube fonctionne avec le principe d’intégration de Playlist. Pour savoir comment faire vous pouvez regarder sur Google “Comment intégrer ma playlist“ ou vous pouvez aller sur Youtube->Votre Playlist->Partager->Intégrer->Copier le lien de l’frame se trouvant dans src=““<br />
Les liens noirs en haut de la page représentent chacune des playlist, cliqué dessus pour la faire se charger aux milieux de la page.
# Note
Ceci est la première version du site.  <br />
Par la suite il être va tranformer en application / logiciel. <br />

# Beug
Dans la version 1.0.0 il est impossible d'ouvrir les dossier pour les documents. Ce beug cera corriger dans la prochaine version.
