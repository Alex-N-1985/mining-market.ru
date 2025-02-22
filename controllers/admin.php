<?php 

    include_once ("models\users.php");
    include_once ("models\statpages.php");
    include_once ("models\images.php");
    include_once ("models\categories.php");
    include_once ("models\cats_images.php");
    include_once ("models\articles.php");
    include_once ("models\clients.php");

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

        public function viewcatsimages(){
            global $rout;
            if (!functions::isUserAdmin()){
                header("Location:{$rout->start}/main/unauthaccess");
            }
            $cats_images = _cats_images::getImagesCatsFromDB();
            $content = file_get_contents("views/admin/viewcatsimages.php");
            eval("?>" . $content);
        }

        public function addcatsimages(){
            global $rout;
            if (!functions::isUserAdmin()){
                header("Location:{$rout->start}/main/unauthaccess");
            }
            $images = _images::getImagesFromDB();
            $cats = _categories::getCategoriesFromDBbyType("Images");
            if (isset($_POST["image"]) && isset($_POST["cat"])){
                $imgCat = new _cats_images(null, $_POST['image'], $_POST['cat']);
                $res = _cats_images::addImageCatsToDB($imgCat);
                header("Location:{$rout->start}/admin/viewcatsimages");
            }
            $content = file_get_contents("views/admin/addcatsimages.php");
            eval("?>" . $content);
        }

        public function deletecatsimages($id){
            global $rout;
            if (!functions::isUserAdmin()){
                header("Location:{$rout->start}/main/unauthaccess");
            }
            _cats_images::deleteImageCatFromDB($id);
            header("Location:{$rout->start}/admin/viewcatsimages");
        }

        public function viewarticles(){
            global $rout;
            if (!functions::isUserAdmin()){
                header("Location:{$rout->start}/main/unauthaccess");
            }
            $arts = _articles::getArticlesFromDB();
            $content = file_get_contents("views/admin/viewarticles.php");
            eval("?>".$content);
        }

        public function viewarticle($id){
            global $rout;
            if (!functions::isUserAdmin()){
                header("Location:{$rout->start}/main/unauthaccess");
            }
            $art = _articles::getArticlesFromDBbyID($id);
            $publish = _users::getUserFromDBbyID($art->published)->login;
            $content = file_get_contents("views/admin/viewarticle.php");
            eval("?>".$content);
        }

        public function addarticle(){
            global $rout;
            if (!functions::isUserAdmin()){
                header("Location:{$rout->start}/main/unauthaccess");
            }
            $images = _images::getImagesFromDB();
            if (isset($_POST['aName']) && $_POST['aName'] != "" &&
                isset($_POST['author']) && $_POST['author'] != "" &&
                isset($_POST['shorttext']) && $_POST['shorttext'] != "" &&
                isset($_POST['content']) && $_POST['content'] != "" && $_POST['image']){
                $art = new _articles(
                    null,
                    $_POST['aName'],
                    $_POST['content'],
                    $_POST['shorttext'],
                    $_POST['author'],
                    _users::getCurrentUser()->ID,
                    null,
                    (int)$_POST['image']
                );
                _articles::addArticleToDB($art);
                header("Location:{$rout->start}/admin/viewarticles");
            }
            $content = file_get_contents("views/admin/addarticle.php");
            eval("?>".$content);
        }

        public function editarticle($id){
            global $rout;
            if (!functions::isUserAdmin()){
                header("Location:{$rout->start}/main/unauthaccess");
            }
            $art = _articles::getArticlesFromDBbyID($id);
            $images = _images::getImagesFromDB();
            if (isset($_POST['aName']) && $_POST['aName'] != "" &&
                isset($_POST['author']) && $_POST['author'] != "" &&
                isset($_POST['shorttext']) && $_POST['shorttext'] != "" &&
                isset($_POST['content']) && $_POST['content'] != "" && $_POST['image']){
                $art->name = $_POST['aName'];
                $art->content = $_POST['content'];
                $art->author = $_POST['author'];
                $art->preview = $_POST['shorttext'];
                $art->img_title = (int)$_POST['image'];
                _articles::updateArticleInDB($art);
                header("Location:{$rout->start}/admin/viewarticles");
            }
            $content = file_get_contents("views/admin/editarticle.php");
            eval("?>".$content);
        }

        public function deletearticle($id){
            global $rout;
            if (!functions::isUserAdmin()){
                header("Location:{$rout->start}/main/unauthaccess");
            }
            _articles::deleteArticleFromDB($id);
            header("Location:{$rout->start}/admin/viewarticles");
        }

        public function viewclients(){
            global $rout;
            if (!functions::isUserAdmin()){
                header("Location:{$rout->start}/main/unauthaccess");
            }
            $clts = _clients::getClientsFromDB();
            $content = file_get_contents("views/admin/viewclients.php");
            eval("?>".$content);
        }

        public function viewclient($id){
            global $rout;
            if (!functions::isUserAdmin()){
                header("Location:{$rout->start}/main/unauthaccess");
            }
            $clt = _clients::getClientFromDBbyID($id);
            $content = file_get_contents("views/admin/viewclient.php");
            eval("?>".$content);
        }

        public function addclient(){
            global $rout;
            if (!functions::isUserAdmin()){
                header("Location:{$rout->start}/main/unauthaccess");
            }
            $usrs = _Users::getUsersFromDB();
            if (isset($_POST["name"]) && $_POST["name"] != "" && 
            isset($_POST["adress"]) && $_POST["adress"] != "" &&
            isset($_POST["phone"]) && $_POST["phone"] != "" &&
            isset($_POST["clientType"]) && isset($_POST["login"])){
                $clt = new _clients(null, $_POST['name'], $_POST['adress'], $_POST['phone'], 
                $_POST['clientType'], $_POST["login"]);                
                _clients::addClientToDB($clt);
                header("Location:{$rout->start}/admin/viewclients");
            }
            $content = file_get_contents("views/admin/addclient.php");
            eval("?>".$content);
        }

        public function editclient($id){
            global $rout;
            if (!functions::isUserAdmin()){
                header("Location:{$rout->start}/main/unauthaccess");
            }
            $clt = _clients::getClientFromDBbyID($id);
            $usrs = _Users::getUsersFromDB();
            if (isset($_POST["name"]) && $_POST["name"] != "" && 
            isset($_POST["adress"]) && $_POST["adress"] != "" &&
            isset($_POST["phone"]) && $_POST["phone"] != "" &&
            isset($_POST["clientType"]) && isset($_POST["login"])){
                $clt->name = $_POST["name"];
                $clt->adress = $_POST["adress"];
                $clt->phone = $_POST["phone"];
                $clt->client_type = $_POST["clientType"];
                $clt->login = $_POST["login"];
                _clients::updateClientInDB($clt);
                header("Location:{$rout->start}/admin/viewclient/{$clt->ID}");
            }
            $content = file_get_contents("views/admin/editclient.php");
            eval("?>".$content);
        }

        public function deleteclient($id){
            global $rout;
            if (!functions::isUserAdmin()){
                header("Location:{$rout->start}/main/unauthaccess");
            }
            _clients::deleteClientInDB($id);
            header("Location:{$rout->start}/admin/viewclients");
        }
    }
?>