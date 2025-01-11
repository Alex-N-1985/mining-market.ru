<?php
    include_once ("models\users.php");
    include_once ("models\images.php");
    include_once ("models\categories.php");
    include_once ("models\cats_images.php");

    class user {
        public function viewuser(){
            global $rout;
            if (functions::isUserLogIn()){
                $usr = _users::getCurrentUser();
                $img = _images::getImagesFromDBbyID($usr->avatar);                
                $content = file_get_contents("views/user/viewusers.php");
                eval("?>".$content);
            } else {
                header("Location:{$rout->start}/main/unauthaccess");
            }
        }

        public function edituser($id){
            global $rout;            
            if (!functions::isUserLogIn()){
                header("Location:{$rout->start}/main/unauthaccess");
            }
            $usr = _users::getUserFromDBbyID($id);
            $img = _images::getImagesFromDBbyID($usr->avatar);
            $avatars = _images::getImagesFromDBbyPublisher($usr->ID);             
            if (isset($_POST["mail"]) || (isset($_POST["passw"]) && isset($_POST["npassw"]) && isset($_POST["cpassw"]) && isset($_POST["avatar"]))){
                if ($usr->email != $_POST['mail']){
                    $usr->email = $_POST['mail'];
                }
                if ($usr->password == $_POST["passw"] && $_POST["npassw"] == $_POST["cpassw"]){
                    $usr->password = $_POST["npassw"];                    
                }
                if ($usr->avatar != $_POST["avatar"]){
                    $usr->avatar = $_POST["avatar"];
                }
                _Users::updateUserDataInDB($usr);
                header("Location:{$rout->start}/main/index");
            }
            $content = file_get_contents("views/user/edituser.php");
            eval("?>".$content);
        }
    }
?>