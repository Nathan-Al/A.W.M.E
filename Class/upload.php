<?php
    class Upload
    {
        protected $name;
        protected $tmp_name;
        protected $size;
        protected $type;
        protected $error;
        protected $chemin_fichier;

        public function __construct($name, $tmp_name,$size,$type,$error,$chemin_fichier)
        {
            $this->setName($name);
            $this->setTmp_name($tmp_name);
            $this->setSize($size);
            $this->setType($type);
            $this->setError($error);
            $this->setChemin_fichier($chemin_fichier);
        }


        /**
         * Get the value of name
         */ 
        public function getName()
        {
                return $this->name;
        }

        /**
         * Set the value of name
         *
         * @return  self
         */ 
        public function setName($name)
        {
                $this->name = $name;

                return $this;
        }

        /**
         * Get the value of tmp_name
         */ 
        public function getTmp_name()
        {
                return $this->tmp_name;
        }

        /**
         * Set the value of tmp_name
         *
         * @return  self
         */ 
        public function setTmp_name($tmp_name)
        {
                $this->tmp_name = $tmp_name;

                return $this;
        }

        /**
         * Get the value of size
         */ 
        public function getSize()
        {
                return $this->size;
        }

        /**
         * Set the value of size
         *
         * @return  self
         */ 
        public function setSize($size)
        {
                $this->size = $size;

                return $this;
        }

        /**
         * Get the value of type
         */ 
        public function getType()
        {
                return $this->type;
        }

        /**
         * Set the value of type
         *
         * @return  self
         */ 
        public function setType($type)
        {
                $this->type = $type;

                return $this;
        }

        /**
         * Get the value of error
         */ 
        public function getError()
        {
                return $this->error;
        }

        /**
         * Set the value of error
         *
         * @return  self
         */ 
        public function setError($error)
        {
                $this->error = $error;

                return $this;
        }

        /**
         * Get the value of chemin_fichier
         */ 
        public function getChemin_fichier()
        {
                return $this->chemin_fichier;
        }

        /**
         * Set the value of chemin_fichier
         *
         * @return  self
         */ 
        public function setChemin_fichier($chemin_fichier)
        {
                $this->chemin_fichier = $chemin_fichier;

                return $this;
        }
    }
?>