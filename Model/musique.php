<?php

    class musique
    {
        private $titre;
        private $album;
        private $artiste;
        private $temps;
        private $genre;
        private $format_file ;
        private $taille_file ;
        private $annee ;
        private $image ;
        private $bitatre ;

        public function __construct($titre, $album, $artiste, $genre, $temps, $annee, $image, $format_file, $taille_file, $bitatre)
        {
            $this->setTitre ($titre);
            $this->setAlbum ($album);
            $this->setArtiste($artiste);
            $this->setGenre ($genre);
            $this->setTemps ($temps);
            $this->setAnnee ($annee);
            $this->setImage ($image);
            $this->setFormat_file ($format_file);
            $this->setTaille_file ($taille_file);
            $this->setBitatre ($bitatre);
        }

        /**
         * Getter for Titre
         *
         * @return [type]
         */
        public function getTitre()
        {
            return $this->titre;
        }

        /**
         * Setter for Titre
         * @var [type] titre
         *
         * @return self
         */
        public function setTitre($titre)
        {
            $this->titre = $titre;
            return $this;
        }

        /**
         * Getter for Album
         *
         * @return [type]
         */
        public function getAlbum()
        {
            return $this->album;
        }

        /**
         * Setter for Album
         * @var [type] album
         *
         * @return self
         */
        public function setAlbum($album)
        {
            $this->album = $album;
            return $this;
        }

        /**
         * Getter for Artiste
         *
         * @return [type]
         */
        public function getArtiste()
        {
            return $this->artiste;
        }

        /**
         * Setter for Artiste
         * @var [type] artiste
         *
         * @return self
         */
        public function setArtiste($artiste)
        {
            $this->artiste = $artiste;
            return $this;
        }

        /**
         * Getter for Genre
         *
         * @return [type]
         */
        public function getGenre()
        {
            return $this->genre;
        }

        /**
         * Setter for Genre
         * @var [type] genre
         *
         * @return self
         */
        public function setGenre($genre)
        {
            $this->genre = $genre;
            return $this;
        }

        /**
         * Getter for Temps
         *
         * @return [type]
         */
        public function getTemps()
        {
            return $this->temps;
        }

        /**
         * Setter for Temps
         * @var [type] temps
         *
         * @return self
         */
        public function setTemps($temps)
        {
            $this->temps = $temps;
            return $this;
        }

        /**
         * Getter for Année
         *
         * @return [type]
         */
        public function getAnnee()
        {
            return $this->année;
        }

        /**
         * Setter for Année
         * @var [type] année
         *
         * @return self
         */
        public function setAnnee($annee)
        {
            $this->année = $annee;
            return $this;
        }

        /**
         * Getter for Image
         *
         * @return [type]
         */
        public function getImage()
        {
            return $this->image;
        }

        /**
         * Setter for Image
         * @var [type] image
         *
         * @return self
         */
        public function setImage($image)
        {
            $this->image = $image;
            return $this;
        }

        /**
         * Getter for Format_file
         *
         * @return [type]
         */
        public function getFormat_file()
        {
            return $this->format_file;
        }

        /**
         * Setter for Format_file
         * @var [type] format_file
         *
         * @return self
         */
        public function setFormat_file($format_file)
        {
            $this->format_file = $format_file;
            return $this;
        }

        /**
         * Getter for Taille_file
         *
         * @return [type]
         */
        public function getTaille_file()
        {
            return $this->taille_file;
        }

        /**
         * Setter for Taille_file
         * @var [type] taille_file
         *
         * @return self
         */
        public function setTaille_file($taille_file)
        {
            $this->taille_file = $taille_file;
            return $this;
        }

        /**
         * Getter for Bitatre
         *
         * @return [type]
         */
        public function getBitatre()
        {
            return $this->bitatre;
        }

        /**
         * Setter for Bitatre
         * @var [type] bitatre
         *
         * @return self
         */
        public function setBitatre($bitatre)
        {
            $this->bitatre = $bitatre;
            return $this;
        }

    }  


?>