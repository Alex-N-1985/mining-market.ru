<?php

    include_once ("models\users.php");

    class users {

        public function getauthuser(){
            $res = _Users::getCurrentUser();
            if ($res == null){
                return null;
            } else {
                return $res;
            }            
        }

        public function getuserbylogin($login){
            $res = _Users::getUserFromDBbyLogin($login);
            if ($res == null){
                return null;
            } else {
                $data = $res;
                return $data;
            }
        }

        public function getallusers(){
            $res = _Users::getUsersFromDB();
            if ($res == null){
                return null;
            } else {
                
                return $res;
            }
        }

    }

?>