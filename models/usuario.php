<?php 

    class Usuario 
    {
        //Atributos

        private $nickname = null;
        private $password = null;
        private $fname = null;
        private $lname = null;
        private $email = null;
        private $age = null;
        private $tlf = null;
        private $gender = null;

        public $verificado = true;

        function Usuario($nickname, $password, $fname, $lname, $email, $age, $tlf){
            $this->setNickname($nickname);
            $this->setPassword($password);
            $this->setFname($fname);
            $this->setLname($lname);
            $this->setEmail($email);
            $this->setAge($age);
            $this->setTlf($tlf);
            //$this->setGender($gender);
        }


        public function validarNick($nick){
            if(strlen($nick) > 20 || strlen($nick) < 4) {
                echo "Longitud de usuario incorrecta. (Entre 4 - 20 caracteres)<br>";
                $verificado = false;
            }
        }

        public function setNickname($nickname){
            $this->nickname = $nickname;
        }

        public function getNickname(){
            return $this->nickname;
        }

        public function validarPass($pass){
            if(strlen($pass) > 20 || strlen($pass) < 4) {
                echo "Longitud de contraseña incorrecta. (Entre 4 - 20 caracteres)<br>";
                $verificado = false;
            }
        }
  
        public function getPassword(){
            return $this->password;
        }

        public function setPassword($password){
            $this->password = $password;
        }

        public function validarNombre($fname){
            if(strlen($fname) > 20 || strlen($fname) < 4) {
                echo "Longitud de nombre incorrecta. (Entre 4 - 20 caracteres)<br>";
                $verificado = false;
            }
        }

        public function getFname(){
            return $this->fname;
        }

        public function setFname($fname){
            $this->fname = $fname;
        }

        public function validarApellido($lname){
            if(strlen($lname) > 20 || strlen($lname) < 4) {
                echo "Longitud de apellido incorrecta. (Entre 4 - 20 caracteres)<br>";
                $verificado = false;
            }
        }

        public function getLname(){
            return $this->lname;
        }

        public function setLname($lname){
            $this->lname = $lname;
        }

        public function validarEmail($mail){
            if (filter_var($mail, FILTER_VALIDATE_EMAIL)) {
                echo "Esta dirección de correo ($mail) es válida.";
            }else{
                $verificado = false;
            }
        }

        public function getEmail(){
            return $this->email;
        }

        public function setEmail($email){
            $this->email = $email;
        }

        public function validarEdad($age){
            if($age > 100 || $age < 1) {
                echo "Edad incorrecta. (Entre 1 - 100 años)<br>";
                $verificado = false;
            }
        }

        public function getAge(){
            return $this->age;
        }

        public function setAge($age){
            $this->age = $age;
        }

        public function validarTlf($phone){
            if(!strlen($phone) == 9) {
                echo "Telefono incorrecto";
                $verificado = false;
           }
        }

        public function getTlf(){
            return $this->tlf;
        }

        public function setTlf($tlf){
            $this->tlf = $tlf;
        }

        
        // public function validarGenero($gender){
        //     if($gender != "Masculino" || $gender != "Femenino") {
        //         echo "Genero incorrecto! (Masculino - Femenino)<br>";
        //         $verificado = false;
        //     }
        // }

        // public function getGender(){
        //     return $this->gender;
        // }

        // public function setGender($gender){
        //     $this->gender = $gender;
        // }
    }


?>