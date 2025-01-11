<?php 

    include_once ("models\users.php");
    include_once ("models\statpages.php");
    include_once ("models\images.php");
    include_once ("models\categories.php");

    class Admin {

        public function index(){
            global $rout;
            if (functions::isUserAdmin()){
                $content = file_get_contents("views/admin/index.php");
                eval("?>".$content);
            } else {
                header("Location:{$rout->start}/main/unauthaccess");
            }            
        }

        public function viewusers(){
            global $rout;
            if (functions::isUserAdmin()){
                $users = _Users::getUsersFromDB();
                $content = file_get_contents("views/admin/viewusers.php");
                eval("?>".$content);
            } else {
                header("Location:{$rout->start}/main/unauthaccess");
            }
        }

        public function viewuser($id){
            global $rout;
            if (!functions::isUserAdmin()){
                header("Location:{$rout->start}/main/unauthaccess");
            }
            $user = _Users::getUserFromDBbyID($id);
            // $img = _images::getImagesFromDBbyID($user->avatar);
            $content = file_get_contents("views/admin/viewuser.php");
            eval("?>".$content);
        }

        public function edituser($id){
            global $rout;
            if (!functions::isUserAdmin()){
                header("Location:{$rout->start}/main/unauthaccess");
            }
            $user = _users::getUserFromDBbyID($id);
            if (isset($_POST['cpassw']) || isset($_POST['passw']) || isset($_POST['npassw']) || isset($_POST['secure_level'])){
                if ($_POST['npassw'] == $_POST['cpassw'] && $user->password != $_POST['npassw']){
                    $user->password = $_POST['npassw'];
                }
                if ($user->ID != 1 && $user->secure_level != $_POST['secure_level']){
                    $user->secure_level = (int)$_POST['sec_level'];
                }
                _users::updateUserDataInDB($user);
                header("Location:{$rout->start}/admin/viewusers");
            }
            $content = file_get_contents("views/admin/edituser.php");
            eval("?>".$content);
        }

        public function deleteuser($id){
            global $rout;
            if (!functions::isUserAdmin()){
                header("Location:{$rout->start}/main/unauthaccess");
            }
            if ($id != 1 && $id != _users::getCurrentUser()->ID){
                _users::deleteUserData($id);
            }
            header("Location:{$rout->start}/admin/viewusers");
        }

        public function viewspages(){
            global $rout;
            if (!functions::isUserAdmin()){
                header("Location:{$rout->start}/main/unauthaccess");
            }
            $spages = _statpages::getStatPagesFromDB();
            $content = file_get_contents("views/admin/viewspages.php");
            eval("?>".$content);
        }

        public function editspages($id){
            global $rout;
            if (!functions::isUserAdmin()){
                header("Location:{$rout->start}/main/unauthaccess");
            }
            $spage = _statpages::getStatPagesFromDBbyID($id);
            if (isset($_POST["pageID"]) && isset($_POST["spName"]) && isset($_POST["spContent"]) &&
                $_POST["spContent"] != $spage->content){
                $sp = new _statpages($spage->ID, $spage->name, $_POST["spContent"]);
                _statpages::updateStatPagesInDB($sp);
                header("Location:{$rout->start}/main/index");
            }
            $content = file_get_contents("views/admin/editspages.php");
            eval("?>".$content);
        }

        public function viewcategories(){
            global $rout;
            if (!functions::isUserAdmin()){
                header("Location:{$rout->start}/main/unauthaccess");
            }
            $cats = _categories::getCategoriesFromDB();
            $content = file_get_contents("views/admin/viewcats.php");
            eval("?>".$content);
        }
        
        public function addcategory(){
            global $rout;
            if (!functions::isUserAdmin()){
                header("Location:{$rout->start}/main/unauthaccess");
            }
            if (isset($_POST["cName"]) && isset($_POST["catType"]) && $_POST["cName"] != null && isset($_POST["cUri"]) && $_POST["cUri"] != null){
                $cat = new _categories(null, $_POST["cName"], $_POST["cUri"], $_POST["catType"], 0);
                _categories::addCategoryInDB($cat);
                header("Location:{$rout->start}/admin/viewcategories");
            }
            $content = file_get_contents("views/admin/addcategory.php");
            eval("?>".$content);
        }

        public function editcategories($id){
            global $rout;
            if (!functions::isUserAdmin()){
                header("Location:{$rout->start}/main/unauthaccess");
            }
            $cat = _categories::getCategoriesFromDBbyID($id);
            if (isset($_POST["cName"]) && isset($_POST["catType"]) && isset($_POST["cUri"])){
                $cat->name = $_POST["cName"];
                $cat->uri = $_POST["cUri"];
                $cat->catType = $_POST["catType"];
                _categories::updateCategoryDataInDB($cat);
                header("Location:{$rout->start}/admin/viewcategories");
            }
            $content = file_get_contents("views/admin/editcategory.php");
            eval("?>".$content);
        }

        public function deletecategory($id){
            global $rout;
            if (!functions::isUserAdmin()){
                header("Location:{$rout->start}/main/unauthaccess");
            }
            
            _categories::deleteCategoryFromDB($id);
            header("Location:{$rout->start}/admin/viewcategories");
        }

    }

?>