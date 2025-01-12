<?php 

    include_once ("models\users.php");
    include_once ("models\statpages.php");
    include_once ("models\images.php");
    include_once ("models\categories.php");
    include_once ("models\cats_images.php");

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
            $img = _images::getImagesFromDBbyID($user->avatar);
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
            $imgTitles = _images::getImagesFromDB();            
            $iTitles = array();
            if ($imgTitles != null) {
                $cID = _categories::getCategoriesFromDBbyName("Титульные изображения")->ID;
                foreach ($imgTitles as $item) {
                    $IC = _cats_images::getImageCatsFromDBbyImageAndCatID($item->ID, $cID);
                    if ($IC != null) {
                        $iTitles[] = $item;
                    }
                }
            }
            var_dump($_POST); echo "<br>";
            if (isset($_POST["cName"]) && isset($_POST["catType"]) && 
                $_POST["cName"] != null && isset($_POST["cUri"]) && $_POST["cUri"] != null ){                
                $cat = new _categories(null, $_POST["cName"], $_POST["cUri"], $_POST["catType"], $_POST["imgTitle"]);
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
            $imgTitles = _images::getImagesFromDB();            
            $iTitles = array();
            if ($imgTitles != null) {
                $cID = _categories::getCategoriesFromDBbyName("Титульные изображения")->ID;
                foreach ($imgTitles as $item) {
                    $IC = _cats_images::getImageCatsFromDBbyImageAndCatID($item->ID, $cID);
                    if ($IC != null) {
                        $iTitles[] = $item;
                    }
                }
            }                      
            if (isset($_POST["cName"]) && isset($_POST["catType"]) && isset($_POST["cUri"]) && isset($_POST["imgTitle"])){
                $cat->name = $_POST["cName"];
                $cat->uri = $_POST["cUri"];
                $cat->catType = $_POST["catType"];
                $cat->img_title = $_POST['imgTitle'];
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

        public function viewimages(){
            global $rout;
            if (!functions::isUserAdmin()){
                header("Location:{$rout->start}/main/unauthaccess");
            } 
            $imgs = _images::getImagesFromDB();
            $content = file_get_contents("views/admin/viewimages.php");
            eval("?>" . $content);
        }

        public function addimage(){
            global $rout;
            if (!functions::isUserAdmin()){
                header("Location:{$rout->start}/main/unauthaccess");
            }
            $cats = _categories::getCategoriesFromDBbyType("Images");            
            if (isset($_FILES['file']) && isset($_POST['imgType'])){
                $nName = functions::cyrillictranslit($_FILES['file']['name']);
                $nPath = "temp/".$nName;
                if (move_uploaded_file($_FILES['file']['tmp_name'], $nPath)){
                    $pt = strpos($nName, '.');
                    $url = substr($nName, 0, $pt);
                    $ext = substr($nName, $pt + 1);
                    $newDir = "img/";
                    $newSFileName = $newDir.$url.".".$ext;
                    $src = "temp/".$nName;
                    $imgType = $_POST['imgType'];
                    if ($imgType == 7){
                        $nWidth = 200;
                        $nHeight = 200;
                    } else {
                        $nWidth = 600;
                        $nHeight = 600;
                    }
                    if (functions::imgresize($src, $newSFileName, $nWidth, $nHeight)){
                        unlink($src);
                    }
                    $content = file_get_contents("views/admin/inputimage.php");
                    eval("?>".$content);
                } else {
                    echo "Ошибка загрузки файла! <br>";
                }
            } else {
                $content = file_get_contents("views/admin/addimage.php");
                eval("?>" . $content);
            }
        }

        public function inputimage(){
            global $rout;
            if (!functions::isUserAdmin()){
                header("Location:{$rout->start}/main/unauthaccess");
            }
            if (isset($_POST['inpUrl']) && isset($_POST['inpExt']) && isset($_POST['inpTitle']) && isset($_POST['imgType'])){
                $img = new _images(null, $_POST['inpTitle'], $_POST['inpUrl'], $_POST['inpExt'], null, _users::getCurrentUser()->ID);
                _images::addImageToDB($img);
                $imgID = _images::getImageByUrlAndExt($img->uri, $img->extension)->ID;
                if ((int)$_POST['imgType'] == 7){
                    $cat = _categories::getCategoriesFromDBbyName("Аватары");
                } else {
                    $cat = _categories::getCategoriesFromDBbyID($_POST['imgType']);
                }
                $imgCat = new _cats_images(null, $imgID, $cat->ID);
                $res = _cats_images::addImageCatsToDB($imgCat);                
                header("Location:{$rout->start}/admin/viewimages");
            }
        }

        public function deleteimage($id){
            global $rout;
            if (!functions::isUserAdmin()){
                header("Location:{$rout->start}/main/unauthaccess");
            }
            $img = _images::getImagesFromDBbyID($id);
            if ($img->canDelete > 0){
                _images::deleteImageFromDB($id);
            }
            header("Location:{$rout->start}/admin/viewimages");
        }
    }

?>