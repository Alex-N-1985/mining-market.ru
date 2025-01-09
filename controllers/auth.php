<?php
    include_once ("models\users.php");

    class auth {
        public function index(){
            global $rout;
            header("Location:{$rout->start}/main/error404");
        }

        public function logIn(){
            global $rout;
            $isLogin = 0;            
            if (isset($_POST["login"])&&!empty($_POST["login"])&&isset($_POST["password"])){
                $login = $_POST["login"];
                $usr = _users::getUserFromDBbyLogin($login);
                if ($usr->password == $_POST["password"] && $usr->secure_level > 0) {
                    $hash = $this->hashGenerate($usr->login, $usr->password);
                    $res = _users::updateUserLoginDataInDB($hash, $usr->login);                    
                    if ($res){
                        setcookie("hash", $hash, time()+(60*60*24), "/", $rout->domain, 0);
                        setcookie("user", $_POST["login"], time()+(60*60*24), "/", $rout->domain, 0);
                    }
                    $isLogin = 1;
                } else {
                    $content = file_get_contents("views/auth/userbaned.php");
                }
            }
            if ($isLogin == 0){
                eval("?>".$content);
            }
            else
                header("Location:{$rout->start}/main/index");
        }

        public function logOut(){
            global $rout;
            $isLogOut = 0;
            $usr = _users::getCurrentUser();
            if ($usr != null){
                setcookie("hash", "", time()+(60*60*24), "/", $rout->domain, 0);
                setcookie("user", "", time()+(60*60*24), "/", $rout->domain, 0);
                _users::updateUserLoginDataInDB("", $usr->login);
                $isLogout = 1;
            }
            if ($isLogOut = 1)
                header("Location:{$rout->start}/main/index");
        }

        private function hashGenerate($username, $password){
            $hash = "";
            $chars = "abcdefgh1234567890";
            $code = '';
            while (strlen($code) < 10){
                $code .= $chars[mt_rand(0, strlen($chars) - 1)];
            }
            $hash = md5($code);
            $hash = md5($hash.md5($username.md5($password)));
            return $hash;
        }
    }

?>