<?php
    include_once ("models/users.php");

    class functions {

        public static function isUserLogIn(){
            $usr = _users::getCurrentUser();
            if ($usr != null)
                return true;
            else
                return false;
        }

        public static function isUserAdmin(){
            $usr = _users::getCurrentUser();
            if ($usr != null && $usr->secure_level == 1)
                return true;
            else
                return false;
        }

        public static function cyrillictranslit($title){
            $iso9_table = array(
                'А' => 'A', 'Б' => 'B', 'В' => 'V', 'Г' => 'G', 'Ѓ' => 'G',
                'Ґ' => 'G', 'Д' => 'D', 'Е' => 'E', 'Ё' => 'YO', 'Є' => 'YE',
                'Ж' => 'ZH', 'З' => 'Z', 'Ѕ' => 'Z', 'И' => 'I', 'Й' => 'J',
                'Ј' => 'J', 'І' => 'I', 'Ї' => 'YI', 'К' => 'K', 'Ќ' => 'K',
                'Л' => 'L', 'Љ' => 'L', 'М' => 'M', 'Н' => 'N', 'Њ' => 'N',
                'О' => 'O', 'П' => 'P', 'Р' => 'R', 'С' => 'S', 'Т' => 'T',
                'У' => 'U', 'Ў' => 'U', 'Ф' => 'F', 'Х' => 'H', 'Ц' => 'TS',
                'Ч' => 'CH', 'Џ' => 'DH', 'Ш' => 'SH', 'Щ' => 'SHH', 'Ъ' => '',
                'Ы' => 'Y', 'Ь' => '', 'Э' => 'E', 'Ю' => 'YU', 'Я' => 'YA',
                'а' => 'a', 'б' => 'b', 'в' => 'v', 'г' => 'g', 'ѓ' => 'g',
                'ґ' => 'g', 'д' => 'd', 'е' => 'e', 'ё' => 'yo', 'є' => 'ye',
                'ж' => 'zh', 'з' => 'z', 'ѕ' => 'z', 'и' => 'i', 'й' => 'j',
                'ј' => 'j', 'і' => 'i', 'ї' => 'yi', 'к' => 'k', 'ќ' => 'k',
                'л' => 'l', 'љ' => 'l', 'м' => 'm', 'н' => 'n', 'њ' => 'n',
                'о' => 'o', 'п' => 'p', 'р' => 'r', 'с' => 's', 'т' => 't',
                'у' => 'u', 'ў' => 'u', 'ф' => 'f', 'х' => 'h', 'ц' => 'ts',
                'ч' => 'ch', 'џ' => 'dh', 'ш' => 'sh', 'щ' => 'shh', 'ъ' => '',
                'ы' => 'y', 'ь' => '', 'э' => 'e', 'ю' => 'yu', 'я' => 'ya'
            );
            $name = strtr( $title, $iso9_table );
            $name = preg_replace('~[^A-Za-z0-9\'_\-\.]~', '-', $name );
            $name = preg_replace('~\-+~', '-', $name ); // --- на -
            $name = preg_replace('~^-+|-+$~', '', $name ); // кил - на концах
            return $name;
        }

        public  static function imgresize($src, $dest, $width, $height, $rgb=0xFFFFFF, $quality=100){
            if (!file_exists($src)) {
                return false;
            }
            $size = getimagesize($src);
            if ($size === false) {
                return false;
            }
            $format = strtolower(substr($size['mime'], strpos($size['mime'], '/')+1)); $icfunc = "imagecreatefrom" . $format;
            if (!function_exists($icfunc)) {
                return false;
            }
            $x_ratio = $width / $size[0]; $y_ratio = $height / $size[1]; $ratio = min($x_ratio, $y_ratio); $use_x_ratio = ($x_ratio == $ratio);
            $new_width   = $use_x_ratio  ? $width  : floor($size[0] * $ratio); $new_height  = !$use_x_ratio ? $height : floor($size[1] * $ratio);
            $new_left    = $use_x_ratio  ? 0 : floor(($width - $new_width) / 2); $new_top     = !$use_x_ratio ? 0 : floor(($height - $new_height) / 2);
            $isrc = $icfunc($src); $idest = imagecreatetruecolor($width, $height);
            imagefill($idest, 0, 0, $rgb); imagecopyresampled($idest, $isrc, $new_left, $new_top, 0, 0,
                $new_width, $new_height, $size[0], $size[1]); imagejpeg($idest, $dest, $quality);
            imagedestroy($isrc); imagedestroy($idest);
            return true;
        }
    }
?>